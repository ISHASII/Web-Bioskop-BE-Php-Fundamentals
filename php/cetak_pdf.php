<?php
require '../vendor/autoload.php'; // Memuat DomPDF

use Dompdf\Dompdf;
use Dompdf\Options;

// Ambil data dari form yang dikirimkan
$nama = $_POST['nama'] ?? 'Tidak ada nama'; 
$pilih_film = $_POST['pilih_film'] ?? 'Tidak ada film'; 
$jumlah_tiket_dewasa = $_POST['jumlah_tiket_dewasa'] ?? 0; 
$jumlah_tiket_anak = $_POST['jumlah_tiket_anak'] ?? 0; 
$hari_pemesanan = $_POST['hari_pemesanan'] ?? 'Tidak ada hari'; 
$total_harga = $_POST['total_harga'] ?? 0; 

// HTML untuk tiket dalam format PDF
$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Tiket Pemesanan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; padding: 20px; }
        .ticket-box { border: 2px solid #000; padding: 20px; }
        h3 { text-align: center; }
        p { font-size: 16px; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='ticket-box'>
            <h3>Tiket Pemesanan Bioskop</h3>
            <p><strong>Nama Pemesan:</strong> " . htmlspecialchars(ucfirst($nama)) . "</p>
            <p><strong>Film yang Dipilih:</strong> " . htmlspecialchars($pilih_film) . "</p>
            <p><strong>Jumlah Tiket Dewasa:</strong> $jumlah_tiket_dewasa</p>
            <p><strong>Jumlah Tiket Anak-anak:</strong> $jumlah_tiket_anak</p>
            <p><strong>Hari Pemesanan:</strong> " . htmlspecialchars(ucfirst($hari_pemesanan)) . "</p>
            <p><strong>Total Harga:</strong> Rp" . number_format($total_harga, 0, ',', '.') . "</p>
            <p class='footer'>Terima kasih telah memesan tiket di IniBioskop. Selamat menonton!</p>
        </div>
    </div>
</body>
</html>
";

// Konfigurasi DomPDF
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Opsional) Set ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Output PDF ke browser untuk diunduh
$dompdf->stream("tiket-pemesanan.pdf", ["Attachment" => true]);
?>