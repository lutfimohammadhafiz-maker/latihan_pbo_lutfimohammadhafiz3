<?php
// TAHAP 4: Kelas anak Kedinasan dengan pewarisan dari Pendaftaran
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($data = []) {
        parent::__construct($data);
        $this->skIkatanDinas = $data['sk_ikatan_dinas'] ?? '';
        $this->instansiSponsor = $data['instansi_sponsor'] ?? '';
    }

    // Method abstrak dari parent
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return [
            'jalur' => 'Kedinasan',
            'sk_ikatan_dinas' => $this->skIkatanDinas,
            'instansi_sponsor' => $this->instansiSponsor,
            'biaya_total' => $this->hitungTotalBiaya()
        ];
    }

    // Metode Query Spesifik untuk jalur Kedinasan
    public function getDaftarKedinasan($db) {
        $stmt = $db->prepare("SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>