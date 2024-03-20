<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Ls.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <div class="error-message">
            <?php
            session_start();
            include "koneksi.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row["password"])) {
                        // Login berhasil
                        $_SESSION['user_id'] = $row['id'];

                        // Insert login history to the database
                        $userId = $row['id'];
                        $insertHistory = "INSERT INTO login_history (user_id) VALUES ($userId)";
                        $conn->query($insertHistory);

                        header("Location: index.php"); 
                        exit(); 
                    } else {
                        echo "Password salah!";
                    }
                } else {
                    echo "Akun belum terdaftar!";
                }
            }

            $conn->close();
            ?>
        </div>
        <form action="" method="post" class="login2">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="EMAIL" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="PASSWORD" required><br>
            <input type="submit" value="login" class="no-animation">
        </form>
        <div class="sign-up">
            <p>Belum memiliki akun? <a href="signup.php">Register disini</a></p>
        </div>
    </div>

    <div class="background">
        <img src="https://wallpaperwaifu.com/wp-content/uploads/2021/07/neon-back-alley-in-japan-thumb.jpg">
    </div>
</body>
</html>
