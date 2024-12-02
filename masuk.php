<?php
include("./service/koneksi.php");

session_start();

$error_pesan = "";

if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Siapkan statement untuk mencegah SQL Injection
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            // Login berhasil
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["id"]; // Simpan user_id
            $_SESSION["is_login"] = true;

            header("location: home.php");
            exit;
        } else {
            $error_pesan = "Password salah!";
        }
    } else {
        $error_pesan = "Akun tidak ditemukan, silakan daftar!";
    }

    $stmt->close();
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
    <div class="mx-auto max-w-screen-xl px-4 py-8 bg-blue-200 sm:px-6 lg:px-8 ">
        <div class="mx-auto max-w-lg">
            <h1 class="text-center text-2xl font-bold text-blue-800 sm:text-3xl">Login akun</h1>

            <p class="mx-auto mt-4 max-w-md text-center text-blue-900">
                Dengan login menggunakan akun anda, anda akan dapat mengakses dan menggunakan website pengaduan kartar
                ini.
            </p>

            <form action="masuk.php" class="bg-blue-100 mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8"
                method="POST">
                <p class="text-center text-lg font-medium">Masukan akun anda</p>

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
                if ($error_pesan) {
                    ?>
                    <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
                        <strong class="block font-medium text-red-800"> <?= $error_pesan ?> </strong>
                    </div> <?php
                } ?>
                <button name="masuk" type="submit"
                    class="block w-full rounded-lg bg-blue-900 px-5 py-3 text-sm font-medium text-white">Masuk</button>
                <p class="text-center text-sm text-gray-500">Belum punya akun?<a class="underline"
                        href="daftar.php">Daftar Disini</a></p>
            </form>
        </div>
    </div>

</body>

</html>