<?php include('newsletter.php'); ?>
<footer id=footer>
  <div class="wrap">
    <div class="sectionx div1">
      <h3>Liens utiles</h3>
      <ul>
        <li><a href="infos.php">Nous contacter</a></li>
        <li><a href="vaccins.php">Listes des vaccins</a></li>
        <li><a href="https://www.santemagazine.fr/actualites">Actualités santé</a></li>
      </ul>
    </div>

    <div class="sectionx div2">
      <h3>Contact</h3>
      <ul>
        <li>24 Place Saint-Marc, 76000 Rouen</li>
        <li>02.35.00.00.00</li>
        <li>e-vaccine@gmail.fr</li>
        <li><a href="index.php">https://www.e-vaccine.fr</a></li>
      </ul>
    </div>


    <div class="sectionx div3">
      <h3>NEWSLETTER</h3>

      <div class="champ">



        <p>Inscrivez-vous pour recevoir nos actualités</p>
        <span class="error"><?php if(!empty($erreur['email'])) {echo $erreur['email']; }  ?></span>
        <form class="" action="" method="post">
        <input type="text" placeholder="exemple@gmail.com" name="newsletter" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
       <input type="submit" name="newsletterform" value="S'inscrire" class="btnConfirm">
       </form>
      </div>
   </div>
    <div>
      <p class="copyright">Copyright 2018 E-Vaccine&copy; Theme.</p>
    </div>

  </div>
  <div class="clear"></div>
</footer>

<script
src="https://code.jquery.com/jquery-1.6.2.min.js"
integrity="sha256-0W0HoDU0BfzslffvxQomIbx0Jfml6IlQeDlvsNxGDE8="
crossorigin="anonymous"></script>
<script src="asset/flexslider/jquery.flexslider.js"></script>
<script src="asset/slicknav/jquery.slicknav.min.js"></script>

<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>

<script>
 $(function(){
     $('#menu').slicknav();
 });
</script>

</body>
</html>
