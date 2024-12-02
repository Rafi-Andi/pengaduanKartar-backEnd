<?php

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $user_id = $_SESSION['user_id']; 
    $username = $_SESSION['username']; 
} else {
    header("location: index.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}

$username = $_SESSION['username'];
$id = $_SESSION['user_id']; 
?>
<!DOCTYPE html>
<html lang="en">

    <?php 
    include("./layout/tittle.php");
    ?>
<head>
    <style>
        .navbar {
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 35px;
            right: -300px;
            height: 200px;
            transition: all 0.5s;
        }

        .navbar.aktif {
            right: 0;
        }

        nav {
            position: relative;
        }
    </style>
</head>

<body>
    <header class="z-[9999] fixed top-0 right-0 left-0 mb-6 leading-1">
        <div class="bg-blue-900 w-full p-[1px] lin">
            <h1 class="text-center text-gray-200 text-xl font-bold md:text-2xl">Layanan Pengaduan <br> <span
                    class="text-yellow-500"> Karang Taruna </span> </h1>
        </div>
        <nav class="shadow-lg bg-blue-200 flex">
            <ul class="cursor-pointer flex justify-evenly gap-6 bg-bl w-full py-2 md:justify-evenly">
                <li
                    class="text-blue-700 font-bold text-[14px] border-b-2 border-transparent transition-all duration-[0.5s] hover:border-blue-300 md:text-xl cursor-pointer">
                    <a href="home.php">Beranda</a>
                </li>
                <li
                    class="text-blue-700 font-bold text-[14px] border-b-2 border-transparent transition-all duration-[0.5s] hover:border-blue-300 md:text-xl cursor-pointer">
                    <a href="pengaduan.php">Pengaduan</a>
                </li>
                <li
                    class="text-blue-700 font-bold text-[14px] border-b-2 border-transparent transition-all duration-[0.5s] hover:border-blue-300 md:text-xl cursor-pointer">
                    <a href="tabelpengaduan.php">Riwayat</a>
                </li>
            </ul>
            <div class="my-2 mr-4 cursor-pointer">
                <img class="cursor-pointer" id="ikon" src="./assets/profile-user.svg" width="35px" alt="">
            </div>

            <div class="navbar bg-blue-50 rounded-lg shadow-md w-[200px] md:w-[300px] p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="block text-gray-800 hover:text-blue-700 font-medium">
                            <p class=" font-semibold mb-4">Halo, <span><?= htmlspecialchars($username) ?></span></p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block text-gray-800 hover:text-blue-700 font-medium">
                            <p class="font-semibold">Id : <span><?= htmlspecialchars($user_id) ?></span></p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block text-gray-800 hover:text-blue-700 font-medium">
                        <p class=" font-semibold mb-4">Username : <span><?= htmlspecialchars($username) ?></span></p>
                        </a>
                    </li>
                    <li>
                        <hr class="border-gray-200 my-2">
                    </li>
                    <li>
                        <form action="header.php" method="POST"
                            class="flex items-center gap-2 text-red-600 font-medium">
                            <img src="./assets/logout.svg" alt="Logout Icon" class="w-4 h-4">
                            <button id="logout" type="submit" name="logout" class="hover:text-red-800">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </nav>

    </header>
    <script>
        const navbar = document.querySelector('.navbar');
        document.querySelector('#ikon').onclick = () => {
            navbar.classList.toggle("aktif")
        }

        const user = document.querySelector('#ikon')
        document.addEventListener('click', function (e) {
            if (!navbar.contains(e.target) && !user.contains(e.target)) {
                navbar.classList.remove("aktif")
            }
        })
    </script>
</body>

</html>