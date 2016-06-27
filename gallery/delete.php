<?php
$konek=mysql_connect("localhost","root","");
$db=mysql_select_db("tkppl");
$sql = mysql_query("delete from gallery where id = '$_GET[id]'");
if ($sql) {
	header('Location: ../index.php?slink=datagallery&success=1');
} else {
	echo "gagal";  	
}
?>