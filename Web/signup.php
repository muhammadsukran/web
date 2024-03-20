<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Ls.css">
    <title>Sign Up</title>
    <style>
        /* Menyembunyikan elemen sebelum tombol Generate ditekan */
        #randomMathLabel, #randomMath, #hasilUserLabel, #hasilUser, #errorText {
            display: none;
            color: red;
        }
    </style>
<!-- Bagian HTML -->
<script>
    function setRandomMath() {
        var angka1 = Math.floor(Math.random() * 10) + 1;
        var angka2 = Math.floor(Math.random() * 10) + 1;
        var operator = '+';

        document.getElementById("randomMath").innerHTML = angka1 + " " + operator + " " + angka2;
        document.getElementById("hasilRandom").value = eval(angka1 + operator + angka2);
        document.getElementById("operatorRandom").value = operator;

        // Menampilkan elemen setelah tombol Generate ditekan
        document.getElementById("randomMathLabel").style.display = "inline";
        document.getElementById("randomMath").style.display = "inline";
        document.getElementById("hasilUserLabel").style.display = "inline";
        document.getElementById("hasilUser").style.display = "inline";
        document.getElementById("errorText").style.display = "none";
    }
</script>
</head>
<body>
    <div class="SignUp">
        <h2>Sign Up</h2>
        <form action="" method="post" onsubmit="return validateForm()">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" placeholder="NAMA" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="EMAIL" required><br>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="tel" name="nomor_hp" placeholder="NOMOR HP" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="PASSWORD" required><br>

            <label for="randomMath" id="randomMathLabel">Hasil Aritmatika:</label>
            <span id="randomMath"></span><br>

            <label for="hasilUser" id="hasilUserLabel">Masukkan Hasil Aritmatika:</label>
            <input type="text" name="hasilUser" id="hasilUser" placeholder="Hasil"><br>

            <div id="errorText"></div>

            <input type="hidden" id="hasilRandom" name="hasilRandom">
            <input type="hidden" id="operatorRandom" name="operatorRandom">

            <button type="button" onclick="setRandomMath()">Click if you are not a robot</button><br>

            
            <input type="submit" value="Sign Up" class="no-animation">
        </form>
    </div>

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor_hp = $_POST["nomor_hp"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $hasilRandom = $_POST["hasilRandom"];
    $operatorRandom = $_POST["operatorRandom"];

    if (isset($_POST["hasilUser"])) {
        $hasilUser = $_POST["hasilUser"];

        // Validasi hasilUser
        if (!is_numeric($hasilUser) || $hasilUser !== (string)((int)$hasilUser) || $hasilUser < 0) {
            echo "<script>alert('Masukkan hasil aritmatika yang valid.'); window.location.href = 'signup.php';</script>";
            exit();
        }

        // Hitung hasil benar
        $hasilBenar = eval("return (" . $hasilRandom . $operatorRandom . $hasilUser . ");");

        if ($hasilBenar) {
            $sql = "INSERT INTO users (nama, email, nomor_hp, password) VALUES ('$nama', '$email', '$nomor_hp', '$password')";

            if ($conn->query($sql) === TRUE) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Hasil aritmatika yang dimasukkan tidak benar.'); window.location.href = 'signup.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Generate aritmatika Sebelum Mendaftar !!!.'); window.location.href = 'signup.php';</script>";
        exit();
    }
}
$conn->close();
?>

  <div class="background">
        <img src="https://wallpaperwaifu.com/wp-content/uploads/2021/07/neon-back-alley-in-japan-thumb.jpg">
    </div>
</body>
</html>
