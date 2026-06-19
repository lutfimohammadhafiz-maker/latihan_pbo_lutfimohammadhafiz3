<?php
// TAHAP 3: Abstract class dengan properti terenkapsulasi (protected)
abstract class Pendaftaran {
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    // Constructor untuk mapping dari database
    public function __construct($data = []) {
        if (!empty($data)) {
            $this->id_pendaftaran = $data['id_pendaftaran'] ?? null;
            $this->nama_calon = $data['nama_calon'] ?? '';
            $this->asal_sekolah = $data['asal_sekolah'] ?? '';
            $this->nilai_ujian = $data['nilai_ujian'] ?? 0;
            $this->biayaPendaftaranDasar = $data['biaya_pendaftaran_dasar'] ?? 0;
        }
    }

    // Method Abstrak (Tanpa Isi/Body)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();

    // Getter methods
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }
}
?>