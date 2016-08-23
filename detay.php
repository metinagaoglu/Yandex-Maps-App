<?php   require_once("include/sablon.php"); 
 	 	require_once("include/db.php"); 
 	 	$emlakID = $_GET["emlakID"];
 	 	$detay = $db->query("SELECT * FROM emlak WHERE emlakID = '$emlakID'");
 	 	$row = $detay->fetch_object();
 		headers($row->ilan_baslik,2);
?>
<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading"><?=$row->ilan_baslik?></div>
	  <div class="panel-body">
	    <?=$row->ilan_adres?>
	  <style type="text/css">
	   #map {
	    width:100%;
	    height: 500px;
	    overflow: hidden;
	   }
	   .ortala {
	    width:100%;
	    margin:0 auto;
	  </style>
	  <script type="text/javascript">
	  	ymaps.ready(init);
	  	   var myMap, 
	  	       myPlacemark;

	  	   function init(){ 
	  	       myMap = new ymaps.Map("map", {
	  	           center: [<?=$row->lat?>, <?=$row->lng?>],
	  	           zoom: 7
	  	       }); 
	  	       
	  	       myPlacemark = new ymaps.Placemark([<?=$row->lat?>, <?=$row->lng?>], {
	  	           hintContent: 'Moscow!', balloonContent: "<?=$row->ilan_baslik?>"
	  	       });
	  	       
	  	       myMap.geoObjects.add(myPlacemark);
	  	       $("#load").hide();
	  	   }
	  </script>
	  <div class="ortala">
	        <div id="map"> <center><img src="load.gif" id="load" height="100"></center> </div>
	  </div>
	  

	  </div>
	</div>
</div>
<?php  footers(); ?>