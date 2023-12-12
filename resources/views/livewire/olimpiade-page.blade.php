<div>
    @if($osn_id)
    <div class="card mb-0">
        <div class="card-body">
            <div class=" d-flex justify-content-between">
                <div class="">
                   @if(auth()->user()->role != 'peserta')
                   <button wire:click="$set('$osn_id', null)" class="btn btn-warning rounded-pill">Kembali</button>
                   @endif
                </div>
                <div class="">
                    <b>{{ $osn->nama }}</b>
                </div>
                <div class="">
                    @if(auth()->user()->role == 'peserta')
                    <button wire:click="$set('daftarPage', true)" class="btn btn-success rounded-pill">Daftar / Ikut
                        OSN</button>
                        @endif
                </div>
            </div>
        </div>
    </div>
    @if($daftarPage)
    <div class="col-4">
        <div class="card mt-2">
            <div class="card-body">
                <div class="">
                    <form wire:submit="daftar">
                        <h5>Masukan Nilai Dibawah ini</h5>
                        <div class="mb-1">
                            <label for="">Nilai Matematika (0-100)</label>
                            <input type="number" wire:model='nilai_matematika' max="100" min="0" id="" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label for="">Nilai fisika (0-100)</label>
                            <input type="number" wire:model='nilai_fisika' max="100" min="0" id="" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label for="">Nilai kimia (0-100)</label>
                            <input type="number" wire:model='nilai_kimia' max="100" min="0" id="" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label for="">Nilai biologi (0-100)</label>
                            <input type="number" wire:model='nilai_biologi' max="100" min="0" id="" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success form-control mb-2 mt-2">Daftar</button>
                        <button wire:click='tutupDaftar' type="button" class="btn btn-white border form-control mb-2">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row mt-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <b>Detail OSN</b>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div class="mt-2">
                        <b>{{ $osn->nama }}</b>
                    </div>
                    <div class="">
                        <div class="">
                            Tanggal pendaftaran : {{ $osn->tgl_buka }} - {{$osn->tgl_tutup}}
                        </div>
                        <div class="">
                            Tanggal pengumuman : {{ $osn->tgl_pengumuman }}
                        </div>
                        <div class="">
                            Peserta yg diterima : {{ $osn->peserta_lulus }}
                        </div>
                    </div>
                    <div class="mt-2 mb-2">
                        {{ $osn->keterangan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header p-1 d-flex">
                    <button wire:click="$set('pesertaPage', 1)" class="btn @if($pesertaPage == 1)
                    btn-success text-white
                    @else
                    btn-white border
                    @endif form-control">Semua Peserta yang ikut</button>
                    <button wire:click="$set('pesertaPage', 2)" class="btn @if($pesertaPage == 2)
                    btn-success text-white
                    @else
                    btn-white border
                    @endif form-control">Peserta yang lulus</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>
                                    NIK / NIS
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Tanggal lahir
                                </th>
                                <th>
                                    Status Lulus
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($pesertas as $peserta)
                                <tr>
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
                                        <span class="{{ $peserta->status_lulus ? 'text-success' : '' }}">{{
                                            $peserta->status_lulus ? 'Lulus' : '-' }}</span>
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

    @if(!$osn_id)
    <div class="card mb-0">
        <div class="card-body">
            {{-- <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="{{ asset('img/logo.png') }}" width="180" alt="">
            </a> --}}
            <center>
                <h3><b>SPK OSN SIT {{ env('APP_TEMPAT') }}</b></h3>
            </center>
            <center>
                <p>
                    Aplikasi Pendukung Keputusan Olimpiade Siswa Nasional
                </p>
            </center>

            <div class="d-flex mb-3">
                {{-- <button class="btn btn-white border  form-control  rounded-none">Yang diikuti</button> --}}
                <button wire:click="$set('status', 2)" class="btn @if($status == 2)
                btn-success
                @else
                btn-white border
                @endif form-control  rounded-none">Sedang Berlangsung</button>
                <button wire:click="$set('status', 3)" class="btn @if($status == 3)
                btn-success
                @else
                btn-white border
                @endif form-control rounded-none">Selesai</button>
            </div>
            <div class="mt-2">
                @foreach ($osns as $osn)
                <a href="javascript:void()" wire:click="detailPage('{{ $osn->id }}')"
                    class="card shadow-none border border-success rounded">
                    <div class="card-body p-3 text-dark">
                        <h4><b>{{ $osn->nama }}</b></h4>
                        <div class="">
                            <div class="">
                                Tanggal pendaftaran : {{ $osn->tgl_buka }} - {{$osn->tgl_tutup}}
                            </div>
                            <div class="">
                                Tanggal pengumuman : {{ $osn->tgl_pengumuman }}
                            </div>
                            <div class="">
                                Peserta yg diterima : {{ $osn->peserta_lulus }}
                            </div>
                        </div>
                        <div class="mt-2 mb-2">
                            {{ $osn->keterangan }}
                        </div>

                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>
    @endif
</div>
