<?php
include("./service/koneksi.php");
session_start();

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header("Location: masuk.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM riwayat_pengaduan WHERE user_id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<?php 
    include("./layout/tittle.php");
?>

<body class="bg-blue-100">
    <?php include("header.php"); ?>

    <div class="mx-auto max-w-screen-lg px-4 py-16">
        <h1 class="text-center text-2xl font-bold text-blue-800">Riwayat Pengaduan</h1>

        <div class="mt-6 h-[80vh] flex flex-col justify-center items-center">
            <?php if ($result->num_rows > 0): ?>
                <table class="min-w-full table-auto border-collapse shadow-lg">
                    <thead>
                        <tr class="bg-blue-400">
                            <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Pesan Pengaduan</th>
                            <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Waktu</th>
                            <th class="border px-4 py-2 text-left text-sm font-semibold text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="bg-blue-200 border px-4 py-2 text-sm">
                                    <?= htmlspecialchars($row['pesan_pengaduan']) ?></td>
                                <td class="bg-blue-200 border px-4 py-2 text-sm">
                                    <?= date('d M Y, H:i', strtotime($row['waktu'])) ?></td>
                                <td class="bg-blue-200 border px-4 py-2 text-sm">
                                    <a href="edit_pengaduan.php?id=<?= $row['id'] ?>"
                                        class="inline-block rounded bg-blue-700 px-6 py-1 text-sm font-medium text-white transition hover:scale-100 hover:shadow-xl focus:outline-none focus:ring active:bg-blue-500"><img src="./assets/edit.svg" alt=""></a> 
                                    <a href="hapus_pengaduan.php?id=<?= $row['id'] ?>"
                                        onclick="return confirm('Yakin ingin menghapus pengaduan ini?');"
                                        class="inline-block rounded bg-red-700 px-6 py-1 text-sm font-medium text-white transition hover:scale-100 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500"><img src="./assets/delete.svg" alt="./assets/delete.svg"></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            <?php else: ?>
                <p class="text-center text-gray-500">Tidak ada pengaduan yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include("./layout/footer.php"); ?>
</body>

</html>