<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use App\Models\Kelas;
use App\Models\Osn;
use App\Models\OsnPeserta;
use App\Models\SubKelas;
use Livewire\Component;

class DataOlimpiadePage extends Component
{
    public $rekomendasi = 'semua';

    public function render()
    {
        $data = Osn::latest();

        if ($this->editID) {
            $this->data_osn = Osn::find($this->editID);
            $peserta = OsnPeserta::where('osn_id', $this->editID)->latest();
            if ($this->rekomendasi == 'matematika') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_matematika', 'desc')->get();
            }
            else if ($this->rekomendasi == 'fisika') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_fisika', 'desc')->get();
            }
            else if ($this->rekomendasi == 'kimia') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_kimia', 'desc')->get();
            }
            else if ($this->rekomendasi == 'biologi') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_biologi', 'desc')->get();
            }
            else{
                $this->data_pesertas = $peserta->get();
            }
        }

        $this->datas = $data->get();

        $this->kelass = Kelas::get();

        if ($this->kelas_id) {
            $this->sub_kelass = SubKelas::where('kelas_id', $this->kelas_id)->get();
        }

        $this->pesertas = DataPeserta::latest()->get();
        return view('livewire.data-olimpiade-page');
    }

    public $kelas_id;
    public $pesertas = [];
    public $kelass = [];
    public $sub_kelass = [];

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
    // public $bobot_matematika;
    // public $bobot_rapot;
    // public $bobot_ranking;
    // public $bobot_fisika;
    // public $bobot_kimia;
    // public $bobot_biologi;
    // public $peserta_lulus;
    public $isaktif = true;

    public function buat()
    {
        $osn = new Osn();
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        // $osn->bobot_ranking = $this->bobot_ranking;
        // $osn->bobot_rapot = $this->bobot_rapot;
        // $osn->bobot_matematika = $this->bobot_matematika;
        // $osn->bobot_fisika = $this->bobot_fisika;
        // $osn->bobot_kimia = $this->bobot_kimia;
        // $osn->bobot_biologi = $this->bobot_biologi;
        // $osn->peserta_lulus = $this->peserta_lulus;
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
        // $this->bobot_ranking = $d->bobot_ranking;
        // $this->bobot_rapot = $d->bobot_rapot;
        // $this->bobot_matematika = $d->bobot_matematika;
        // $this->bobot_fisika = $d->bobot_fisika;
        // $this->bobot_kimia = $d->bobot_kimia;
        // $this->bobot_biologi = $d->bobot_biologi;
        // $this->peserta_lulus = $d->peserta_lulus;
        $this->isaktif = $d->isaktif;
    }

    public function resetInput()
    {
        $this->nama = null;
        $this->keterangan = null;
        $this->tgl_buka = null;
        $this->tgl_tutup = null;
        $this->tgl_pengumuman = null;
        // $this->bobot_ranking = null;
        // $this->bobot_rapot = null;
        // $this->bobot_matematika = null;
        // $this->bobot_fisika = null;
        // $this->bobot_kimia = null;
        // $this->bobot_biologi = null;
        // $this->peserta_lulus = null;
    }

    public function simpanEdit()
    {
        $osn = Osn::find($this->editID);
        $osn->nama = $this->nama;
        $osn->keterangan = $this->keterangan;
        $osn->tgl_buka = $this->tgl_buka;
        $osn->tgl_tutup = $this->tgl_tutup;
        $osn->tgl_pengumuman = $this->tgl_pengumuman;
        // $osn->bobot_rapot = $this->bobot_rapot;
        // $osn->bobot_ranking = $this->bobot_ranking;
        // $osn->bobot_matematika = $this->bobot_matematika;
        // $osn->bobot_fisika = $this->bobot_fisika;
        // $osn->bobot_kimia = $this->bobot_kimia;
        // $osn->bobot_biologi = $this->bobot_biologi;
        // $osn->peserta_lulus = $this->peserta_lulus;
        $osn->isaktif = $this->isaktif;
        $osn->save();

        $this->createPage = false;
        $this->dispatch('success', pesan: 'berhasil edit osn');
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
    public $tipe_peserta = 1;

    public function pesertaBaru()
    {

    }

    // public function toggleSeleksi($id)
    // {
    //     $op = OsnPeserta::find($id);
    //     if ($op->status_seleksi == true) {
    //         $op->status_seleksi = false;
    //     } else {
    //         $op->status_seleksi = true;
    //     }
    //     $op->save();
    // }

    // public function toggleLulus($id)
    // {
    //     $op = OsnPeserta::find($id);
    //     if ($op->status_lulus == true) {
    //         $op->status_lulus = false;
    //     } else {
    //         $op->status_lulus = true;
    //     }
    //     $op->save();
    // }

    public function generateLulus()
    {
        $osn = Osn::find($this->editID);
        $pesertas = OsnPeserta::where('osn_id', $this->editID)->where('status_seleksi', true)->get();

        // Inisialisasi matriks normalisasi dan matriks bobot normalisasi
        $matriksNormalisasi = [];
        $matriksBobotNormalisasi = [];

        // Hitung matriks normalisasi
        foreach ($pesertas as $peserta) {
            $matriksNormalisasi[] = [
                'rapot' => $peserta->nilai_rapot / 100,
                'ranking' => $peserta->nilai_ranking / 100,
                'matematika' => $peserta->nilai_matematika / 100,
                'fisika' => $peserta->nilai_fisika / 100,
                'kimia' => $peserta->nilai_kimia / 100,
                'biologi' => $peserta->nilai_biologi / 100,
            ];
        }

        // dd($matriksNormalisasi);
        // Hitung matriks bobot normalisasi
        // foreach ($matriksNormalisasi as $data) {
        //     $matriksBobotNormalisasi[] = [
        //         'id' => $data['id'],
        //         'rapot' => $data['rapot'] * $osn->bobot_rapot,
        //         'ranking' => $data['ranking'] * $osn->bobot_ranking,
        //         'matematika' => $data['matematika'] * $osn->bobot_matematika,
        //         'fisika' => $data['fisika'] * $osn->bobot_fisika,
        //         'kimia' => $data['kimia'] * $osn->bobot_kimia,
        //         'biologi' => $data['biologi'] * $osn->bobot_biologi,
        //     ];
        // }
        // dd( $matriksBobotNormalisasi);

        // Hitung nilai SAW
        $nilaiSAW_matematika = [];
        $nilaiSAW_fisika = [];
        $nilaiSAW_kimia = [];
        $nilaiSAW_biologi = [];
        foreach ($matriksNormalisasi as $data) {
            $totalBobotNormalisasi_matematika = $data['rapot'] + $data['matematika'] - $data['ranking'];
            $totalBobotNormalisasi_fisika = $data['rapot'] + $data['fisika'] - $data['ranking'];
            $totalBobotNormalisasi_kimia = $data['rapot'] + $data['kimia'] - $data['ranking'];
            $totalBobotNormalisasi_biologi = $data['rapot'] + $data['biologi'] - $data['ranking'];
            $nilaiSAW_matematika[] = $totalBobotNormalisasi_matematika;
            $nilaiSAW_fisika[] = $totalBobotNormalisasi_fisika;
            $nilaiSAW_kimia[] = $totalBobotNormalisasi_kimia;
            $nilaiSAW_biologi[] = $totalBobotNormalisasi_biologi;
        }

        // Simpan nilai SAW ke dalam database (opsional)
        $list_siswa = [];
        foreach ($pesertas as $key => $data) {

            $list_siswa[] = collect([
                'id' => $data->id,
                'nama_siswa' => $data->data_peserta->nama,
                'ranking' => $data->nilai_ranking,
                'matematika' => $data->nilai_matematika,
                'fisika' => $data->nilai_fisika,
                'kimia' => $data->nilai_kimia,
                'biologi' => $data->nilai_biologi,
                'nilai_saw_matematika' => $nilaiSAW_matematika[$key],
                'nilai_saw_fisika' => $nilaiSAW_fisika[$key],
                'nilai_saw_kimia' => $nilaiSAW_kimia[$key],
                'nilai_saw_biologi' => $nilaiSAW_biologi[$key],
            ]);
        }

        // simpan nilai saw
        foreach ($list_siswa as $itemPeserta) {
            $up = OsnPeserta::find($itemPeserta['id']);
            $up->nilai_saw_matematika = $itemPeserta['nilai_saw_matematika'];
            $up->nilai_saw_fisika = $itemPeserta['nilai_saw_fisika'];
            $up->nilai_saw_kimia = $itemPeserta['nilai_saw_kimia'];
            $up->nilai_saw_biologi = $itemPeserta['nilai_saw_biologi'];

            $nilaiMapel = array(
                'matematika' => $itemPeserta['nilai_saw_matematika'],
                'fisika' => $itemPeserta['nilai_saw_fisika'],
                'kimia' =>  $itemPeserta['nilai_saw_kimia'],
                'biologi' => $itemPeserta['nilai_saw_biologi'],
            );
            // Menentukan nilai terbesar
            $nilaiTerbesar = max($nilaiMapel);
            // Menentukan mata pelajaran dengan nilai terbesar
            $mataPelajaranTerbesar = array_search($nilaiTerbesar, $nilaiMapel);
            $up->rekomendasi = $mataPelajaranTerbesar;
            $up->save();
        }

        // $list_siswa = collect($list_siswa)->sortByDesc('nilai_saw')->values()->all();
        // $topJumlahLulus = array_slice($list_siswa, 0, $osn->peserta_lulus);

        // foreach ($topJumlahLulus as $itemP) {
        //     $up = OsnPeserta::find($itemP['id']);
        //     $up->status_lulus = true;
        //     $up->save();
        // }

        $this->dispatch('success', pesan: 'berhasil generate peserta yg lulus');
    }


}
