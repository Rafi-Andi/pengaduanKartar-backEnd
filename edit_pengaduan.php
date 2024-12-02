<?php
include("./service/koneksi.php");
session_start();

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header("Location: masuk.php");
    exit();
}

$error_pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Ambil pengaduan berdasarkan ID dan user_id
    $sql = "SELECT * FROM riwayat_pengaduan WHERE id = ? AND user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ii", $id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pengaduan = $result->fetch_assoc();
    } else {
        echo "Pengaduan tidak ditemukan!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $pesan_pengaduan = trim($_POST['pesan_pengaduan']);

    if (empty($pesan_pengaduan)) {
        $error_pesan = "Pesan tidak boleh kosong!";
    } else {
        $sql = "UPDATE riwayat_pengaduan SET pesan_pengaduan = ? WHERE id = ? AND user_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sii", $pesan_pengaduan, $id, $_SESSION['user_id']);

        if ($stmt->execute()) {
            header("Location: tabelpengaduan.php");
            exit();
        } else {
            $error_pesan = "Gagal memperbarui pengaduan!";
        }
    }

    $pengaduan['pesan_pengaduan'] = $pesan_pengaduan;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include("./layout/tittle.php");
?>
<body class="bg-blue-200">
<div class="max-w-md mx-auto mt-10 bg-blue-100 p-6 rounded shadow">
    <h1 class="text-blue-900 text-center text-xl font-bold mb-4">Edit Pengaduan</h1>
    <form action="edit_pengaduan.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <textarea name="pesan_pengaduan" rows="5" class="w-full p-2 border rounded mb-4"><?= htmlspecialchars($pengaduan['pesan_pengaduan'] ?? '') ?></textarea>
        <?php if ($error_pesan): ?>
            <div class="w-full rounded border-s-4 border-red-500 bg-red-50 p-4 mb-2"><?= htmlspecialchars($error_pesan) ?></div>
        <?php endif; ?>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="tabelpengaduan.php" class="text-blue-500 hover:underline ml-4">Batal</a>
    </form>
</div>
</body>
</html>
