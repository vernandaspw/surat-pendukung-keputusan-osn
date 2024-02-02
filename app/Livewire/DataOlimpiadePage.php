<?php

namespace App\Livewire;

use App\Models\DataPeserta;
use App\Models\Kelas;
use App\Models\KriteriaNilai;
use App\Models\Osn;
use App\Models\OsnPeserta;
use App\Models\SubKelas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            } else if ($this->rekomendasi == 'fisika') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_fisika', 'desc')->get();
            } else if ($this->rekomendasi == 'kimia') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_kimia', 'desc')->get();
            } else if ($this->rekomendasi == 'biologi') {
                $peserta->where('rekomendasi', $this->rekomendasi);
                $this->data_pesertas = $peserta->orderBy('nilai_saw_biologi', 'desc')->get();
            } else {
                $this->data_pesertas = $peserta->get();
            }
        }

        $this->datas = $data->get();

        $this->kelass = Kelas::get();

        if ($this->c_kelas_id) {
            $this->sub_kelass = SubKelas::where('kelas_id', $this->c_kelas_id)->get();
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
    public $bobot_matematika;
    public $bobot_rapot;
    public $bobot_ranking;
    public $bobot_fisika;
    public $bobot_kimia;
    public $bobot_biologi;
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
        $osn->bobot_ranking = $this->bobot_ranking;
        $osn->bobot_rapot = $this->bobot_rapot;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
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
        $this->bobot_ranking = $d->bobot_ranking;
        $this->bobot_rapot = $d->bobot_rapot;
        $this->bobot_matematika = $d->bobot_matematika;
        $this->bobot_fisika = $d->bobot_fisika;
        $this->bobot_kimia = $d->bobot_kimia;
        $this->bobot_biologi = $d->bobot_biologi;
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
        $this->bobot_ranking = null;
        $this->bobot_rapot = null;
        $this->bobot_matematika = null;
        $this->bobot_fisika = null;
        $this->bobot_kimia = null;
        $this->bobot_biologi = null;
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
        $osn->bobot_rapot = $this->bobot_rapot;
        $osn->bobot_ranking = $this->bobot_ranking;
        $osn->bobot_matematika = $this->bobot_matematika;
        $osn->bobot_fisika = $this->bobot_fisika;
        $osn->bobot_kimia = $this->bobot_kimia;
        $osn->bobot_biologi = $this->bobot_biologi;
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

    public $c_peserta_id;
    public $c_nik;
    public $c_nama;
    public $c_tgl_lahir;
    public $c_kelas_id;
    public $sub_kelas_id;

    public $c_telp;
    public $c_nilai_ranking;
    public $c_nilai_rapot;
    public $c_nilai_matematika;
    public $c_nilai_fisika;
    public $c_nilai_kimia;
    public $c_nilai_biologi;

    public function tutupPesertaBaru()
    {
        $this->tambahPeserta = false;
        $this->c_peserta_id = null;
        $this->c_nik = null;
        $this->c_nama = null;
        $this->c_tgl_lahir = null;
        $this->c_kelas_id = null;
        $this->sub_kelas_id = null;

        $this->c_telp = null;
        $this->c_nilai_ranking = null;
        $this->c_nilai_rapot = null;
        $this->c_nilai_matematika = null;
        $this->c_nilai_fisika = null;
        $this->c_nilai_kimia = null;
        $this->c_nilai_biologi = null;
    }

    public function pesertaBaru()
    {

        try {
            DB::beginTransaction();

            $cek = OsnPeserta::where('osn_id', $this->editID)->whereRelation('data_peserta', 'nik', $this->c_nik)->first();
            if ($cek) {
                return $this->dispatch('error', pesan: 'Sudah pernah daftar');
            }
            // buat peserta
            // buat akun
            $user = new User();
            $user->username = $this->c_nik;
            $user->password = Hash::make($this->c_tgl_lahir);
            $user->role = 'peserta';
            $user->isaktif = true;
            $user->save();

            $dpeserta = DataPeserta::where('nik', $this->c_nik)->first();
            if (!$dpeserta) {
// buat data peserta
                $dp = new DataPeserta();
                $dp->nik = $this->c_nik;
                $dp->user_id = $user->id;
                $dp->nama = $this->c_nama;
                $dp->tgl_lahir = $this->c_tgl_lahir;
                $dp->kelas_id = $this->c_kelas_id;
                $dp->sub_kelas_id = $this->sub_kelas_id;

                $dp->telp = $this->c_telp;
                $dp->isaktif = true;
                $dp->save();
            } else {
                $dp = $dpeserta;
            }

            $op = new OsnPeserta();
            $op->osn_id = $this->editID;
            $op->user_id = $user->id;
            $op->data_peserta_id = $dp->id;
            $op->nilai_ranking = $this->c_nilai_ranking;
            $op->nilai_rapot = $this->c_nilai_rapot ? $this->c_nilai_rapot : 0;
            $op->nilai_matematika = $this->c_nilai_matematika;
            $op->nilai_fisika = $this->c_nilai_fisika;
            $op->nilai_kimia = $this->c_nilai_kimia;
            $op->nilai_biologi = $this->c_nilai_biologi;
            $op->save();

            DB::commit();
            $this->dispatch('success', pesan: 'berhasil tambah data');
            $this->tutupPesertaBaru();
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e);
        }

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

        try {
            $osn = Osn::find($this->editID);
            $pesertas = OsnPeserta::where('osn_id', $this->editID)->get();

            // menntukan bobot berdasarkan nilai_rapot peserta berdasarkan kriteria
            // Determine bobot berdasarkan nilai_rapot peserta berdasarkan kriteria
            $bobotPeserta = [];
            foreach ($pesertas as $peserta) {
                $bobotPeserta[] = [
                    'rapot' => $this->determineBobot($peserta->nilai_rapot, 'rapot'),
                    'ranking' => $this->determineBobot($peserta->nilai_ranking, 'ranking'),
                    'matematika' => $this->determineBobot($peserta->nilai_matematika, 'matematika'),
                    'fisika' => $this->determineBobot($peserta->nilai_fisika, 'fisika'),
                    'kimia' => $this->determineBobot($peserta->nilai_kimia, 'kimia'),
                    'biologi' => $this->determineBobot($peserta->nilai_biologi, 'biologi'),
                ];
            }

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

            // Hitung matriks bobot normalisasi
            foreach ($matriksNormalisasi as $key => $data) {
                $matriksBobotNormalisasi[] = [
                    'rapot' => $data['rapot'] * $bobotPeserta[$key]['rapot'],
                    'ranking' => $data['ranking'] * $bobotPeserta[$key]['ranking'],
                    'matematika' => $data['matematika'] * $bobotPeserta[$key]['matematika'],
                    'fisika' => $data['fisika'] * $bobotPeserta[$key]['fisika'],
                    'kimia' => $data['kimia'] * $bobotPeserta[$key]['kimia'],
                    'biologi' => $data['biologi'] * $bobotPeserta[$key]['biologi'],
                ];
            }
            // dd($matriksBobotNormalisasi);

            // Hitung nilai SAW
            // Hitung nilai SAW untuk semua mata pelajaran
            $nilaiSAW = [];
            foreach ($matriksNormalisasi as $data) {
                $totalBobotNormalisasi_matematika = ($data['rapot'] + $data['matematika'] - $data['ranking']) * ($osn->bobot_matematika + $osn->bobot_rapot - $osn->bobot_rapot);
                $totalBobotNormalisasi_fisika = ($data['rapot'] + $data['fisika'] - $data['ranking']) * ($osn->bobot_fisika + $osn->bobot_rapot - $osn->bobot_rapot);
                $totalBobotNormalisasi_kimia = ($data['rapot'] + $data['kimia'] - $data['ranking']) * ($osn->bobot_kimia + $osn->bobot_rapot - $osn->bobot_rapot);
                $totalBobotNormalisasi_biologi = ($data['rapot'] + $data['biologi'] - $data['ranking']) * ($osn->bobot_biologi + $osn->bobot_rapot - $osn->bobot_rapot);

                // Hitung total nilai SAW untuk setiap mata pelajaran
                $nilaiSAW[] = [
                    'matematika' => $totalBobotNormalisasi_matematika,
                    'fisika' => $totalBobotNormalisasi_fisika,
                    'kimia' => $totalBobotNormalisasi_kimia,
                    'biologi' => $totalBobotNormalisasi_biologi,
                ];
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
                    'nilai_saw_matematika' => $nilaiSAW[$key]['matematika'],
                    'nilai_saw_fisika' => $nilaiSAW[$key]['fisika'],
                    'nilai_saw_kimia' => $nilaiSAW[$key]['kimia'],
                    'nilai_saw_biologi' => $nilaiSAW[$key]['biologi'],
                ]);
            }

            // Simpan nilai saw ke dalam database
            foreach ($list_siswa as $itemPeserta) {
                $up = OsnPeserta::find($itemPeserta['id']);
                $up->nilai_saw_matematika = $itemPeserta['nilai_saw_matematika'];
                $up->nilai_saw_fisika = $itemPeserta['nilai_saw_fisika'];
                $up->nilai_saw_kimia = $itemPeserta['nilai_saw_kimia'];
                $up->nilai_saw_biologi = $itemPeserta['nilai_saw_biologi'];

                // Menentukan mata pelajaran dengan nilai terbesar sebagai rekomendasi
                $nilaiMapel = [
                    'matematika' => $itemPeserta['nilai_saw_matematika'],
                    'fisika' => $itemPeserta['nilai_saw_fisika'],
                    'kimia' => $itemPeserta['nilai_saw_kimia'],
                    'biologi' => $itemPeserta['nilai_saw_biologi'],
                ];
                $nilaiTerbesar = max($nilaiMapel);
                $mataPelajaranTerbesar = array_search($nilaiTerbesar, $nilaiMapel);
                $up->rekomendasi = $mataPelajaranTerbesar;
                $up->save();
            }

            $this->dispatch('success', pesan: 'berhasil generate peserta yg lulus');
        } catch (\Throwable $e) {
            dd($e);
            //throw $th;
        }
    }

    private function determineBobot($nilai, $kriteria)
    {
        $bobotNilai = KriteriaNilai::get();
        foreach ($bobotNilai as $bobot) {
            if ($bobot->kriteria == $kriteria) {
                if ($nilai >= $bobot->nilai_awal && $nilai <= $bobot->nilai_akhir) {
                    return $bobot->bobot;
                }
            }
        }
        return 0; // Default value if criteria not found
    }
}
