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
$nama = $data['nama'] ?? '';
$deskripsi = $data['deskripsi'] ?? '';

// Validasi input
if (empty($nama) || empty($deskripsi)) {
    echo json_encode(["success" => false, "message" => "Nama dan deskripsi tidak boleh kosong"]);
    exit;
}

// Menyiapkan dan mengeksekusi perintah SQL untuk menambahkan data baru
$sql = "INSERT INTO mata_kuliah (nama, deskripsi) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nama, $deskripsi);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan"]);
} else {
    echo json_encode(["success" => false, "message" => "Gagal menambahkan data: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
