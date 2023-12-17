<?php
session_start(); 

include 'koneksi.php';
include 'KpopData.php';

$kpopData = new KpopData($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $about = mysqli_real_escape_string($conn, $_POST["about"]);
    $genre = mysqli_real_escape_string($conn, $_POST["genre"]);
    $band = mysqli_real_escape_string($conn, $_POST["band"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);


    $photo = $_FILES["photo"]["name"];
    $target_dir = "../img/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $ip_address = $_SERVER["REMOTE_ADDR"];

    if (empty($name) || empty($dob) || empty($about) || empty($genre) || empty($band) || empty($photo) || empty($status)) {
        echo "Semua kolom harus diisi!";
    } else {
        $result = $kpopData->insertData($name, $dob, $about, $genre, $band, $photo, $status, $user_agent, $ip_address);

        $_SESSION['result_message'] = $result;
    }
}

$conn->close();
header("Location: ../index.html");
exit();
?>
