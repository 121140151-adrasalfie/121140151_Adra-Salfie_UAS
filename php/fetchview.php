<?php
include 'koneksi.php';

$sql = "SELECT * FROM kpop_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];

        echo "<tr>";
        echo "<td><img src='img/" . $row["photo"] . "' alt='' style='max-width: 100px;'></td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["band"] . "</td>";
        echo "<td><a href='view.html?id={$id}' class='view-button'>View</a></td>"; 
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

