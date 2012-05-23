<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
		//document.location.hash = "/lists";
	});

	
</script>

	
	
	<div data-role="header" data-position="fixed">
		<a href="/" data-theme="a" data-icon="home" class="ui-btn-left" rel="external" data-iconpos="notext">home</a>
		<h1>MY LISTS</h1>
		<?php
			if ($listcount > 0)
			{
		?>
		<a href="/lists/create" data-theme="e" data-icon="plus" class="ui-btn-right" data-iconpos="notext">create new list</a>
		<?php
		}
		?>
	</div>
	
	
	<div data-role="content">
		
		<?php
			if ($listcount > 0)
			{
		?>
		
		<ul data-role="listview" data-theme="c">
		<?php foreach ($lists as $list):?>
		
		<li><a href="/lists/view/<?php echo preg_replace("/[^a-zA-Z0-9]/", "_", $list->Name);?>/<?php echo $list->id;?>" rel="external"><?php echo $list->Name;?></a> <span class="ui-li-count"><?php if ($list->itemcount>0) echo $list->itemcount; else echo 0?></span></li>
		
		<?php endforeach;?>
		</ul>
		
		<?php
		}
		else
		{
		?>
		<a href="/lists/create" data-theme="e" data-role="button" data-icon="plus" data-iconpos="right">create new list</a>
		<?php
		
		}
		?>
		
		
		
	</div>

<?php
	include('footer.php');
?>
	
