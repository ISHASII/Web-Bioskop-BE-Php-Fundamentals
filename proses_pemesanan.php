<!DOCTYPE html>
<!-- saved from url=(0053)http://localhost/php/bioskop/php/proses_pemesanan.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemesanan Tiket</title>
    <link href="./proses_pemesanan_files/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Tiket Pemesanan Bioskop</h3>
        <div class="alert alert-info">
            <p><strong>Nama Pemesan:</strong> Ilham Saputra</p>
            <p><strong>Film yang Dipilih:</strong> Sword Art Online I</p>
            <p><strong>Jumlah Tiket Dewasa:</strong> 3</p>
            <p><strong>Jumlah Tiket Anak-anak:</strong> 2</p>
            <p><strong>Hari Pemesanan:</strong> Weekend</p>
            <p><strong>Total Harga:</strong> Rp260.000</p>
            <p><strong>Diskon:</strong> Anda mendapatkan diskon 10%! Total setelah diskon: Rp234.000</p>
        </div>
        <!-- Tombol Cetak PDF -->
        <form action="http://localhost/php/bioskop/php/cetak_pdf.php" method="POST">
            <input type="hidden" name="nama" value="Ilham Saputra">
            <input type="hidden" name="pilih_film" value="Sword Art Online I">
            <input type="hidden" name="jumlah_tiket_dewasa" value="3">
            <input type="hidden" name="jumlah_tiket_anak" value="2">
            <input type="hidden" name="hari_pemesanan" value="weekend">
            <input type="hidden" name="total_harga" value="234000">
            <button type="submit" class="btn btn-danger">Cetak Tiket</button>
        </form>
    </div>


</body></html>