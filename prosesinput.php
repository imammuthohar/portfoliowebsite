<?php
include 'koneksi.php';

// Mengecek apakah form sudah di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Mengambil data yang dilempar dari method POST
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);

    // Membuat query SQL untuk proses input, pastikan formatnya sesuai
    $query = "INSERT INTO contact_me (name, email, message, created_at) 
              VALUES ('$name', '$email', '$message', CURRENT_TIMESTAMP)";

    // Menjalankan query dan mengecek apakah berhasil
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman index jika berhasil
        header('Location: index.php?status=success');
        exit();
    } else {
        // Menampilkan pesan error jika query gagal
        echo "Error: " . mysqli_error($koneksi);
    }

    // Menutup koneksi ke database
    mysqli_close($koneksi);
}
?>
