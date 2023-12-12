<?php

namespace App\Livewire;

use App\Models\Osn;
use App\Models\OsnPeserta;
use Livewire\Component;

class DataOlimpiadePage extends Component
{
    public function render()
    {
        $data = Osn::latest();

        if ($this->editID) {
            $this->data_osn = Osn::find($this->editID);
            $peserta = OsnPeserta::where('osn_id', $this->editID)->latest();
            if ($this->lulus == true) {
                $peserta->where('status_lulus', true)->orderBy('nilai_saw', 'desc');
            }
            $this->data_pesertas = $peserta->get();
        }

        $this->datas = $data->get();
        return view('livewire.data-olimpiade-page');
    }

    public $datas = [];
    public $data_osn = [];
    public $data_pesertas = [];

    public $createPage = false;
    public $createPesertaPage = false;

    public $nama;
    public $keterangan;
    public $tgl_buka;
    public $tgl_tutup;
    public $tgl_pengumuman;
    public $bobot_matematika;
    public $bobot_fisika;
    public $bobot_kimia;
    public $bobot_biologi;
    public $peserta_lulus;
    public $isaktif = true;

    public function buat()
    {
        $osn = new Osn();
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
        $osn->peserta_lulus = $this->peserta_lulus;
        $osn->isaktif = $this->isaktif;
        $osn->save();

        $this->createPage = false;
        $this->dispatch('success', pesan: 'berhasil tambah osn');
    }

    public $editID;

    public function editPage($id)
    {
        $this->editID = $id;
        $d = Osn::find($id);
        $this->nama = $d->nama;
        $this->keterangan = $d->keterangan;
        $this->tgl_buka = $d->tgl_buka;
        $this->tgl_tutup = $d->tgl_tutup;
        $this->tgl_pengumuman = $d->tgl_pengumuman;
        $this->bobot_matematika = $d->bobot_matematika;
        $this->bobot_fisika = $d->bobot_fisika;
        $this->bobot_kimia = $d->bobot_kimia;
        $this->bobot_biologi = $d->bobot_biologi;
        $this->peserta_lulus = $d->peserta_lulus;
        $this->isaktif = $d->isaktif;
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->keterangan = null;
        $this->tgl_buka = null;
        $this->tgl_tutup = null;
        $this->tgl_pengumuman = null;
        $this->bobot_matematika = null;
        $this->bobot_fisika = null;
        $this->bobot_kimia = null;
        $this->bobot_biologi = null;
        $this->peserta_lulus = null;
    }

    public function simpanEdit()
    {
        $osn = Osn::find($this->editID);
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
        $osn->peserta_lulus = $this->peserta_lulus;
        $osn->isaktif = $this->isaktif;
        $osn->save();

        $this->createPage = false;
        $this->dispatch('success', pesan: 'berhasil tambah osn');
    }

    public function tutupPage()
    {
        $this->resetInput();
        $this->editID = null;
        $this->createPage = false;
    }

    public $tambahPeserta = false;
    public $peserta_id;
    public $lulus = false;

    public function pesertaBaru()
    {

    }

    public function toggleSeleksi($id)
    {
        $op = OsnPeserta::find($id);
        if ($op->status_seleksi == true) {
            $op->status_seleksi = false;
        } else {
            $op->status_seleksi = true;
        }
        $op->save();
    }

    public function toggleLulus($id)
    {
        $op = OsnPeserta::find($id);
        if ($op->status_lulus == true) {
            $op->status_lulus = false;
        } else {
            $op->status_lulus = true;
        }
        $op->save();
    }

    public function generateLulus($id)
    {
        dd($id);
        // Contoh data siswa dalam bentuk array
        $siswa1 = [
            'nama_siswa' => 'Siswa A',
            'matematika' => 75,
            'fisika' => 60,
            'kimia' => 90,
            'biologi' => 40,
        ];

        $siswa2 = [
            'nama_siswa' => 'Siswa B',
            'matematika' => 60,
            'fisika' => 80,
            'kimia' => 40,
            'biologi' => 95,
        ];

        $siswa3 = [
            'nama_siswa' => 'Siswa C',
            'matematika' => 90,
            'fisika' => 40,
            'kimia' => 75,
            'biologi' => 55,
        ];

        $siswa4 = [
            'nama_siswa' => 'Siswa D',
            'matematika' => 40,
            'fisika' => 95,
            'kimia' => 55,
            'biologi' => 70,
        ];

        $siswa5 = [
            'nama_siswa' => 'Siswa E',
            'matematika' => 70,
            'fisika' => 70,
            'kimia' => 70,
            'biologi' => 70,
        ];

        $dataSiswa = [$siswa1, $siswa2, $siswa3, $siswa4, $siswa5];

        // Tetapkan bobot untuk setiap kriteria dengan skala 1-5
        $bobot = [
            'matematika' => 5, // Contoh: Sangat Tinggi
            'fisika' => 4, // Contoh: Tinggi
            'kimia' => 3, // Contoh: Sedang
            'biologi' => 2, // Contoh: Rendah
        ];

        // Inisialisasi matriks normalisasi dan matriks bobot normalisasi
        $matriksNormalisasi = [];
        $matriksBobotNormalisasi = [];

        // Hitung matriks normalisasi
        foreach ($dataSiswa as $data) {
            $matriksNormalisasi[] = [
                'matematika' => $data['matematika'] / 100,
                'fisika' => $data['fisika'] / 100,
                'kimia' => $data['kimia'] / 100,
                'biologi' => $data['biologi'] / 100,
            ];
        }

        // Hitung matriks bobot normalisasi
        foreach ($matriksNormalisasi as $data) {
            $matriksBobotNormalisasi[] = [
                'matematika' => $data['matematika'] * $bobot['matematika'],
                'fisika' => $data['fisika'] * $bobot['fisika'],
                'kimia' => $data['kimia'] * $bobot['kimia'],
                'biologi' => $data['biologi'] * $bobot['biologi'],
            ];
        }

        // Hitung nilai SAW
        $nilaiSAW = [];
        foreach ($matriksBobotNormalisasi as $data) {
            $totalBobotNormalisasi = array_sum($data);
            $nilaiSAW[] = $totalBobotNormalisasi;
        }

        // Tampilkan hasil perhitungan
        echo "Hasil Perhitungan SAW:\n";
        for ($i = 0; $i < count($dataSiswa); $i++) {
            echo "{$dataSiswa[$i]['nama_siswa']} : {$nilaiSAW[$i]}\n";
        }

        // Simpan nilai SAW ke dalam database (opsional)
        $list_siswa = [];
        foreach ($dataSiswa as $key => $data) {
            $list_siswa[] = [
                'nama_siswa' => $data['nama_siswa'],
                'matematika' => $data['matematika'],
                'fisika' => $data['fisika'],
                'kimia' => $data['kimia'],
                'biologi' => $data['biologi'],
                'nilai_saw' => $nilaiSAW[$key],
            ];
        }
        dd($list_siswa);

    }

}
