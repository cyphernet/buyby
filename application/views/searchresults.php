<?php foreach ($searchresults->items as $result): ?>
<hr>
<form action="/addlistitemscr" method="post">

	<?php echo $result->product->title;?> from <?php echo $result->product->author->name;?>
	<input type="hidden" name="googleId" value="<?php echo $result->product->googleId;?>" />
	<input type="hidden" name="googleId" value="<?php echo $result->product->author->name;?>" />
	<input type="hidden" name="googleId" value="<?php echo $result->product->title;?>" />
	<input type="hidden" name="googleId" value="<?php echo $result->product->description;?>" />
	<input type="hidden" name="googleId" value="<?php echo $result->product->inventories[0]->price;?>" />
	<input type="hidden" name="googleId" value="<?php echo $result->product->images[0]->link;?>" />
	<input type="submit" value="add" />
</form>

<?php endforeach;?>