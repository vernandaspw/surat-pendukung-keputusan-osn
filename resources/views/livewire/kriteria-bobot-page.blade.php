<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="col-md-12">
            <div class="mt-2 mb-3">
                <h3><b>Kriteria Nilai Bobot</b></h3>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai rapot</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('rapot')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($rapots as $rapot)
                                @if ($rapot->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $rapot->bobot }}</td>
                                    <td>{{ $rapot->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $rapot->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $rapot->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $rapot->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai ranking</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('ranking')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($rankings as $data)
                                @if ($data->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $data->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $data->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $data->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai tes matematika</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('matematika')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($matematikas as $data)
                                @if ($data->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $data->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $data->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $data->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai tes fisika</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('fisika')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($matematikas as $data)
                                @if ($data->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $data->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $data->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $data->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai tes biologi</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('biologi')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($matematikas as $data)
                                @if ($data->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $data->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $data->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $data->id }})"
                                            class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow border border-2 mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="">
                        <h5><b>Kriteria nilai tes kimia</b></h5>
                    </div>
                    <button class="btn btn-success " wire:click="$set('createPage', true)">Buat data</button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table  table-bordered table-hover">
                            <thead class="bg-success text-white">
                                <th>Bobot</th>
                                <th>Skala nilai awal</th>
                                <th>s/d</th>
                                <th>Skala nilai akhir</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if($createPage)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td><button wire:click="simpan('kimia')" class="btn btn-success">Simpan</button>
                                    </td>
                                </tr>
                                @endif
                                @foreach ($matematikas as $data)
                                @if ($data->id == $editID)
                                <tr>
                                    <td><input wire:model="bobot" type="number" class="form-control"
                                            placeholder="bobot"></td>
                                    <td><input wire:model="nilai_awal" type="number" class="form-control"
                                            placeholder="Nilai awal"></td>
                                    <td>s/d</td>
                                    <td><input wire:model="nilai_akhir" type="number" class="form-control"
                                            placeholder="Nilai akhir"></td>
                                    <td>
                                        <button wire:click="edit()" class="btn btn-success">Simpan edit</button>
                                        <button wire:click="resetInput()" class="btn btn-danger">Batal</button>
                                    </td>
                                </tr>

                                @else
                                <tr>
                                    <td>{{ $data->bobot }}</td>
                                    <td>{{ $data->nilai_awal }}</td>
                                    <td>s/d</td>
                                    <td>{{ $data->nilai_akhir }}</td>
                                    <td>
                                        <button wire:click="editPage({{ $data->id }})"
                                            class="btn btn-warning me-2">Edit</button>
                                        <button wire:click="hapus({{ $data->id }})"
                                            class="btn btn-danger">Hapus</button>
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