<?php
$conn = mysqli_connect("localhost", "root", "", "login");

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
}


$query="INSERT INTO akun VALUES('','$username','$password','$email','$no_hp')";
$result = mysqli_query($conn,$query); 

if (mysqli_affected_rows($conn) > 0) {
    // Jika ditemukan, arahkan ke halaman home.php
    header("location: login.php");
    exit;

}else {
    // Jika tidak ditemukan, set error
    $eror = true;
    echo mysqli_eror($conn);
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>

</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #74ebd5, #ACB6E5);
}
.container {
    width: 100%;
    max-width: 400px;
    text-align: center;
    background-color: #fff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    margin: 20px;
}
.error {
    color: red;
    margin-bottom: 20px;
}
label, input, button {
    font-size: 1rem;
    margin-bottom: 15px;
    text-align: left;
}
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #45a049;
}
</style>
<body>
<div class="container">
        <h1>DAFTAR AKUN</h1>
        <?php if (isset($eror) && $eror == true): ?>
            <p class="error">Username atau password salah!</p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username :</label><br>
            <input type="text" name="username" id="username" value="" required>
            <br>
            <label for="password">Password :</label><br>
            <input type="password" name="password" id="password" value="" required>
            <BR>
            <label for="email">Email :</label><br>
            <input type="text" name="email" id="email" value="" required>
            <br>
            <label for="no_hp">No HP :</label><br>
            <input type="text" name="no_hp" id="no_hp" pattern="^[0-9]+$" value="" required>
            <br><br>
            <button type="submit" name="submit">Daftar</button>
</body>
</html>