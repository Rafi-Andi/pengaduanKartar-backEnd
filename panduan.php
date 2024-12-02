<!DOCTYPE html>
<html lang="en">

<?php 
    include("./layout/tittle.php");
?>

<body class="bg-blue-200">
    <div class="mx-8 my-4">
        <a href="index.php"><img src="./assets/x-square.svg" alt=""></a>
    </div>
    <section class="bg-blue-200 py-12">
        <div class="container mx-auto px-6 lg:px-16">
            <h2 class="text-center text-2xl font-bold text-blue-900 md:text-3xl">Panduan Video</h2>
            <p class="mt-2 text-center text-gray-600 md:text-lg">
                Tonton panduan lengkap tentang cara menggunakan layanan kami dengan mudah dan cepat.
            </p>

            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-blue-100 shadow-md rounded-lg overflow-hidden">
                    <video src="./assets/video1.mp4" alt="panduan1" controls></video>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-800">Panduan daftar dan login</h3>
                        <p class="mt-2 text-sm text-gray-600">Pelajari cara mendaftar dan login website pengaduan dengan
                            langkah mudah.</p>
                    </div>
                </div>

                <div class="bg-blue-100 shadow-md rounded-lg overflow-hidden">
                    <video src="./assets/video2.mp4" alt="panduan2" controls>

                    </video>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-800">Cara mengirim pengaduan dan melihat riwayat pengaduan</h3>
                        <p class="mt-2 text-sm text-gray-600">Ketahui cara mengirim pengaduan anda dan mengecek riwayat pengaduan anda</p>
                    </div>
                </div>
                
                <div class="bg-blue-100 shadow-md rounded-lg overflow-hidden">
                    <video src="./assets/video3.mp4" alt="panduan3" controls></video>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-800">Cara edit dan menghapus pengaduan , dan log out akun</h3>
                        <p class="mt-2 text-sm text-gray-600">Edit dan hapus pengaduan anda dengan mudah dan log out akun anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>