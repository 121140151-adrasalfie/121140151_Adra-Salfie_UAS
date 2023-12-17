<?php
include 'koneksi.php';

// Ambil nilai id dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data berdasarkan id
$sql = "SELECT * FROM kpop_data WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Tampilkan detail data
    echo "<h2>Detail Data</h2>";
    echo "<img src='img/" . $row["photo"] . "' alt='' style='max-width: 200px;'>";
    echo "<p>Nama: " . $row["name"] . "</p>";
    echo "<p>Band: " . $row["band"] . "</p>";
    // Tambahkan informasi lain sesuai kebutuhan

} else {
    echo "Data not found";
}

$conn->close();
?>
