<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Instagram Test</title>
</head>
<style type="text/css" media="screen">
body,html {
	font-size:16px;
	font-family:arial, helvetica;
	background-color:#ddd;
	line-height:20px;
}
label {
	display:block;
	font-weight:bold;
	margin-bottom:10px;
}	

form input{
	font-size:14px;
	line-height:20px;
}
#result {
	margin-top:50px;
	background-color:black;
	overflow:hidden;
	padding:20px;
	width:auto;
}
#result a{
	margin-right:10px;
	margin-bottom:10px;
}

</style>
<body>
<form action="" method="post" accept-charset="utf-8">
	<label>Instagram Client ID<br/><input type="text" name="client_id" value="" style="width:300px"></label>
	<label>Tag<br/><input type="text" name="tag" value="" placeholder="mtv, food, cars, etc"></label>
	<label>Number of photos to fetch<br/><input type="text" name="count" value="" placeholder="10,20,5, etc"></label>
	<input type="submit" name="" value="Submit">
</form>
	<div id="result">
	<?php
	require_once("Instagram.class.php");

	if(isset($_POST['client_id']) && isset($_POST['tag']) && isset($_POST['count']))
		{
			$instagram=Instagram::getFeed($_POST['client_id'],$_POST['tag'],$_POST['count']);
			//var_dump($instagram);
			if(count($instagram))
				foreach($instagram as $insta)
					echo "<a href='".$insta->link."'><img src='".$insta->images->low_resolution->url."' ></a>";
		}
	?>
	</div>
</body>
</html>