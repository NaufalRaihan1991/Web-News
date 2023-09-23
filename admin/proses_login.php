<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database MySQL (gantilah dengan informasi koneksi yang sesuai)
    $db_host = "localhost";
    $db_user = "username_db";
    $db_password = "password_db";
    $db_name = "nama_db";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Mengambil data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mengecek username dan password di database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            header("Location: dashboard.php"); // Ganti dengan halaman setelah login
        } else {
            echo "Password salah. Silakan coba lagi.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }

    mysqli_close($conn);
}
?>
