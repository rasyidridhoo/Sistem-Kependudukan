<?php
include('koneksi.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memilih tabel
    $cek_data = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $hasil = mysqli_fetch_array($cek_data);
    $status_user = $hasil['status_user'];
    $login_user = $hasil['email'];
    $akun = $hasil['nama_user'];
    $row = mysqli_num_rows($cek_data);

    // Pengecekan Kondisi Login Berhasil/Tidak
    if ($row > 0) {
        session_start();
        $_SESSION['login_id'] = $hasil['id_user'];
        $_SESSION['login_user'] = $login_user;
        $_SESSION['login_akun'] = $akun;
        $_SESSION['login_as'] = $status_user;

        if ($status_user == 'Admin') {
            echo "<script> alert ('Anda berhasil login sebagai admin')</script>";
            header('refresh:0; admin/dashboard-admin.php');
        } elseif ($status_user == 'Warga') {
            echo "<script> alert ('Anda berhasil login sebagai warga')</script>";
            header('refresh:0; warga/data-warga.php');
        }
    } else {
        echo "<script> alert ('Anda gagal login, silahkan lakukan ulang')</script>";
        header("refresh:0; index.php");
    }
}
