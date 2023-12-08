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
                        <b>Kelola Akun</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-success">
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Status</th>

                                </thead>
                                <tbody>
                                    <tr class="bg-warning">
                                        <td>
                                            <input wire:model='new_username' type="text" class="form-control bg-white"
                                                placeholder="username baru">
                                        </td>
                                        <td>
                                            <input wire:model='new_password' type="text" class="form-control bg-white"
                                                placeholder="password baru">
                                        </td>
                                        <td>
                                            <select wire:model='new_role' class="form-control bg-white" id="">
                                                <option value="admin">admin</option>
                                                <option value="peserta">peserta</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select wire:model='new_isaktif' class="form-control bg-white" id="">
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak aktif</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" wire:click='simpanData'
                                                class="btn btn-success">Simpan</button>
                                        </td>

                                    </tr>
                                    @foreach ($users as $user)
                                    @if($ID != $user->id)
                                    <tr wire:click="ubahPage('{{ $user->id }}')">
                                        <td>{{ $user->username }}</td>
                                        <td></td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->isaktif == 1? 'Aktif' : 'Tidak aktif'}}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td><input wire:model='username' type="text" class="form-control"
                                                placeholder="username baru"></td>
                                        <td><input wire:model='password' type="text" class="form-control"
                                                placeholder="ubah password"></td>
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
