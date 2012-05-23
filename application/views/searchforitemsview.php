<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
	});

	
</script>
	
	
	<div data-role="header"><h1>ADD ITEM TO: <?php echo $listname;?></h1></div>
	
	
	<div data-role="content">


<form method='post'>
<input type='text' value='<?php echo ($_POST['searchterm']) ? $_POST['searchterm'] : ''; ?>' name='searchterm' />
<input type='submit' value='search' />
</form><br>
<ul data-role="listview" data-theme="c">
<?php 
$i = 0;
foreach ($searchresults->items as $result)
{

?>
<li>
<a onclick="$('#add_<?php echo $i;?>').submit();">
<img class="image_result" src="<?php echo $result->product->images[0]->link;?>"><br>
<form action="/addlistitemscr" method="post" id="add_<?php echo $i++?>">
	<input type="hidden" name="listid" value="<?php echo $listid;?>" />
	<input type="hidden" name="listname" value="<?php echo $listname;?>" />
	<?php echo $result->product->title;?><br> from <?php echo $result->product->author->name;?>
	<input type="hidden" name="googleId" value="<?php echo $result->product->googleId;?>" />
	<input type="hidden" name="store" value="<?php echo $result->product->author->name;?>" />
	<input type="hidden" name="name" value="<?php echo $result->product->title;?>" />
	<input type="hidden" name="desc" value="<?php echo $result->product->description;?>" />
	<input type="hidden" name="price" value="<?php echo $result->product->inventories[0]->price;?>" />
	<input type="hidden" name="img" value="<?php echo $result->product->images[0]->link;?>" />
</form>
</a>
</li>
<?php }?>
</ul>

	</div>

<?php
	include('footer.php');
?>
	

	