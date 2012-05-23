<?php
	include('header.php');
?>

<script language="javascript">

	jQuery(function(){
	});

	
</script>

	<div data-role="header" data-position="fixed"><h1>LOGIN</h1></div>
	
	
	<div data-role="content">
		<div data-role="fieldcontain">
			<form method="post" action="/loginscr">
				Email:<br>
				<input class="default-value" id="email" type="text" name="email" value="" /><br>
    			Password:<br><input id="pw" type="password" name="pw" value="" autocomplete="off" /><br>
    			<input data-theme="a" type="submit" value="submit" rel="external">
			</form>
			<a href="/register" data-theme="e" data-role="button">create an account</a>
		</div>
	</div>

<!--<div data-role="footer">&copy; 2011</div>-->

<?php
	include('footer.php');
?>