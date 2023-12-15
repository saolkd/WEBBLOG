<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts Recipe | Nourriture</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#">
                                <h3>Nourriture</h3>
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item{{ request()->is('admin') ? 'active' : '' }}">
                            <a href="/admin" class="sidebar-link">
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/posts', 'admin/style') ? 'active' : '' }} has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Posts</span>
                            </a>
                            <ul class="submenu {{ request()->is('admin/posts', 'admin/style') ? 'active' : '' }}">
                                <li class="submenu-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                                    <a href="/admin/posts">Home</a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/style') ? 'active' : '' }}">
                                    <a href="/admin/style">Recipe</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item{{ request()->is('admin/about') ? 'active' : '' }}">
                            <a href="/admin/about" class="sidebar-link">
                                <i class="fa-solid fa-circle-info"></i>
                                <span>About</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">Admin</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('assets/images/faces/1.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/admin/logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>POSTS RECIPE</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                        <li class="breadcrumb-item">Posts</li>
                                        <li class="breadcrumb-item active" aria-current="page">Recipe</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0 shadow-sm rounded mt-3">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#PostsModal">TAMBAH POST</button>
                                            </div>
                                            <div class="col-auto">
                                                <form action="" method="get">
                                                    <div class="input-group">
                                                        <input type="search" name="keyword_admin" class="form-control" placeholder="Search" aria-describedby="button-addon2">
                                                        <button class="btn btn-primary" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3  ">
                                            <table class="table table-bordered table-light">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>GAMBAR</th>
                                                        <th>JUDUL</th>
                                                        <th>CONTENT</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                $no = 1;
                                                @endphp
                                                <tbody>
                                                    @forelse ($styles as $index => $style)
                                                    <tr>
                                                        <td>{{ $index + $styles->firstItem() }}</td>
                                                        <td class="">
                                                            <img src="{{ asset('/storage/posts/'.$style->image) }}" class="rounded" style="width: 150px;">
                                                        </td>
                                                        <td>{{ $style->title }}</td>
                                                        <td>{!! Str::limit($style->content, 350, '...') !!}</td>
                                                        <td class="text-center">
                                                            <form action="{{ route('style.destroy', $style->id) }}" method="POST">
                                                                <a href="{{ route('style.show', $style->id) }}" class="btn btn-sm btn-dark mb-2">SHOW</a>
                                                                <a href="{{ route('style.edit', $style->id) }}" class="btn btn-sm btn-primary mb-2">EDIT</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger hapus mb-2">HAPUS</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <div class="alert alert-danger">
                                                        Tidak Ada Data Untuk Ditampilkan
                                                    </div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        {{ $styles->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal -->
                <div class="modal fade" id="PostsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH POSTS STYLE</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('style.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-bold mb-2">GAMBAR</label>
                                        <input type="file" class="form-control mb-3 @error('image') is-invalid @enderror" name="image">
                                        <!-- error message untuk title -->
                                        @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold mb-2">JUDUL</label>
                                        <input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul">
                                        <!-- error message untuk title -->
                                        @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold mb-2">KONTEN</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten">{{ old('content') }}</textarea>
                                        <!-- error message untuk content -->
                                        @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                                        <button type="reset" class="btn btn-warning">RESET</button>
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">CLOSE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2023 &copy; Nourriture</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('success') }}", 'BERHASIL!', {
            timeOut: 4000
        });
    </script>
    @elseif(Session::has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{ Session::get('error') }}", 'GAGAL!', {
            timeOut: 4000
        });
    </script>
    @endif

    <script type="text/javascript">
        $('.hapus').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal.fire({
                    title: 'Yakin Akan Menghapus Data Ini?',
                    text: "Data Akan Dihapus Permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#435ebe',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Delete!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>