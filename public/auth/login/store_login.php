<?php
session_start();
include("../../php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan username dan password yang dikirimkan melalui formulir login
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); // Hashing password using MD5

    // Query untuk mendapatkan data user berdasarkan username
    $sql = "SELECT * FROM staff WHERE username = '$username'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    // Memeriksa keberhasilan query dan verifikasi password
    if ($result && $password === $result['password']) {
        // Autentikasi berhasil
        $_SESSION['id'] = $result['id'];
        header("Location: ../dashboard");
        exit();
    } else {
        // Autentikasi gagal
        ?>
        <script>
            alert("Authentication Failed!");
            location.href = "../login";
        </script>
        <?php
        exit;
    }
} else {
    ?>
    <script>
        alert("Invalid!");
        location.href = "../login";
    </script>
    <?php
    exit;
}

?>
