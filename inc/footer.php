<footer id=footer>
  <div class="clear"></div>
  <div class="wrap">
    <form class="wrap" action="" method="post">
      <div class="label">
        <label>RECEVEZ NOTRE NEWSLETTER</label>
      </div>
      <div class="champ">
        <input type="email" name="email" value="VOTRE EMAIL">
        <input type="submit" name="" value="S'INSCRIRE">
      </div>
    </form>
    <div class="reseau">
      <p>&nbsp Réseaux sociaux!</p><br>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-linkedin"></a>
    </div>
    <div class="clear"></div>

  </div>
  <div class="cookie">
    <p>Contenu du COOKIE $_COOKIE</p>
    <?= var_dump($_COOKIE); ?>
  </div>
  <div>
    <p class="copyright">Copyright 2019 E-vaccine Theme.</p>
  </div>
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
