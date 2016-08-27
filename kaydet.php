<?php  ob_start(); ?>
  <?php  require_once("include/sablon.php"); ?>
  <?php  require_once("include/db.php"); ?>
  <?php  headers("İlan Ekle",3); ?>  

    <?php  
    if ($_POST){
    	//print_r($_POST);
    	$sql = "INSERT INTO emlak (`emlakID`, `ilan_baslik`, `ilan_adres`, `il_id`, `lat`, `lng`, `date`) VALUES (NULL, '{$_POST['ilan_baslik']}', '{$_POST['ilan_adres']}', '16' ,'{$_POST['lat']}', '{$_POST['lng']}', CURRENT_TIMESTAMP);";
    	$db->query($sql);
        header("Location:$siteUrl/detay.php?emlakID={$db->insert_id}");
    }
    ?>
    <div class="container">
    <form action="" method="POST">
     <div class="col-md-6">
         <div class="form-group">
           <label for="exampleInputEmail1">İlan Başlığı</label>
           <input name="ilan_baslik" type="text" class="form-control" placeholder="Başlık">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">İlan Adresi</label>
           <textarea name="ilan_adres" class="form-control" placeholder="Adres"></textarea>
         </div>
         <input id="lat" type="hidden" name="lat">
         <input id="lng" type="hidden" name="lng">
         <input type="submit" name="İlan Giriş">
     </div>
     <div class="col-md-6">
   
           <div id="map" style="width: 600px; height: 400px"> <center><img src="load.gif" id="load" height="100"></center>  </div>
        <script type="text/javascript">
      ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init(){     
            myMap = new ymaps.Map ("map", {
                center: [40.1621, 29.0659],
                zoom: 7
            });
            $("#load").hide();

            myMap.events.add('click', function (e) {
                
                myMap.geoObjects.removeAll();
                // Getting the click coordinate
                var coords = e.get('coords');
                
                var myPlacemark = new ymaps.Placemark([coords[0],coords[1]],
                { 
                    iconContent: 'Burası Satılık'
                },{
                // Options. The placemark's icon will stretch to fit its contents.
                preset: 'islands#blueStretchyIcon'
                }); 

                myMap.geoObjects.add(myPlacemark);

                $("#lat").val(coords[0]);
                $("#lng").val(coords[1]);
            //alert(coords.join(', '));
            
           });
        }
</script>
</form>
     </div>
    </div>
</body>
</html>
