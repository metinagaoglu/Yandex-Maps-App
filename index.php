<?php  require_once("include/sablon.php"); ?>
<?php  require_once("include/db.php"); ?>
<?php  $ilanlar = $db->query("SELECT * FROM emlak GROUP BY emlakID DESC"); ?>
<?php  headers("Anasayfa",1); ?>
	<script type="text/javascript">
	 	ymaps.ready(initForHome);
	 		function initForHome () {
			var defaultCoords = [39.144467065269545, 35.05445864369768];
			var myMap2 = new ymaps.Map('map', {
				center:  defaultCoords, // Москва
				zoom: 6
			}, {
				searchControlProvider: 'yandex#search'
			});
	 		<?php
	 			$marks = 0;
	 			while($k = $ilanlar->fetch_object()):
	 				?>
	 				 var p<?=$marks ?> = new ymaps.Placemark([ <?=$k->lat.",".$k->lng ?>], {iconContent: '<?=$k->ilan_baslik ?>'}, {
	 						draggable : false,  
	 						preset: "islands#blueStretchyIcon"  
	 				 });
	 				 p<?=$marks++ ?>.events.add("click",function(){
	 					  window.location = "<?php echo $siteUrl."/detay.php?emlakID=$k->emlakID" ?>";
	 				 }); 
	 				<?php
	 			endwhile;	
	 			echo ' myMap2.geoObjects';	
	 			for($i = 0; $i < $marks; $i++){
	 				echo '.add(p'.$i.')';
	 			}
	 			echo ";";		
	 		?>		
	 		$("#load").hide();
	 }
	</script>
<div id="map" style="width: 100%; height: 400px"><center><img src="load.gif" id="load" height="100"></center> </div>
<div class="container" style="margin-top:100px;">
	<div class="row">
	<?php  $ilanlar = $db->query("SELECT * FROM emlak GROUP BY emlakID DESC"); ?>
	<?php  while($row = $ilanlar->fetch_object()): ?>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <div class="caption">
	      <div id="map"></div>
	        <h3> <?=$row->ilan_baslik?></h3>
	        <p><?=$row->ilan_adres?></p>
	        <p><a href="<?=$siteUrl?>/detay.php?emlakID=<?=$row->emlakID?>" class="btn btn-primary" role="button">İlanı İncele</a></p>
	      </div>
	    </div>
	  </div>
	<?php  endwhile; ?>
	</div>
</div>
<?php footers(); ?>