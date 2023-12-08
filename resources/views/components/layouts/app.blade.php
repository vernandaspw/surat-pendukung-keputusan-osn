<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'SPK OSN '.env('APP_TEMPAT') }}</title>
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('Modernize-1.0.0/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('Modernize-1.0.0/src/assets/css/styles.min.css') }}" />


</head>

<body>
    @if(auth()->check())



    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ url('/', []) }}" class="text-nowrap logo-img">
                        <img src="{{ asset('img/logo.png') }}" width="180"
                            alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu"></span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('dashboard', []) }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if(auth()->user()->role == 'admin')
                        <li class="sidebar-item ">
                            <a class="sidebar-link" href="{{ url('data-olimpiade', []) }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Data OSN</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Data</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('kelas', []) }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Data Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('peserta', []) }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Data peserta</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('akun', []) }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Akun</span>
                            </a>
                        </li>
                        @endif  
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <livewire:navbar-page />
            {{ $slot }}
        </div>
    </div>
    @else
    {{ $slot }}
    @endif


    <script src="{{ asset('Modernize-1.0.0/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('Modernize-1.0.0/src/assets/js/dashboard.js') }}"></script>

    <script src="{{ asset('sweatalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', data => {
                console.log(data.pesan);
                Swal.fire({
                    position: 'center',
                    title: 'success!',
                    text: data.pesan,
                    icon: 'success',
                    confirmButtonText: 'oke'
                    // showConfirmButton: false
                    // , timer: 1500
                })
            })
            Livewire.on('error', data => {
                console.log(data.pesan);
                Swal.fire({
                    position: 'center',
                    title: 'error!',
                    text: data.pesan,
                    icon: 'error',
                    confirmButtonText: 'oke'
                    // showConfirmButton: false
                    // , timer: 1500
                })
            })
        })

    </script>

</body>

</html>
