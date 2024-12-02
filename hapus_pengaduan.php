<?php
include("./service/koneksi.php");
session_start();

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header("Location: masuk.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];

    // Hapus pengaduan berdasarkan ID dan user_id
    $sql = "DELETE FROM riwayat_pengaduan WHERE id = ? AND user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ii", $id, $user_id);

    if ($stmt->execute()) {
        header("Location: tabelpengaduan.php");
        exit();
    } else {
        echo "Gagal menghapus pengaduan!";
    }
} else {
    echo "Akses tidak valid!";
}
?>
