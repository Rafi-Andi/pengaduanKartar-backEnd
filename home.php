<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include("./layout/tittle.php");
?>
<body>

    <?php 
    include("header.php");
    ?>

    <section class="flex flex-col justify-center items-center w-full h-[120vh] py-10 px-10 bg-blue-100 md:flex-row">
        <div>
            <img src="./assets/logoKartar.png" alt="logoKartar" class="w-[350px] md:w-[400px] lg:w-[500px]">
        </div>
        <div class="text-center md:text-left">
            <h2 class="text-lg font-bold text-yellow-600 md:text-xl">Selamat Datang <?= $_SESSION["username"]?>!!</h2>
            <h1 class="text-2xl font-bold text-blue-900 md:text-3xl">
                Layanan Pengaduan <span class=" shadow-sm">Karang Taruna</span>
            </h1>
            <p class="text-blue-700 font-semibold mt-4">
                Platform digital yang dirancang untuk mempermudah warga dalam menyampaikan aspirasi, keluhan, atau saran terkait lingkungan RT 07.
            </p>
            <div class="flex gap-2 mt-2 items-center justify-center md:justify-start">
                <a class="inline-block rounded bg-blue-700 px-4 py-3 text-sm font-medium text-white transition hover:scale-100 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500" href="pengaduan.php">Pengaduan</a>
                <a class="inline-block rounded border border-current px-3 py-3 text-sm font-medium text-blue-700 transition hover:scale-100 hover:shadow-xl focus:outline-none focus:ring active:text-blue-500" href="tabelpengaduan.php">Riwayat</a>
            </div>
        </div>
    </section>

    <?php 
    include("./layout/footer.php");
    ?>
</body>
</html>