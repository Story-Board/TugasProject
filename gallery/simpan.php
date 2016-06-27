<?php
	$konek=mysql_connect("localhost","root","");
	$db=mysql_select_db("tkppl");
	$judul_event=$_POST["judul_event"];
	$category=$_POST["category"];
	$target_dir = "../uploads/";
	$gambar = basename($_FILES["gambar"]["name"]);
	$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
	 		$simpan=mysql_query("insert into gallery values(0,'$judul_event','$gambar','$category')");
			if($simpan){
				echo "berhasil";
				header('Location: ../index.php?slink=formgallery&success=1');
			} else {
				echo "gagal";  	
			}
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
?>