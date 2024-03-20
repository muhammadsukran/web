<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/skill.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Skill</title>
</head>
<body>
    <ul id="navbar">
        <li><a href="index.php" style="font-weight: bold;">Home</a></li>
        <li><a href="#" style="font-weight: bold;">Galeri</a></li>
        <li><a href="crud.php" style="font-weight: bold;">CRUD</a></li>
        <li class="active"><a href="#" style="font-weight: bold;">Skill</a></li>
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
    <!--  Container  -->
<ul class="progress">
    <!--  Item  -->
    <li data-name="Laravel" data-percent="13%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="3" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="81"></path>
        </svg>
    </li>
    <!--  Item  -->
    <li data-name="HTML5 Skill" data-percent="87%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="2" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="547"></path>
        </svg>
    </li>
    <!--  Item  -->
    <li data-name="Bootstrap" data-percent="13%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="12" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="81"></path>
        </svg>
    </li>
    <!--  Item  -->
    <li data-name="Java Script" data-percent="97%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="9" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="610"></path>
        </svg>
    </li>
    <!--  Item  -->
    <li data-name="PHP Skill" data-percent="58%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="6" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="364"></path>
        </svg>
    </li>
    <!--  Item  -->
    <li data-name="CSS Skill" data-percent="100%">
        <svg viewBox="-10 -10 220 220">
        <g fill="none" stroke-width="6" transform="translate(100,100)">
        <path d="M 0,-100 A 100,100 0 0,1 86.6,-50" stroke="url(#cl1)"/>
        <path d="M 86.6,-50 A 100,100 0 0,1 86.6,50" stroke="url(#cl2)"/>
        <path d="M 86.6,50 A 100,100 0 0,1 0,100" stroke="url(#cl3)"/>
        <path d="M 0,100 A 100,100 0 0,1 -86.6,50" stroke="url(#cl4)"/>
        <path d="M -86.6,50 A 100,100 0 0,1 -86.6,-50" stroke="url(#cl5)"/>
        <path d="M -86.6,-50 A 100,100 0 0,1 0,-100" stroke="url(#cl6)"/>
        </g>
        </svg>
        <svg viewBox="-10 -10 220 220">
        <path d="M200,100 C200,44.771525 155.228475,0 100,0 C44.771525,0 0,44.771525 0,100 C0,155.228475 44.771525,200 100,200 C155.228475,200 200,155.228475 200,100 Z" stroke-dashoffset="629"></path>
        </svg>
    </li>
</ul>
<!--  Defining Angle Gradient Colors  -->
<svg width="0" height="0">
<defs>
<linearGradient id="cl1" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="1" y2="1">
    <stop stop-color="#618099"/>
    <stop offset="100%" stop-color="#8e6677"/>
</linearGradient>
<linearGradient id="cl2" gradientUnits="objectBoundingBox" x1="0" y1="0" x2="0" y2="1">
    <stop stop-color="#8e6677"/>
    <stop offset="100%" stop-color="#9b5e67"/>
</linearGradient>
<linearGradient id="cl3" gradientUnits="objectBoundingBox" x1="1" y1="0" x2="0" y2="1">
    <stop stop-color="#9b5e67"/>
    <stop offset="100%" stop-color="#9c787a"/>
</linearGradient>
<linearGradient id="cl4" gradientUnits="objectBoundingBox" x1="1" y1="1" x2="0" y2="0">
    <stop stop-color="#9c787a"/>
    <stop offset="100%" stop-color="#817a94"/>
</linearGradient>
<linearGradient id="cl5" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="0" y2="0">
    <stop stop-color="#817a94"/>
    <stop offset="100%" stop-color="#498a98"/>
</linearGradient>
<linearGradient id="cl6" gradientUnits="objectBoundingBox" x1="0" y1="1" x2="1" y2="0">
    <stop stop-color="#498a98"/>
    <stop offset="100%" stop-color="#618099"/>
</linearGradient>
</defs>
</svg>
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