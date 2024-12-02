<?php
include("./service/koneksi.php");
$error_pesan = "";
$sukses_pesan = "";

if (isset($_POST["daftar"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($password)) {
        $cek_username = $db->prepare("SELECT * FROM users WHERE username = ?");
        $cek_username->bind_param("s", $username);
        $cek_username->execute();
        $result = $cek_username->get_result();

        if ($result->num_rows > 0) {
            $error_pesan = "Username sudah digunakan, silakan pilih username lain!";
        } else {
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password_hashed);

            if ($stmt->execute()) {
                $sukses_pesan = "Registrasi berhasil! Silakan login!";
            } else {
                $error_pesan = "Daftar gagal: " . $db->error;
            }

            $stmt->close();
        }

        $cek_username->close();
    } else {
        $error_pesan = "Harap isi semua data dengan benar!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php 
    include("./layout/tittle.php");
?>

<body class="bg-blue-200">
    <div class="mx-8 my-4">
        <a href="index.php"><img src="./assets/x-square.svg" alt=""></a>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-blue-800 sm:text-3xl">Daftar akun</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-blue-900">
                Daftar akun untuk memudahkan Anda dalam mengakses fitur-fitur yang ada di dalam aplikasi.
            </p>

            <form action="daftar.php" class="bg-blue-100 mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8"
                method="POST">
                <p class="text-center text-lg font-medium">Daftarkan akun anda</p>

                <div>
                    <label for="username" class="sr-only">Username</label>
                    <div class="relative">
                        <input name="username" type="username"
                            class="w-full rounded-lg border-blue-800 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Masukan username" />

                    </div>
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative">
                        <input name="password" type="password"
                            class="w-full rounded-lg border-blue-800 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Masukan password" />
                    </div>
                </div>
                <?php
                if ($sukses_pesan) {
                    ?>
                    <div role="alert" class="rounded border-s-4 border-green-500 bg-green-50 p-4">
                        <strong class="block font-medium text-green-800"> <?= $sukses_pesan ?> </strong>
                    </div> <?php
                } ?>
                <?php
                if ($error_pesan) {
                    ?>
                    <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
                        <strong class="block font-medium text-red-800"> <?= $error_pesan ?> </strong>
                    </div> <?php
                } ?>
                <button name="daftar" type="submit"
                    class="block w-full rounded-lg bg-blue-900 px-5 py-3 text-sm font-medium text-white">Daftar</button>
                <p class="text-center text-sm text-gray-500">Sudah punya akun?<a class="underline"
                        href="masuk.php">Login Disini</a></p>
            </form>
        </div>
    </div>

</body>

</html>