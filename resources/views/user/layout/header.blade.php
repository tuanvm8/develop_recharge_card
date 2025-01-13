{{-- <nav class="navbar navbar-expand-sm bg-primary main-nav">
    <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img style="height: 40px;" src=""
                alt="KIEMTIENYOUTUBE" />
        </a>
        <div class="d-flex justify-content-end">
            @if (Auth::check())
                <a class="btn btn-dangky nav-link d-block d-md-none d-md-none">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i> {{ Auth::user()->username }}
                </a>
                <a class="btn btn-dangky nav-link d-block d-md-none d-md-none">
                    <i class="fa-solid fa-file-invoice-dollar" style="color: #ffffff;"></i><span
                        class="user_point formattedNumber" style="color: red;">{{ Auth::user()->point }}</span>
                </a>
            @else
                <a class="btn btn-dangky nav-link d-block d-md-none d-md-none" href="{{ route('register.index') }}">
                    <i class="fa-solid fa-key"></i> Đăng ký
                </a>
                <span style="color: #fff;line-height: 30px;" class="d-block d-md-none d-md-none">|</span>
                <a class="btn btn-dangky nav-link d-block d-md-none d-md-none" href="{{ route('login.index') }}">
                    <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập
                </a>
            @endif

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse d-sm-block d-none" id="collapsibleNavId"> --}}
{{-- <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('introduction') }}">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('today_video') }}">Video hôm nay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('policy') }}">Chính sách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">Tin tức</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item d-block d-md-none d-md-none">
                        <a class="nav-link" href="{{ route('withdraw_money.index') }}"> Rút tiền </a>
                    </li>
                    <li class="nav-item d-block d-md-none d-md-none">
                        <a class="nav-link" href="{{ route('logout') }}"> Đăng xuất </a>
                    </li>
                @endif
            </ul> --}}
{{-- @if (Auth::check())
                <a class="btn btn-dangky nav-link d-none d-md-block">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i> {{ Auth::user()->username }}
                </a>
                <a class="btn btn-dangky nav-link d-none d-md-block">
                    <i class="fa-solid fa-file-invoice-dollar" style="color: #ffffff;"></i> <span
                        class="user_point formattedNumber" style="color: red;">{{ Auth::user()->point }}</span>
                </a>
                <a class="btn btn-dangky nav-link d-none d-md-block" href="{{ route('withdraw_money.index') }}">
                    <i class="fa-solid fa-money-bill-transfer"></i> Rút tiền
                </a>
                <a class="btn btn-dangky nav-link d-none d-md-block" href="{{ route('logout') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất
                </a> --}}
{{-- @else
                <a class="btn btn-dangky nav-link d-none d-md-block" href="{{ route('register.index') }}">
                    <i class="fa-solid fa-key"></i> Đăng ký
                </a>
                <span style="color: #fff;" class="d-none d-md-block">|</span>
                <a class="btn btn-dangky nav-link d-none d-md-block" href="{{ route('login.index') }}">
                    <i class="fa-solid fa-right-to-bracket"></i> Đăng nhập
                </a>
            @endif --}}
{{-- </div>
    </div>
</nav> --}}



<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img alt="Napluon logo" height="40" src="{{ asset('asset/images/logo_napluon.png') }}" width="160" />

        </a>
        <div class="collapse navbar-collapse" style="justify-content: flex-end">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <li class="nav-item dropdown px-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="font-weight: 550;">Mua Thẻ</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}"><i class="fas fa-gamepad me-3"></i>
                                Mua Thẻ Game
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('byCardPhone') }}"><i class="fas fa-phone me-3"></i>Mua Thẻ
                                ĐiệnThoại
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('loadedPhone') }}"><i class="fas fa-mobile-alt me-3"></i>
                                Nạp Điện Thoại
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('dataCard') }}"><i class="fas fa-wifi me-3"></i>
                                Mua Thẻ Data
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="#"><span style="font-weight: 550;"> Tin Tức<span> </a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('introduction') }}"> <span style="font-weight: 550;">Giới Thiệu <span></a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('policy') }}"> <span style="font-weight: 550;">Điều Khoản Sử Dụng<span> </a>
                </li>
            </ul>

            <div class="d-flex">
                <a href="{{ route('login.index') }}" class="me-2">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-lock me-2"></i><span style="font-weight: 550;">Đăng Nhập <span>
                    </button>
                </a>
                <a href="{{ route('register.index') }}">
                    <button class="btn btn-warning text-white" style="font-weight: 550;">
                        <i class="fas fa-user-plus me-2"></i>Tạo Tài Khoản
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>
