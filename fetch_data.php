<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Koneksi ke database
$servername = "localhost"; // Sesuaikan dengan konfigurasi server Anda
$username = "root";        // Sesuaikan dengan username MySQL Anda
$password = "";            // Sesuaikan dengan password MySQL Anda
$dbname = "flutter_db";    // Nama database yang dibuat di langkah sebelumnya

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query data
$sql = "SELECT id, nama, deskripsi FROM mata_kuliah";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($data);

$conn->close();
?>
