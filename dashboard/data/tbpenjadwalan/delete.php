<?php 

require "../../koneksi.php";

$id = $_GET['id'];


$sql = "DELETE FROM tbpenjadwalan WHERE id = '$id'";
$query = mysqli_query($conn,$sql) or die ($sql);

?>