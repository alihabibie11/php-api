<?php
include 'connection.php';

$q = "SELECT * FROM product WHERE 1 ";

if (empty($_GET)) {
    $query = mysqli_query($connection, $q);
    $result = [];
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, [
            'id' => $row['id'],
            'nama' => $row['nama_barang'],
            'harga' => $row['harga_barang'],
            'stok' => $row['stok']
        ]);
    }
} elseif (isset($_GET['id']) && $_GET['id'] !== 0) {
    $q .= "AND id='" . $_GET['id'] . "'";
    $query = mysqli_query($connection, $q);
    $result = [];
    while ($row = $query->fetch_assoc()) {
        $result[] = [
            'id' => $row['id'],
            'nama' => $row['nama_barang'],
            'harga' => $row['harga_barang'],
            'stok' => $row['stok']
        ];
    }
} elseif (isset($_GET['nama_barang']) && $_GET['nama_barang'] !== 0) {
    $q .= "AND nama_barang LIKE '%" . $_GET['nama_barang'] . "%'";
    $query = mysqli_query($connection, $q);
    $result = [];
    while ($row = mysqli_fetch_array($query)) {
        array_push($result, [
            'id' => $row['id'],
            'nama' => $row['nama_barang'],
            'harga' => $row['harga_barang'],
            'stok' => $row['stok']
        ]);
    }
}

echo json_encode(['result' => $result]);
