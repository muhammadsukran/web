<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Dashboard</title>
</head>
<body>
    <ul id="navbar">
        <li class="active"><a href="#" style="font-weight: bold;">Home</a></li>
        <li><a href="#" style="font-weight: bold;">Galeri</a></li>
        <li><a href="crud.php" style="font-weight: bold;">CRUD</a></li>
        <li><a href="skill.php" style="font-weight: bold;">Skill</a></li>
    </ul>

   <nav>
        <div class="nav1">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>  
                <div class="menu-items">
                    <div id="profile-popup">
                        <div id="profile-popup-content">
                            <?php
                            session_start();
                            include 'koneksi.php';

                            if (isset($_SESSION['user_id'])) {
                                $userId = $_SESSION['user_id'];
                                $query = "SELECT nama, nomor_hp FROM users WHERE id = $userId";
                                $result = $conn->query($query);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $nama = $row['nama'];
                                    $nomorHp = $row['nomor_hp'];

                                    echo "<h2>$nama</h2>";
                                    echo "<p>Nomor HP: $nomorHp</p>";
                                } else {
                                    echo "Data not found";
                                }
                            } else {
                                echo "User not logged in";
                            }
                            ?>
                        </div>
                    </div>
                    <li><a href="login.php">Logout</a></li>
                </div>
            </div>
        </div>
    </nav>

    <div class="background">
        <img src="https://wallpaperwaifu.com/wp-content/uploads/2021/07/neon-back-alley-in-japan-thumb.jpg">
    </div>

    <script>
        // Tambahkan JavaScript di sini
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenu = document.getElementById('nav1');
            const profilePopup = document.getElementById('profile-popup');

            mobileMenu.addEventListener('click', function () {
                this.classList.toggle('open');
                profilePopup.classList.toggle('show');
            });

            const logoutBtn = document.getElementById('logout-btn');
            logoutBtn.addEventListener('click', function () {
            });
        });
    </script>
    <div class="footer">
        <h2>©Copyright 2023</h2>
        <p class="par" style="color:white; size: 14px;">Mhd.Sukran</p>
    </div>
</body>
</html>
