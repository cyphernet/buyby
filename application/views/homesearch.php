<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
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
	
	
	<div data-role="header"><h1>SHOP FOR: <?php echo ($_POST['search']);?></h1></div>
	
	
	<div data-role="content">


<!--
<form method='POST' action="/homesearch">
<input type='text' value='<?php echo ($_POST['search']) ? $_POST['search'] : ''; ?>' name='searchterm' />
<input type='submit' value='search' />
</form><br>

<pre>
<?php
	$results = $results->items;
	//print_r($results);
?>
</pre>
-->
<input type="hidden" value="" id="lat"/>
<input type="hidden" value="" id="lng"/>

<ul data-role="listview" data-theme="c">
<?php 

foreach ($results as $result){
 
?>
<li>
<a onclick="location = '/place/search/?shopName=<?php echo $result->product->author->name;?>&lat='+$('#lat').val()+'&lng='+$('#lng').val()">
<img class="image_result" src="<?php echo $result->product->images[0]->link;?>"><br>
	
	<?php echo $result->product->title;?><br> from <?php echo $result->product->author->name;?>
	
	
</a>

</li>
<?php }?>
</ul>

	</div>

<?php
	include('footer.php');
?>
	

	