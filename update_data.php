<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flutter_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari request POST
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$nama = $data['nama'];
$deskripsi = $data['deskripsi'];

// Update data
$sql = "UPDATE mata_kuliah SET nama=?, deskripsi=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nama, $deskripsi, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil diupdate"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal mengupdate data"]);
}

$stmt->close();
$conn->close();
?>
