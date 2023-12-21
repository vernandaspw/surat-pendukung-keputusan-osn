<div>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="row">
            @if($createPage)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Buat OSN baru
                    </div>
                    <div class="card-body">
                        <div class="">
                            <form wire:submit='buat'>
                                <div class="mb-1">
                                    <label for="">Nama acara OSN</label>
                                    <input required wire:model='nama' class="form-control" type="text" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">keterangan</label>
                                    <textarea required wire:model='keterangan' class="form-control" id="" cols="30"
                                        rows="5"></textarea>
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl buka pendaftaran</label>
                                    <input required wire:model='tgl_buka' class="form-control" type="date" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl tutup pendaftaran</label>
                                    <input required wire:model='tgl_tutup' class="form-control" type="date" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl pengumuman</label>
                                    <input required wire:model='tgl_pengumuman' class="form-control" type="date" id="">
                                </div>
                                {{-- <div class="mb-1">
                                    <label for="">bobot ranking</label>
                                    <input required wire:model='bobot_ranking' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot rapot</label>
                                    <input required wire:model='bobot_rapot' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot matematika</label>
                                    <input required wire:model='bobot_matematika' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot fisika</label>
                                    <input required wire:model='bobot_fisika' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot kimia</label>
                                    <input required wire:model='bobot_kimia' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot biologi</label>
                                    <input required wire:model='bobot_biologi' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">Jumlah peserta yg lulus</label>
                                    <input required wire:model='peserta_lulus' class="form-control" type="number" id="">
                                </div> --}}

                                <button type="submit" class="form-control btn btn-success">Simpan</button>
                                <button type="button" class="form-control btn btn-white mt-1 border"
                                    wire:click='tutupPage'>Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($editID)
            <div class="col-md-3 d-print-none">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="">
                            Edit data OSN
                        </div>
                        <div class="">
                            <button type="button" wire:click='tutupPage'
                                class="form-control btn btn-warning m-0 border shadow-sm">Kembali</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <form wire:submit='simpanEdit'>
                                <div class="mb-1">
                                    <label for="">Nama acara OSN</label>
                                    <input required wire:model='nama' class="form-control" type="text" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">keterangan</label>
                                    <textarea required wire:model='keterangan' class="form-control" id="" cols="30"
                                        rows="5"></textarea>
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl buka pendaftaran</label>
                                    <input required wire:model='tgl_buka' class="form-control" type="date" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl tutup pendaftaran</label>
                                    <input required wire:model='tgl_tutup' class="form-control" type="date" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">tgl pengumuman</label>
                                    <input required wire:model='tgl_pengumuman' class="form-control" type="date" id="">
                                </div>
                                {{-- <div class="mb-1">
                                    <label for="">bobot ranking</label>
                                    <input required wire:model='bobot_ranking' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot rapot</label>
                                    <input required wire:model='bobot_rapot' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot matematika</label>
                                    <input required wire:model='bobot_matematika' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot fisika</label>
                                    <input required wire:model='bobot_fisika' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot kimia</label>
                                    <input required wire:model='bobot_kimia' class="form-control" type="number" min="1"
                                        max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">bobot biologi</label>
                                    <input required wire:model='bobot_biologi' class="form-control" type="number"
                                        min="1" max="5" id="">
                                </div>
                                <div class="mb-1">
                                    <label for="">Jumlah peserta yg lulus</label>
                                    <input required wire:model='peserta_lulus' class="form-control" type="number" id="">
                                </div> --}}

                                <button type="submit" class="form-control btn btn-success shadow-sm">Simpan</button>
                                <button type="button" wire:click='tutupPage'
                                    class="form-control btn btn-white border mt-1 shadow-sm">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($tambahPeserta)
            <div class="col-md-4 d-print-none">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Tambaha peserta baru
                    </div>
                    <div class="card-body">
                        <div class="">

                            <form wire:submit="pesertaBaru">

                                <div class="mb-1">
                                    <label for="">nik / nis</label>
                                    <input class="form-control" required wire:model='c_nik' type="number">
                                </div>
                                <div class="mb-1">
                                    <label for="">nama</label>
                                    <input class="form-control" required wire:model='c_nama' type="text">
                                </div>
                                <div class="mb-1">
                                    <label for="">Tanggal lahir</label>
                                    <input class="form-control" required wire:model='c_tgl_lahir' type="date">
                                </div>
                                <div class="mb-1">
                                    <label for="">Kelas</label>
                                    <select class="form-control" required wire:model.live='c_kelas_id' id="">
                                        <option value="">Pilih</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="">Sub Kelas</label>
                                    <select class="form-control" required wire:model.live='sub_kelas_id' id="">
                                        <option value="">Pilih</option>
                                        @foreach($sub_kelass as $sub_kelas)
                                        <option value="{{ $sub_kelas->id }}">{{ $sub_kelas->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-1">
                                    <label for="">telp</label>
                                    <input class="form-control" wire:model='c_telp' type="number" maxlength="15">
                                </div>


                                <h5>Masukan Nilai Dibawah ini</h5>
                                <div class="mb-1">
                                    <label for="">Ranking</label>
                                    <input type="number" wire:model='c_nilai_ranking' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="">Nilai Rapot</label>
                                    <input type="number" wire:model='c_nilai_rapot' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="">Nilai Matematika (0-100)</label>
                                    <input type="number" wire:model='c_nilai_matematika' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="">Nilai fisika (0-100)</label>
                                    <input type="number" wire:model='c_nilai_fisika' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="">Nilai kimia (0-100)</label>
                                    <input type="number" wire:model='c_nilai_kimia' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label for="">Nilai biologi (0-100)</label>
                                    <input type="number" wire:model='c_nilai_biologi' max="100" min="0" id=""
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success form-control">
                                    Simpan
                                </button>
                                <button type="button" wire:click="tutupPesertaBaru()"
                                    class="btn btn-white mt-1 form-control">
                                    Batal
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(!$tambahPeserta && !$peserta_id)
            <div class="col d-print-table">
                <div class="card">
                    <div class="card-header d-print-none">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <b>Data Peserta OSN</b>
                                </div>
                                {{-- <button class="btn btn-success rounded-pill">Tambah Peserta</button> --}}
                            </div>
                            <div class="">
                                <button wire:click="$set('tambahPeserta', true)"
                                    class="btn btn-warning rounded-pill">Tambah peserta</button>
                                <button
                                    onclick="confirm('Anda yakin generate peserta yang ikut seleksi?') || event.stopImmediatePropagation()"
                                    wire:click="generateLulus()" class="btn btn-primary rounded-pill">Generate
                                    Kelulusan</button>
                                <select wire:model.live='rekomendasi' class="btn btn-success rounded-pill" id="">
                                    <option value="semua">semua</option>
                                    <option value="matematika">matematika</option>
                                    <option value="fisika">fisika</option>
                                    <option value="kimia">kimia</option>
                                    <option value="biologi">biologi</option>
                                </select>
                                <button onclick="window.print()" class="btn btn-secondary rounded-pill">Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table  table-sm table-bordered table-hover">
                                    <thead class="bg-success text-white">
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tgl lahir</th>
                                        <th>Kelas</th>
                                        <th>Ranking</th>
                                        <th>Rapot</th>
                                        <th>Matematika</th>
                                        <th>Fisika</th>
                                        <th>Kimia</th>
                                        <th>Biologi</th>
                                        <th>Rekomendasi</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($data_pesertas as $peserta)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $peserta->data_peserta->nik }}
                                            </td>
                                            <td>
                                                {{ $peserta->data_peserta->nama }}
                                            </td>
                                            <td>
                                                {{ $peserta->data_peserta->tgl_lahir }}
                                            </td>
                                            <td>
                                                {{ $peserta->data_peserta->kelas->nama }} -
                                                {{ $peserta->data_peserta->subkelas->nama }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_ranking }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_rapot }}
                                            </td>
                                            <td>
                                                <b>{{ $peserta->nilai_matematika }}</b> ({{
                                                $peserta->nilai_saw_matematika }})
                                            </td>
                                            <td>
                                                <b>{{ $peserta->nilai_fisika }}</b> ({{ $peserta->nilai_saw_fisika }})
                                            </td>
                                            <td>
                                                <b>{{ $peserta->nilai_kimia }}</b> ({{ $peserta->nilai_saw_kimia }})
                                            </td>
                                            <td>
                                                <b>{{ $peserta->nilai_biologi }}</b> ({{ $peserta->nilai_saw_biologi }})
                                            </td>

                                            <td>
                                                {{ $peserta->rekomendasi }}
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @endif
            @if(!$createPage && !$editID)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class=""><b>Data OSN</b></div>
                            <div class="">
                                <button wire:click="$set('createPage', true)"
                                    class="btn btn-success rounded-pill shadow-sm">OSN Baru</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-success text-white">
                                    <th>Nama</th>
                                    <th>Tgl mulai Pendaftaran</th>
                                    <th>Tgl tutup Pendaftaran</th>
                                    <th>Tgl pengumuman</th>
                                    {{-- <th>bobot ranking</th>
                                    <th>bobot rapot</th>
                                    <th>bobot matematika</th>
                                    <th>bobot fisika</th>
                                    <th>bobot kimia</th>
                                    <th>bobot biologi</th>
                                    <th>Jml yg lulus</th> --}}
                                    <th>Status</th>
                                    <th>Peserta saat ini</th>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr wire:click="editPage('{{ $data->id }}')">
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->tgl_buka }}</td>
                                        <td>{{ $data->tgl_tutup }}</td>
                                        <td>{{ $data->tgl_pengumuman }}</td>
                                        {{-- <td>{{ $data->bobot_ranking }}</td>
                                        <td>{{ $data->bobot_rapot }}</td>
                                        <td>{{ $data->bobot_matematika }}</td>
                                        <td>{{ $data->bobot_fisika }}</td>
                                        <td>{{ $data->bobot_kimia }}</td>
                                        <td>{{ $data->bobot_biologi }}</td>
                                        <td>{{ $data->peserta_lulus }}</td> --}}
                                        <td>{{ $data->isaktif ? 'Buka' : 'tutup'}}</td>
                                        <td>
                                            {{ $data->pesertas->count() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
