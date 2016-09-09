<?php require_once("include/sablon.php"); 
	  require_once("include/db.php"); 
	  headers("Yakınımdaki İlanlanlar",4); 


$ip_addr = $_SERVER['REMOTE_ADDR']; 
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip_addr) );

if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {

	$lat = $geoplugin['geoplugin_latitude'];
	$lng = $geoplugin['geoplugin_longitude'];

}
$yakindakiler = $db->query("SELECT * FROM emlak ORDER BY (POW((lng-$lng),2) + POW((lat-$lat ),2)) DESC ");

?>
	<script type="text/javascript">
	 	ymaps.ready(initForHome);
	 		function initForHome () {
			var defaultCoords = [<?=$lat?>, <?=$lng?>];
			var myMap2 = new ymaps.Map('map', {
				center:  defaultCoords, // Москва
				zoom: 10
			}, {
				searchControlProvider: 'yandex#search'
			});

			var p = new ymaps.Placemark([<?=$lat?>,<?=$lng?>],
			{ 
				iconContent: 'Tahmini Konum'
			},{
            // Options. The placemark's icon will stretch to fit its contents.
            preset: 'islands#greenStretchyIcon'
			}); 
	 		<?php
	 			$marks = 0;
	 			while($k = $yakindakiler->fetch_object()):
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
	 			echo '.add(p)';
	 			for($i = 0; $i < $marks; $i++){
	 				echo '.add(p'.$i.')';
	 			}
	 			echo ";";		
	 		?>		
	 		$("#load").hide();
	 }
	</script>
<div id="map" style="width: 100%; height: 400px"><center><img src="load.gif" id="load" height="100"></center> </div>
</div>
</body>
</html>
