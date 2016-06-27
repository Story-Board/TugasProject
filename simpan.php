<?php
	$konek=mysql_connect("localhost","root","");
	$db=mysql_select_db("tkppl");
	$a=$_POST["name"];
	$b=$_POST["email"];
	$c=$_POST["subject"];
	$message=mysql_real_escape_string($_POST["message"]);
	$simpan=mysql_query("insert into comment values(0,'$a','$b','$c','$message')");

	if($simpan){
		echo "berhasil";
		header('Location: index.php');
	}
	else
		echo "gagal";
?>