<?php
// TAHAP 4: Kelas anak Prestasi dengan pewarisan dari Pendaftaran
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($data = []) {
        parent::__construct($data);
        $this->jenisPrestasi = $data['jenis_prestasi'] ?? '';
        $this->tingkatPrestasi = $data['tingkat_prestasi'] ?? '';
    }

    // Method abstrak dari parent
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return [
            'jalur' => 'Prestasi',
            'jenis_prestasi' => $this->jenisPrestasi,
            'tingkat_prestasi' => $this->tingkatPrestasi,
            'biaya_total' => $this->hitungTotalBiaya()
        ];
    }

    // Metode Query Spesifik untuk jalur Prestasi
    public function getDaftarPrestasi($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>