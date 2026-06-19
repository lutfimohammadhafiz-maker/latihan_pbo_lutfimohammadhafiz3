<?php
// TAHAP 6: Halaman antarmuka untuk menampilkan data
require_once 'config/database.php';
require_once 'classes/PendaftaranReguler.php';
require_once 'classes/PendaftaranPrestasi.php';
require_once 'classes/PendaftaranKedinasan.php';

// Inisialisasi database
$db = new Database();
$conn = $db->getConnection();

// Fungsi untuk menampilkan tabel dengan memanfaatkan method polimorfik
function tampilkanTabel($judul, $data, $className, $conn) {
    echo "<h2 style='color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 5px;'>$judul</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%; margin-bottom: 20px;'>";
    echo "<tr style='background-color: #3498db; color: white;'>";
    echo "<th>No</th><th>Nama</th><th>Sekolah</th><th>Nilai Ujian</th><th>Info Spesifik</th><th>Total Biaya</th>";
    echo "</tr>";
    
    $no = 1;
    foreach ($data as $row) {
        // Polimorfisme: instantiasi class sesuai jalur
        $pendaftaran = new $className($row);
        // Memanggil method polimorfik tampilkanInfoJalur() dan hitungTotalBiaya()
        $info = $pendaftaran->tampilkanInfoJalur();
        
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>" . htmlspecialchars($row['nama_calon']) . "</td>";
        echo "<td>" . htmlspecialchars($row['asal_sekolah']) . "</td>";
        echo "<td>" . $row['nilai_ujian'] . "</td>";
        
        // Menampilkan atribut unik masing-masing jalur
        echo "<td>";
        if ($className == 'PendaftaranReguler') {
            echo "Prodi: " . htmlspecialchars($info['program_studi']) . "<br>";
            echo "Kampus: " . htmlspecialchars($info['lokasi']);
        } elseif ($className == 'PendaftaranPrestasi') {
            echo "Jenis: " . htmlspecialchars($info['jenis_prestasi']) . "<br>";
            echo "Tingkat: " . htmlspecialchars($info['tingkat_prestasi']);
        } elseif ($className == 'PendaftaranKedinasan') {
            echo "SK: " . htmlspecialchars($info['sk_ikatan_dinas']) . "<br>";
            echo "Instansi: " . htmlspecialchars($info['instansi_sponsor']);
        }
        echo "</td>";
        
        // Menampilkan hasil kalkulasi dari method hitungTotalBiaya()
        echo "<td>Rp " . number_format($info['biaya_total'], 0, ',', '.') . "</td>";
        echo "</tr>";
        $no++;
    }
    echo "</table>";
}

// Menggunakan metode query spesifik dari masing-masing kelas
$reguler = new PendaftaranReguler();
$dataReguler = $reguler->getDaftarReguler($conn);

$prestasi = new PendaftaranPrestasi();
$dataPrestasi = $prestasi->getDaftarPrestasi($conn);

$kedinasan = new PendaftaranKedinasan();
$dataKedinasan = $kedinasan->getDaftarKedinasan($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMB Jalur Spesifik - Lutfi Mohammad Hafiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            margin: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        .total-info {
            background-color: #2c3e50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 SISTEM MANAJEMEN PMB - JALUR SPESIFIK</h1>
        <div class="total-info">
            <strong>Total Pendaftar: </strong> 
            <?php echo count($dataReguler) + count($dataPrestasi) + count($dataKedinasan); ?> Mahasiswa
        </div>

        <?php
        // Menampilkan data berdasarkan kategori (Jalur Reguler, Prestasi, Kedinasan)
        tampilkanTabel('📌 Jalur Reguler', $dataReguler, 'PendaftaranReguler', $conn);
        tampilkanTabel('🏆 Jalur Prestasi', $dataPrestasi, 'PendaftaranPrestasi', $conn);
        tampilkanTabel('🏛️ Jalur Kedinasan', $dataKedinasan, 'PendaftaranKedinasan', $conn);
        ?>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 5px; border-left: 4px solid #3498db;">
            <h3 style="margin: 0;">📝 Keterangan Biaya:</h3>
            <ul style="margin: 5px 0;">
                <li><strong>Reguler:</strong> Biaya standar (Rp <?php echo number_format(250000, 0, ',', '.'); ?>)</li>
                <li><strong>Prestasi:</strong> Diskon Rp50.000 dari biaya standar</li>
                <li><strong>Kedinasan:</strong> Surcharge 25% dari biaya standar</li>
            </ul>
        </div>
    </div>
</body>
</html>