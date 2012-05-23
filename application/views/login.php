<?php
	include('header.php');
?>
<div class="page" data-role="page" data-theme="d">
	<!--<div data-role="header"><h1>buyby</h1></div>-->
	
	
	<div data-role="content">
		<div data-role="fieldcontain">
			<form action="/loginscr" method="POST">
				<input name="email" value="" onfocus="if (this.value == 'Email Adress') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Email Address';}"/>><br/>
				<input name="pw" type="password" value="" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Product Password';}"/>><br/>
				<input type="submit" value="Submit">
			</form>
		</div>
	</div>
</div>

<!--<div data-role="footer">&copy; 2011</div>-->

<?php
	include('footer.php');
?>