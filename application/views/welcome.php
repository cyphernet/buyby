<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
		$("#search").val('Product Search');
	});

	
</script>
	
	

	<!--<div data-role="header"><h1>buyby</h1></div>-->
	
	
	<div data-role="content">
	
		<div id="logoContainer" align="center">
			<img id="logo" src="images/logo.png" width="50%">
		</div>
		
		<div data-role="fieldcontain">
		<form method="POST" action="/homesearch">
		    <input type="search" name="search" id="search" value="" onfocus="if (this.value == 'Product Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Product Search';}"/>
		</form>
		</div>
		<a href="lists/" data-theme="b" data-role="button" data-icon="star" data-iconpos="right">my lists</a>
		
		
		<a href="lists/create" data-theme="a" data-role="button" data-icon="plus" data-iconpos="right">create new list</a>
		
		
		
		
		
	</div>
	

<?php
	include('footer.php');
?>
	
