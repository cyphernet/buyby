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
	
	
	
	
	
	
	
<script language="javascript">

	jQuery(function(){
		//alert('hi');
	});

	navigator.geolocation.getCurrentPosition(GetLocation);
	function GetLocation(location) {
	    //alert(location.coords.latitude);
	    //alert(location.coords.longitude);
	    //alert(location.coords.accuracy);
	    $('#lat').val(location.coords.latitude);
	    $('#lng').val(location.coords.longitude);
	}
	
	
	
	
	
</script>
	
	
	<div data-role="header"><h1>LIST: <?php echo $listname;?></h1>
	<a href="/lists/search/<?php echo $listname;?>/<?php echo $listid;?>" data-theme="e" data-icon="plus" class="ui-btn-right" data-iconpos="notext">add item</a>
	</div>
	
	
	<div data-role="content">


	
	
	
	
	
<ul data-role="listview" data-theme="c">

<?php foreach ($itemsOnList as $item):?>

<li><a onclick="location = '/place/search/?itemId=<?php echo $item->itemId;?>&lat='+$('#lat').val()+'&lng='+$('#lng').val()"><?php echo $item->name;?></a><?php //echo print_r($item);?></li>

<?php endforeach;?>
</ul>
	<input type="hidden" value="" id="lat"/>
	<input type="hidden" value="" id="lng"/>

	
	
	
	</div>

<?php
	include('footer.php');
?>
	

	