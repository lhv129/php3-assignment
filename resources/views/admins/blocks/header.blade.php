<!-- header -->
<header>
    <div class="notificationBar notificationBar--shop"></div>
    <div class="container-fluid">
        <div class="row justify-content-between py-3 border-bottom">
            <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                <div class="main-logo">
                    <a href="{{ route('/dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="" width="32" height="32"
                            class="rounded-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">Cài đặt chung</a></li>
                        <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('/dang-xuat') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- end header -->
