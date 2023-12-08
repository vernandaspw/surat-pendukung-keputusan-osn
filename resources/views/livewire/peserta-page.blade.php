<div>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Kelola Data Peserta</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="bg-success">
                                    <th>username</th>
                                    <th>password</th>
                                    <th>nik</th>
                                    <th>nama</th>
                                    <th>tgl_lahir</th>
                                    <th>bio</th>
                                    <th>kelas</th>
                                    <th>subkelas</th>
                                    <th>alamat</th>
                                    <th>telp</th>
                                    <th>isaktif</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    @if($ID != $data->id)
                                    <tr wire:click="ubahPage('{{ $data->id }}')">
                                        <td>{{ $data->username }}</td>
                                        <td></td>
                                        <td>{{ $data->nik }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->tgl_lahir }}</td>
                                        <td>{{ $data->bio }}</td>
                                        <td>{{ $data->kelas->nama }}</td>
                                        <td>{{ $data->subkelas->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->telp }}</td>
                                        <td>{{ $data->isaktif == 1? 'Aktif' : 'Tidak aktif'}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><input wire:model='username' type="text" class="form-control"
                                                placeholder="username baru"></td>
                                        <td><input wire:model='password' type="text" class="form-control"
                                                placeholder="password baru"></td>
                                        <td><select wire:model='role' class="form-control" id="">
                                                <option value="admin">admin</option>
                                                <option value="peserta">peserta</option>
                                            </select></td>
                                        <td><select wire:model='isaktif' class="form-control" id="">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak aktif</option>
                                        </select></td>
                                        <td>
                                            <button type="button" wire:click='ubahData'
                                                class="btn btn-success">Simpan</button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
