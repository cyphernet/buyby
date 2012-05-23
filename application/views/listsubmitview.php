<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
		$('#itemname').val('');
	});

	
</script>
	
	
	<div data-role="header" data-position="fixed"><h1>CREATE LIST</h1></div>
	
	
	<div data-role="content">
		<form action="/addlist" method="POST">
			New List Name:<br>
			<input id="itemname" name="itemname" value=""><br/>
			<input type="submit" data-theme="a" data-role="button" data-icon="plus" data-iconpos="right" value="create new list">
		</form>
	</div>

<?php
	include('footer.php');
?>