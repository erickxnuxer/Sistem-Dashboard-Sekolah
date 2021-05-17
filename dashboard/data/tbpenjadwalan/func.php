<?php 

require "../../koneksi.php";
$id = htmlspecialchars($_GET['id']);
$kodeguru = htmlspecialchars($_GET['kodeguru']);
$tanggal = htmlspecialchars($_GET['tanggal']);
$mulai = htmlspecialchars($_GET['mulai']);
$selesai = htmlspecialchars($_GET['selesai']);
$kelas = htmlspecialchars($_GET['kelas']);
$cmd = htmlspecialchars($_GET['cmd']);


if( $cmd === 'save' ) :

	$sql = "INSERT INTO tbpenjadwalan (kodeguru, tanggal, mulai, selesai, kelas) VALUES('$kodeguru','$tanggal','$mulai','$selesai','$kelas')";
	$query = mysqli_query($conn, $sql) or die ($sql);

else :

	$sql = "UPDATE tbpenjadwalan SET 
	kodeguru = '$kodeguru',
	tanggal = '$tanggal', 
	mulai = '$mulai',  
	selesai = '$selesai',
	kelas = '$kelas' 
	WHERE id = '$id'";
	$query = mysqli_query($conn, $sql) or die ($sql);

endif;


if (mysqli_affected_rows($conn) > 0) :

	echo "Berhasil Melakukan perubahan";

else :

	echo "Gagal Melakukan Perubahan";

endif;

?>