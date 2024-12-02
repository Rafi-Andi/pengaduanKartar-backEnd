<?php
include("./service/koneksi.php");
session_start();

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header("Location: masuk.php");
    exit();
}

$sukses_pesan = "";
$error_pesan = "";

if (isset($_POST['kirim_pengaduan'])) {
    $user_id = $_SESSION['user_id']; 
    $pesan = trim($_POST['pesan_pengaduan']); 

    if (empty($pesan)) {
        $error_pesan = "Pesan pengaduan tidak boleh kosong!";
    } else {
        $stmt = $db->prepare("INSERT INTO riwayat_pengaduan (user_id, pesan_pengaduan) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $pesan);

        if ($stmt->execute()) {
            $sukses_pesan = "Pengaduan berhasil dikirim!";
        } else {
            $error_pesan = "Gagal mengirim pengaduan. Coba lagi.";
        }
        $stmt->close();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">

<?php 
    include("./layout/tittle.php");
?>
<body class="bg-blue-100">
    <?php
    include("header.php");
    ?>

    <div class="mx-auto max-w-screen-md px-4 py-16">
        <h1 class="text-center text-2xl font-bold text-blue-800">Form Pengaduan</h1>
        <form action="pengaduan.php" method="POST" class=" flex flex-col h-[60vh] justify-center items-center mt-6 space-y-4">
            <textarea name="pesan_pengaduan" rows="5" class="shadow-lg w-full rounded-lg border-blue-800 p-4 text-sm"
                placeholder="Tulis pengaduan Anda..."></textarea>
            <?php if ($sukses_pesan): ?>
                <div class="w-full rounded border-s-4 border-green-500 bg-green-50 p-4"><?= $sukses_pesan ?></div>
            <?php elseif ($error_pesan): ?>
                <div class="w-full rounded border-s-4 border-red-500 bg-red-50 p-4"><?= $error_pesan ?></div>
            <?php endif; ?>
            <button type="submit" name="kirim_pengaduan"
                class="block w-full rounded-lg bg-blue-900 px-5 py-3 text-sm font-medium text-white">Kirim
                Pengaduan</button>
        </form>
    </div>

    <?php
    include("./layout/footer.php");
    ?>
</body>

</html>
