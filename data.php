<?php
include 'connection.php';

$query = mysqli_query($connection, "SELECT * FROM product");

$result = [];
while ($row = mysqli_fetch_array($query)) {
    array_push($result, [
        'nama' => $row['nama_barang']
    ]);
}
echo json_encode(['result' => $result]);
