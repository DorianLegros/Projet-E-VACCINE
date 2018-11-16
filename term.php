<?php include('inc/pdo.php');
include('inc/fonction.php');
include('inc/request.php');
include('newsletter.php');
include('inc/header.php');?>



<div class="wrap">

  <section id="contenu">


    <h2 class="top">Définition préalable de l’Utilisateur</h2>
    <p class="espace">Est considéré comme Utilisateur tout titulaire du carnet de vaccination électronique (CVE), que ce soit pour son propre compte ou pour celui d’une personne dont il est le responsable légal.</p>

    <h2>Objet de la charte</h2>
    <p class="espace">Le CVE est édité par les etudiants de la NFactory school, ecole de developpement web entre autres. Diffusé sur le site Internet E-vaccine.fr, il permet d’enregistrer les vaccins administrés et les données utiles pour déterminer si le patient est à jour ou non de ses vaccinations. Le CVE est partagé entre l'Utilisateur et un ou plusieurs professionnels de santé de son choix. Il est hébergé sur les serveurs de la société Informatique de Sécurité (IDS1), titulaire d'un agrément d'hébergeur de données de santé à caractère personnel délivré par le Ministère de la Santé.</p>

    <p class="espace">Le système expert de E-vaccine.fr prend en compte dans les meilleurs délais (le plus souvent dans les 48 heures et au plus tard dans un délai de deux mois pour les modifications mineures) les modifications ou nouveautés concernant les dispositions légales et réglementaires ainsi que les données scientifiques et épidémiologiques ayant (ou susceptibles d’avoir) un impact significatif sur l’utilisation des vaccins. Il s’agit par exemple des résumés des caractéristiques des produits, des avis du Haut Conseil de la santé publique (HCSP) et de la Haute autorité de santé (HAS), des informations de l’Agence nationale de sécurité du médicament (Ansm) et de l’Agence européenne des médicaments (European Medicines Agency, EMA) ou encore des données épidémiologiques de l’Institut de veille sanitaire (InVS) ou de l’European Centre for Disease Prevention and Control (ECDC).

    Cette charte a pour objet de préciser les modalités d’utilisation du CVE, les droits et devoirs de l'Utilisateur, des professionnels de santé et du GEP.

    L’acceptation des conditions d’utilisation du CVE décrites dans cette charte entraîne le consentement exprès de l'Utilisateur.</p>

    <h2>Principe de fonctionnement du Carnet de Vaccination Électronique</h2>
    <p class="espace">L’Utilisateur commence par créer un compte permettant de gérer les CVE d’une famille. Lors de la procédure de création d’un compte, un login est créé automatiquement par MesVaccins.net. Ce login est composé d’une suite de caractères (deux lettres, trois chiffres et à nouveau deux lettres, comme pour la plaque d’immatriculation d’un véhicule en France).</p>

    <p class="espace">Une fois le compte créé, l’Utilisateur peut ajouter un ou plusieurs CVE. Pour chaque CVE, l’Utilisateur définit un pseudo. Il est conseillé de ne pas indiquer le nom de famille comme pseudo, afin de préserver l’anonymat du CVE. Puis l’Utilisateur entre le genre et la date de naissance du titulaire du CVE. Une fois enregistrée, la date de naissance n’est plus visible dès lors qu’au moins un vaccin a été enregistré (seul l’âge en années est alors visible).

    Le CVE est anonyme côté Utilisateur : un accès non autorisé à un compte Utilisateur ne permet pas de connaître l’identité du titulaire du compte.

    Les vaccins ajoutés à un CVE créé par l'Utilisateur sont automatiquement placés en attente de validation par un professionnel de santé.

    L’Utilisateur peut décider de partager un ou plusieurs des CVE rattachés à son compte avec un ou plusieurs professionnels de santé (il est donc libre de ne pas partager son CVE avec un professionnel de santé).

    Pour partager un CVE avec un professionnel de santé, l’Utilisateur doit lui fournir le code de partage qui est automatiquement créé par E-vaccine.fr pour chaque compte famille. Ce code de partage comporte huit caractères alphanumériques. L’Utilisateur devra également fournir au professionnel de santé la date de naissance du titulaire du CVE à partager.</p>


  </section>
</div>


<?php include('inc/footer.php'); ?>
