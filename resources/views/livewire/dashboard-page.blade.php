<div>
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col mt-5 pt-5"></div>
        </div>
        <div class="row">
            @if(auth()->user()->role == 'peserta')
            <div class="
            col-md-3
            ">
                <div class="card">
                    <div class="card-header">
                        <b>Data Saya</b>
                    </div>
                    <div class="card-body">
                        <form wire:submit="perbaruiData">
                            <div class="">
                                <label for="">Username</label>
                                <input disabled wire:model='username' class="form-control" type="text" name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">Nama lengkap</label>
                                <input required wire:model='nama' maxlength="30" class="form-control" type="text"
                                    name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">NIK</label>
                                <input required wire:model='nik' maxlength="30" class="form-control" type="number"
                                    name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">Tanggal lahir</label>
                                <input required wire:model='tgl_lahir' class="form-control" type="date" name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">Bio <span class="text-muted">(deskripsi mengenai kamu)</span></label>
                                <input wire:model='bio' class="form-control" type="text" name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">Kelas</span></label>
                                <div class="d-flex">
                                    <select required wire:model.live="kelas_id" class="form-control" id="">
                                        <option value="">Pilih</option>
                                        @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama }}</option>
                                        @endforeach
                                    </select>
                                    <select required wire:model.live="sub_kelas_id" class="form-control" id="">
                                        <option value="">Pilih sub</option>
                                        @if($subkelas)
                                        @foreach ($subkelas as $subkelasItem)
                                        <option value="{{ $subkelasItem->id }}">{{ $subkelasItem->nama }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="mt-1">
                                <label for="">Alamat</label>
                                <input wire:model='alamat' class="form-control" type="text" name="" id="">
                            </div>
                            <div class="mt-1">
                                <label for="">Telepon</label>
                                <input required wire:model='telp' maxlength="15" class="form-control" type="number"
                                    name="" id="">
                            </div>

                            <button type="submit" class="btn mt-2 btn-success form-control">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            <div class="
            @if(auth()->user()->role == 'peserta')
            col-md-9
            @else
            col-md-12
            @endif
            ">
                <livewire:olimpiade-page />
            </div>
        </div>

    </div>
</div>
