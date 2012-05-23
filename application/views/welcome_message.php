<?php
	include('header.php');
?>
	
		<div id="logoContainer" align="center">
			<img id="logo" src="images/logo.jpg">
		</div>
		<div id="searchContainer" align="center">
			<!--<div id="searchDiv">
					<input id="search" type="text"/>
					<input id="searchSubmit" type="submit">
			</div>-->
			
			<form class="searchform">
				<input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
				<input class="searchbutton" type="button" value="Go" />
			</form>
		</div>	
		
		<div id="homeContainer" align="center">
			<div>
				<a href="home.html">
					<img id="homeButton" src="images/homeButton.jpg">
				</a>
			</div>
		</div>
		<div id="createContainer" align="center">
			<div>
				<a href="create.html">
					<img id="createButton" src="images/createButton.jpg">
				</a>
			</div>
		</div>
<?php
	include('footer.php');
?>