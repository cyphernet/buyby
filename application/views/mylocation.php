<?php
	include('header.php');
?>
<!--<script src="http://code.google.com/apis/gears/gears_init.js"></script>
<script src="http://geo-location-javascript.googlecode.com/svn/trunk/js/geo.js"></script>
	<script>
	var latitude;
	var longitude;
	if (geo_position_js.init()) {
		geo_position_js.getCurrentPosition(geo_success, geo_error);
	}
	function geo_success(p) {
		latitude = p.coords.latitude;
		longitude = p.coords.longitude;
		initialize();
	}
	function geo_error() {

}
	</script>
	-->
	
	
	
	<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	<script src="http://jquery-ui-map.googlecode.com/svn/trunk/ui/jquery.ui.map.js" type="text/javascript"></script>
	
	
	
<script language="javascript">

	jQuery(function(){
		//alert('hi');
		
		$('#map_canvas').gmap({ 'center': new google.maps.LatLng('<?php echo $_GET['lat']?>','<?php echo $_GET['lng']?>'), 'callback': callback });
		
		<?php
		foreach ($mapresults as $result)
		{
			//print_r($result);
			//print_r();
			//die();
		?>
		
			$('#map_canvas').gmap('addMarker', { 'position': new google.maps.LatLng("<?php echo $result->geometry->location->lat;?>","<?php echo $result->geometry->location->lng;?>") } );
		
		<?php
		}
		?>
		
		$('#map_canvas').height($('.page').height());
	});


	var callback = function() {
    	//alert('Google map loaded!');
	};
	
</script>
	
	
	<div data-role="header">
	<a href="/" data-theme="a" data-icon="home" class="ui-btn-left" rel="external" data-iconpos="notext">home</a>
	<h1>STORES SELLING: <?php echo $itemname;?></h1></div>
	
	
	<div data-role="content">

		<!--
		<p>
		
			<pre>
		<?php
			print_r($mapresults);
		?>
			</pre>
			
		</p>
		-->
		
		<div id="map_canvas" style="">
			[MAP DATA]
		</div>
		
	




	
	
	
	</div>

<?php
	include('footer.php');
?>
	

	