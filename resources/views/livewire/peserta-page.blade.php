<div>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="row">
            @if ($createPage)
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-success">
                        Buat data
                    </div>
                    <div class="card-body">
                        <div class="">
                            <form wire:submit='create'>
                                <div class="mb-1">
                                    <label for="">nik / nis</label>
                                    <input class="form-control" required wire:model='nik' type="number">
                                </div>
                                {{-- <div class="mb-1">
                                    <label for="">Password</label>
                                    <input class="form-control" required wire:model='password' type="text">
                                </div> --}}
                                <div class="mb-1">
                                    <label for="">nama</label>
                                    <input class="form-control" required wire:model='nama' type="text">
                                </div>
                                <div class="mb-1">
                                    <label for="">Tanggal lahir</label>
                                    <input class="form-control" required wire:model='tgl_lahir' type="date">
                                </div>
                                <div class="mb-1">
                                    <label for="">Kelas</label>
                                    <select class="form-control" required wire:model.live='kelas_id' id="">
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
                                    <label for="">alamat</label>
                                    <input class="form-control" wire:model='alamat' type="text">
                                </div>
                                <div class="mb-1">
                                    <label for="">telp</label>
                                    <input class="form-control" wire:model='telp' type="number" maxlength="15">
                                </div>
                                <div class="mb-1">
                                    <label for="">status akun</label>
                                    <select class="form-control" wire:model='isaktif' id="">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success form-control">
                                    Simpan
                                </button>
                                <button type="button" wire:click="$set('createPage', false)"
                                    class="btn btn-white mt-1 form-control">
                                    Batal
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($ID)
            <div class="col-4">
                <div class="card">
                    <div class="card-header bg-success">
                        Edit data
                    </div>
                    <div class="card-body">
                        <div class="">
                            <form wire:submit='edit'>
                                <div class="mb-1">
                                    <label for="">nik / nis</label>
                                    <input class="form-control" required wire:model='nik' maxlength="30" type="number">
                                </div>
                                <div class="mb-1">
                                    <label for="">Username</label>
                                    <input class="form-control" required wire:model='username' maxlength="20" type="text">
                                </div>
                                {{-- <div class="mb-1">
                                    <label for="">Password</label>
                                    <input class="form-control"  wire:model='password' type="text">
                                </div> --}}
                                <div class="mb-1">
                                    <label for="">nama</label>
                                    <input class="form-control" required wire:model='nama' type="text">
                                </div>
                                <div class="mb-1">
                                    <label for="">Tanggal lahir</label>
                                    <input class="form-control" required wire:model='tgl_lahir' type="date">
                                </div>
                                <div class="mb-1">
                                    <label for="">Kelas</label>
                                    <select class="form-control" required wire:model.live='kelas_id' id="">
                                        <option value="">Pilih</option>
                                        @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">

                                    <label for="">Sub Kelas</label>
                                    <select class="form-control" required wire:model='sub_kelas_id' id="">
                                        <option value="">Pilih</option>
                                        @foreach($sub_kelass as $sub_kelas)
                                        <option value="{{ $sub_kelas->id }}">{{ $sub_kelas->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label for="">alamat</label>
                                    <input class="form-control" wire:model='alamat' type="text">
                                </div>
                                <div class="mb-1">
                                    <label for="">telp</label>
                                    <input class="form-control" wire:model='telp' type="number" maxlength="15">
                                </div>
                                <div class="mb-1">
                                    <label for="">status akun</label>
                                    <select class="form-control" wire:model='isaktif' id="">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success form-control">
                                    Simpan
                                </button>
                                <button type="button" wire:click="$set('ID', null)"
                                    class="btn btn-white mt-1 form-control">
                                    Batal
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($createPage == false && $ID == null)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class=""><b>Kelola Data Peserta</b></div>
                        <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table  table-bordered">
                                <thead class="bg-success">
                                    <th>username</th>
                                    {{-- <th>password</th> --}}
                                    <th>nik / nis</th>
                                    <th>nama</th>
                                    <th>tgl_lahir</th>
                                    <th>kelas</th>
                                    <th>subkelas</th>
                                    <th>alamat</th>
                                    <th>telp</th>
                                    <th>isaktif</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)

                                    <tr>
                                        <td>{{ $data->user->username }}</td>
                                        <td></td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->tgl_lahir }}</td>
                                        <td>{{ $data->kelas ? $data->kelas->nama : '-' }}</td>
                                        <td>{{ $data->subkelas ? $data->subkelas->nama : '-' }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->telp }}</td>
                                        <td>{{ $data->isaktif == 1? 'Aktif' : 'Tidak aktif'}}</td>
                                        <td>
                                            <button class="btn btn-warning" wire:click="ubahPage('{{ $data->id }}')">
                                                Edit
                                            </button>
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
