<div>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success">
                        <b>Kelola Kelas</b>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead class="bg-success">
                                    <th>Kelas</th>
                                    <th>SubKelas</th>
                                </thead>
                                <tbody>
                                    @foreach ($kelass as $kelas)
                                    <tr>
                                        <td>
                                            {{ $kelas->nama }} <button  wire:loading.attr='disabled' wire:click="hapusKelas('{{ $kelas->id }}')"
                                                class="btn btn-sm btn-danger">hapus</button>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($kelas->subkelas as $subkelas)
                                                <li>
                                                    {{ $subkelas->nama }} <button wire:loading.attr='disabled'
                                                        wire:click="hapusSubkelas('{{ $subkelas->id }}')"
                                                        class="btn btn-sm btn-danger">hapus</button>
                                                </li>
                                                @endforeach
                                                <button wire:loading.attr='disabled' wire:click="tambahSubPage('{{ $kelas->id }}')"
                                                    class="btn btn-sm btn-warning mt-1">tambah subkelas</button>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @if($kelas_id)
                <div class="card">
                    <div class="card-header bg-warning">
                        Tambah Subkelas
                    </div>
                    <div class="card-body">
                        <form wire:submit='tambahSubKelas'>
                            <b>Kelas : {{ $kelasname }}</b>
                            <div class="mb-2 mt-2">

                                <label for="">SubKelas</label>
                                <input required wire:model='nama' maxlength="10" type="text" class="form-control" id="">
                            </div>
                            <button type="submit" class="btn btn-success form-control">Simpan</button>
                            <button wire:click='tambahkelaspage' type="button"
                                class="btn btn-light mt-2 form-control">Batal</button>
                        </form>
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="card-header bg-success">
                        Tambah kelas
                    </div>
                    <div class="card-body">
                        <form wire:submit='tambahKelas'>
                            <div class="mb-2">
                                <label for="">Kelas</label>
                                <input required wire:model='kelas' maxlength="10" type="text" class="form-control"
                                    id="">
                            </div>
                            <button type="submit" class="btn btn-success form-control">Simpan</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
