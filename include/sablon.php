<?php  
include 'db.php';

?>
<?php  function headers($title,$page){  
	global $siteUrl;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme-min.css">
	<script src='js/jquery.js'></script>
	<script src="//api-maps.yandex.ru/2.1/?lang=tr_TR" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Yandex Map Example </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if($page == 1): echo 'class=active'; endif;?>><a href="index.php">Anasayfa <span class="sr-only">(current)</span></a></li>
        <li <?php if($page == 3): echo 'class=active'; endif;?>><a href="kaydet.php">Kaydet</a></li>
        <li <?php if($page == 4): echo 'class=active'; endif;?>><a href="yakinimdakiler.php">Yakınımdakiler</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php  } 
function footers(){
	global $siteUrl;
?>
<script src='js/bootstrap-min.js'></script>
</body>
</html>
<?php  } ?>

