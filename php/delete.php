<?php
session_start();

include 'koneksi.php';
include 'KpopData.php';

$kpopData = new KpopData($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $kpopData->deleteData($id);
    $_SESSION['result_message'] = $result;
} else {
    $_SESSION['result_message'] = "Invalid request";
}

$conn->close();
header("Location: ../index.html"); 
exit();
?>
