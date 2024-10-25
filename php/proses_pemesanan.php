<?php
// Ambil data form
$nama = $_POST['nama'];
$pilih_film = $_POST['pilih_film'];
$jumlah_tiket_dewasa = $_POST['jumlah_tiket_dewasa'];
$jumlah_tiket_anak = $_POST['jumlah_tiket_anak'];
$hari_pemesanan = $_POST['hari_pemesanan'];

// Harga tiket
$harga_tiket_dewasa = 50000;
$harga_tiket_anak = 30000;

// Biaya tambahan jika pemesanan di weekend
$biaya_tambahan = $hari_pemesanan === 'weekend' ? 10000 : 0;

// Menghitung total harga
$total_harga_dewasa = ($harga_tiket_dewasa + $biaya_tambahan) * $jumlah_tiket_dewasa;
$total_harga_anak = ($harga_tiket_anak + $biaya_tambahan) * $jumlah_tiket_anak;
$total_harga = $total_harga_dewasa + $total_harga_anak;

// Diskon jika total lebih dari 150.000
if ($total_harga > 150000) {
    $diskon = $total_harga * 0.10;
    $total_harga -= $diskon;
    $diskon_message = "Anda mendapatkan diskon 10%! Total setelah diskon: Rp" . number_format($total_harga, 0, ',', '.');
} else {
    $diskon_message = "Tidak ada diskon.";
}

// Menampilkan hasil di halaman web
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Hasil Pemesanan Tiket</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>
    <div class='container mt-5'>
        <h3 class='text-center'>Tiket Pemesanan Bioskop</h3>
        <div class='alert alert-info'>
            <p><strong>Nama Pemesan:</strong> " . ucfirst($nama) . "</p>
            <p><strong>Film yang Dipilih:</strong> " . $pilih_film . "</p>
            <p><strong>Jumlah Tiket Dewasa:</strong> $jumlah_tiket_dewasa</p>
            <p><strong>Jumlah Tiket Anak-anak:</strong> $jumlah_tiket_anak</p>
            <p><strong>Hari Pemesanan:</strong> " . ucfirst($hari_pemesanan) . "</p>
            <p><strong>Total Harga:</strong> Rp" . number_format($total_harga_dewasa + $total_harga_anak, 0, ',', '.') . "</p>
            <p><strong>Diskon:</strong> $diskon_message</p>
        </div>
        <!-- Tombol Cetak PDF -->
        <form action='cetak_pdf.php' method='POST'>
            <input type='hidden' name='nama' value='" . $nama . "' />
            <input type='hidden' name='pilih_film' value='" . $pilih_film . "' />
            <input type='hidden' name='jumlah_tiket_dewasa' value='" . $jumlah_tiket_dewasa . "' />
            <input type='hidden' name='jumlah_tiket_anak' value='" . $jumlah_tiket_anak . "' />
            <input type='hidden' name='hari_pemesanan' value='" . $hari_pemesanan . "' />
            <input type='hidden' name='total_harga' value='" . $total_harga . "' />
            <button type='submit' class='btn btn-danger'>Cetak Tiket</button>
        </form>
    </div>
</body>
</html>
";
?>