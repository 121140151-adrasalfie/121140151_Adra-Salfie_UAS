<?php
include 'koneksi.php';

$sql = "SELECT * FROM kpop_data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Sekilas Tentang</th>
            <th>Genre</th>
            <th>Band</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["about"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["band"] . "</td>";
        echo "<td><img src='img/" . $row["photo"] . "' alt='' style='max-width: 100px;'></td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>
                <button class='delete-button' data-rowid='" . $row["id"] . "'>Hapus</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak Ada Data</td></tr>";
}

$conn->close();
?>
