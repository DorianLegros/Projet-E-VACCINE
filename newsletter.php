<?php
$erreur = array();
if(!empty($_POST['newsletterform'])){
      if(!empty($_POST['newsletter'])){
         $email = trim(strip_tags($_POST['newsletter']));
         if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $sql = "SELECT * FROM v2_newsletter WHERE ip = :ip";
           $query = $pdo->prepare($sql);
           $query->bindValue(':ip',$_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
           $query->execute();
           $ipexist = $query->fetch();

                     $sql = "SELECT * FROM v2_newsletter WHERE email = :email";
                     $query = $pdo ->prepare($sql);
                     $query->bindValue(':email',$email,PDO::PARAM_STR);
                     $query->execute();
                     $mailexist = $query->fetch();
                     if($mailexist == 0){
                        $sql = "INSERT INTO v2_newsletter(email,ip,dates) VALUES (:email,:ip,NOW())";
                        $query = $pdo ->prepare($sql);
                        $query->bindValue(':email',$email,PDO::PARAM_STR);
                        $query->bindValue(':ip',$_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
                        $query->execute();
                        header("Location: index.php");
                     } else {
                        $erreur['email'] = "Vous êtes déjà inscrit à la Newsletter..";
                     }

         } else {
            $erreur['email'] = "Vous devez indiquer une adresse e-mail..";
         }
      } else {
         $erreur['email'] = "Vous devez remplir ce champs..";
      }
}
