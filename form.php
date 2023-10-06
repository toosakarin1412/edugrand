<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex flex-col gap-5 items-center justify-center h-screen">
        <div class="bg-[#b9dbff] p-5 border border-[#73aff3] rounded-xl flex flex-col gap-5 text-center">
            <?php
                $lolos = false;
                $kurang_mampu = false;
                $pekerjaan = $_POST["pekerjaan"];
                $nama = $_POST["nama"];
                $gaji = $_POST["gaji"];
                $tanggungan = $_POST["tanggungan"];
                $kendaraan = $_POST["kendaraan"];
                $nilai = $_POST["nilai"];
                $nasional = $_POST["nasional"];
                $provinsi = $_POST["provinsi"];

                // Check conditions for $kurang_mampu
                if ($pekerjaan !== "pns" && ($gaji / $tanggungan) < 1000000 && $kendaraan <= 2) {
                    $kurang_mampu = true;
                } elseif ($pekerjaan !== "pns" && ($gaji / $tanggungan) < 700000) {
                    $kurang_mampu = true;
                }

                // Check conditions for $lolos
                if ($nasional >= 2) {
                    $lolos = true;
                } elseif ($nasional == 1 && $nilai >= 85) {
                    $lolos = true;
                } elseif ($provinsi >= 2 && $nilai >= 90) {
                    $lolos = true;
                } elseif ($provinsi == 1 && $nilai >= 93) {
                    $lolos = true;
                } elseif ($kurang_mampu && $nasional >= 1) {
                    $lolos = true;
                } elseif ($kurang_mampu && $provinsi >= 1 && $nilai >= 90) {
                    $lolos = true;
                }

                if ($lolos) {
                    echo "<p class='text-4xl font-bold'>Selamat</p>";
                    echo "<p class='text-xl font-bold py-5'>Anda lolos dalam pendaftaran beasiswa ini</p>";
                }else{
                    echo "<p class='text-4xl font-bold'>Mohon Maaf</p>";
                    echo "<p class='text-xl font-bold py-5'>Anda belum lolos dalam pendaftaran beasiswa ini</p>";
                }
            ?>
        </div>

        <a href="form.html">Kembali</a>
    </div>
</body>

</html>