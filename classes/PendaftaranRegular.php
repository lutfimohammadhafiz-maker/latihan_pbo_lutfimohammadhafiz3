<?php
// TAHAP 4: Kelas anak Reguler dengan pewarisan dari Pendaftaran
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($data = []) {
        parent::__construct($data);
        $this->pilihanProdi = $data['pilihan_prodi'] ?? '';
        $this->lokasiKampus = $data['lokasi_kampus'] ?? '';
    }

    // Method abstrak dari parent
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return [
            'jalur' => 'Reguler',
            'program_studi' => $this->pilihanProdi,
            'lokasi' => $this->lokasiKampus,
            'biaya_total' => $this->hitungTotalBiaya()
        ];
    }

    // Metode Query Spesifik untuk jalur Reguler
    public function getDaftarReguler($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>