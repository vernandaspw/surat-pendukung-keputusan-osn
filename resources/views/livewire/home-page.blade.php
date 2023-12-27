<div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-around w-100 pt-5">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ url('/', []) }}"
                                    class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('img/logo.png') }}" width="180" alt="">
                                </a>
                                {{-- <p>Pilih</p> --}}
                                <div class="d-flex mb-3">
                                    {{-- <button type="button" wire:click="$set('isLogin', true)" class="btn @if($isLogin)
                                    btn-success active
                                    @else
                                    btn-white border
                                    @endif form-control  rounded-none">Masuk</button> --}}
                                    {{-- <button type="button" wire:click="$set('isLogin', false)" class="btn @if(!$isLogin)
                                    btn-success active
                                    @else
                                    btn-white border
                                    @endif form-control rounded-none">Daftar Peserta</button> --}}
                                </div>
                                @if($isLogin)
                                <form wire:submit='masuk'>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label mb-0">Username</label>
                                        <input wire:model='username' required type="text" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('username')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label mb-0">Password</label>
                                        <input wire:model='password' required type="password" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>

                                    <button type="submit"
                                        class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">Masuk</button>
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="./authentication-register.html">Create an account</a>
                                    </div> --}}
                                </form>
                                @else
                                <div class="">
                                    <p>Daftar sebagai peserta OSN</p>
                                </div>
                                <form wire:submit='daftar'>
                                    <div class="mb-1">
                                        <label for="exampleInputEmail1" class="form-label mb-0">Username</label>
                                        <input required wire:model='username' type="text" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('username')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="exampleInputPassword1" class="form-label mb-0">Password</label>
                                        <input required wire:model='password' type="password" class="form-control"
                                            id="exampleInputPassword1">
                                        @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <hr class="m-3">
                                    <div class="mt-1">
                                        <label for=""><b>Nama lengkap</b></label>
                                        <input required wire:model='nama' maxlength="30" class="form-control"
                                            type="text" name="" id="">
                                        @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>NIK</b></label>
                                        <input required wire:model='nik' maxlength="30" class="form-control"
                                            type="number" name="" id="">
                                        @error('nik')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>Tanggal lahir</b></label>
                                        <input required wire:model='tgl_lahir' class="form-control" type="date" name=""
                                            id="">
                                        @error('tgl_lahir')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>Bio</b> <span class="text-muted">(deskripsi mengenai
                                                kamu)</span></label>
                                        <input wire:model='bio' class="form-control" type="text" name="" id="">
                                        @error('bio')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>Kelas</b></label>
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
                                                <option value="{{ $subkelasItem->id }}">{{ $subkelasItem->nama }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>Alamat</b></label>
                                        <input wire:model='alamat' class="form-control" type="text" name="" id="">
                                        @error('alamat')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label for=""><b>Telepon</b></label>
                                        <input required wire:model='telp' maxlength="15" class="form-control"
                                            type="number" name="" id="">
                                        @error('telp')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn mt-2 btn-success w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        {{-- <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                                        <a class="text-success fw-bold ms-2" href="./authentication-login.html">Sign
                                            In</a> --}}
                                    </div>
                                </form>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-9">
                        <livewire:olimpiade-page />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
