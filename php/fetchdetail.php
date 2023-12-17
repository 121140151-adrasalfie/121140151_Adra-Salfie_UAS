<?php
include 'koneksi.php';

$id = $_GET['id'];

$sql = "SELECT * FROM kpop_data WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='custom-details'>";
        echo "<p>" . $row["name"] . "</p>";
        echo "<p>" . $row["dob"] . "</p>";
        echo "<p>" . $row["about"] . "</p>";
        echo "<p>" . $row["band"] . "</p>";
        echo "<p>" . $row["status"] . "</p>";
        echo "<img src='img/" . $row["photo"] . "' alt='' class='custom-photo'>";
        echo "</div>";
    }
} else {
    echo "Data not found";
}

$conn->close();
?>
