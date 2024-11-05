<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$servername = "localhost";  // Ganti dengan nama server Anda
$username = "root";          // Ganti dengan username database Anda
$password = "";              // Ganti dengan password database Anda
$dbname = "flutter_db";      // Nama database yang Anda gunakan

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// Mendapatkan data JSON dari permintaan
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? '';

// Validasi input
if (empty($id)) {
    echo json_encode(["success" => false, "message" => "ID tidak boleh kosong"]);
    exit;
}

// Menyiapkan dan mengeksekusi perintah SQL untuk menghapus data
$sql = "DELETE FROM mata_kuliah WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil dihapus"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menghapus data: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
