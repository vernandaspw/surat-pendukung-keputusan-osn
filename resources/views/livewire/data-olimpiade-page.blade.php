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
                                <div class="mb-1">
                                    <label for="">bobot rapot</label>
                                    <input required wire:model='bobot_rapot' class="form-control" type="number"
                                        min="1" max="5" id="">
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
                                </div>

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
                                <div class="mb-1">
                                    <label for="">bobot rapot</label>
                                    <input required wire:model='bobot_rapot' class="form-control" type="number"
                                        min="1" max="5" id="">
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
                                </div>

                                <button type="submit" class="form-control btn btn-success shadow-sm">Simpan</button>
                                <button type="button" wire:click='tutupPage'
                                    class="form-control btn btn-white border mt-1 shadow-sm">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($tambahPeserta)

            @endif
            @if(!$tambahPeserta && !$peserta_id)

            @endif
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
                                <button
                                onclick="confirm('Anda yakin generate peserta yang ikut seleksi?') || event.stopImmediatePropagation()"
                                wire:click="generateLulus()"
                                class="btn btn-primary rounded-pill">Generate Kelulusan</button>
                                <button wire:click="$toggle('lulus')" class="btn btn-warning rounded-pill">@if($lulus ==
                                    true)
                                    Tampilkan semua
                                    @else
                                    Tampilkan yg lulus
                                    @endif</button>
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
                                        <th>Rapot</th>
                                        <th>Matematika</th>
                                        <th>Fisika</th>
                                        <th>Kimia</th>
                                        <th>Biologi</th>
                                        <th>Nilai SAW</th>
                                        <th>Status seleksi</th>
                                        <th>Status Lulus</th>
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
                                                {{ $peserta->nilai_rapot }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_matematika }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_fisika }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_kimia }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_biologi }}
                                            </td>
                                            <td>
                                                {{ $peserta->nilai_saw }}
                                            </td>
                                            <td>
                                                <button wire:click="toggleSeleksi('{{ $peserta->id }}')" class="btn {{ $peserta->status_seleksi ? 'btn-success' : 'btn-danger' }} rounded-pill btn-sm">{{ $peserta->status_seleksi ? 'ikuti seleksi' : 'tidak' }}</button>
                                            </td>
                                            <td>
                                                <button wire:click="toggleLulus('{{ $peserta->id }}')" class="btn {{ $peserta->status_lulus ? 'btn-success' : 'btn-danger' }} rounded-pill btn-sm">{{ $peserta->status_lulus ? 'lulus' : 'pending' }}</button>
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
                                    <th>bobot rapot</th>
                                    <th>bobot matematika</th>
                                    <th>bobot fisika</th>
                                    <th>bobot kimia</th>
                                    <th>bobot biologi</th>
                                    <th>Jml yg lulus</th>
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
                                        <td>{{ $data->bobot_rapot }}</td>
                                        <td>{{ $data->bobot_matematika }}</td>
                                        <td>{{ $data->bobot_fisika }}</td>
                                        <td>{{ $data->bobot_kimia }}</td>
                                        <td>{{ $data->bobot_biologi }}</td>
                                        <td>{{ $data->peserta_lulus }}</td>
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
