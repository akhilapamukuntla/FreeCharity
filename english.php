<html>

	<head>
		<title> Free Charity </title>
	</head>

	<style>


		h1 {
			background-image: url(Image1.jpg);
			color:;
			font-size: 72px;
			text-align: center;
			border-bottom: 2px solid black;
			padding-bottom: 0px;
		}


		p {
			font-size: 36px;
			text-align: center;
		}

	    p1{
			font-size: 24px;
			float: center;
			underline:
			border: 1px solid black;
		}

		h2 {
			font-size: 36px;
			text-align: center;
		}

		nav {
			text-align: center;
			font-size: 24px;
			background-color:;
			color: white;
		}

		body{

		}
	</style>

	<body>
		<h1> English </h1>
		<nav>
			<ul>
				<li> <a href="./sports.html"> Sports </a></li>
				<li> <a href="./english.html"> English </a> </li>
				<li> <a href="./history.html"> History </a> </li>
				<li> <a href="./math.html"> Math </a> </li>
				<li> <a href="./science.html"> Science </a> </li>
			</ul>
		</nav>
		<div>

		<h2> Questions: </h2>

<?php

$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,'freecharity');

if($con){
	echo 'Successfully connected to the database.';
} else {
	die('Error.');
}

	if($db){
	echo 'Successfully found the database.';
} else {
	die('Error.');
}

$query = mysqli_query($con,"SELECT * FROM questions");
/*
while($row = mysqli_fetch_array($query)){
	$id = $row['qid'];
	$name = $row['category'];
	$info = $row['info'];

	echo $id . ': ' . $name ;
	echo $info ;
}
*/
$rows=mysqli_fetch_array($query);
var_dump($rows);

?>
	</body>
</html>
