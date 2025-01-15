<div class="main-header">
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a
                        class="dropdown-toggle profile-pic"
                        data-bs-toggle="dropdown"
                        href="#"
                        aria-expanded="false"
                    >
                        <div class="avatar-sm">
                            <img
                                src="{{ asset('assets/img/logo-user.png') }}"
                                alt="..."
                                class="avatar-img rounded-circle"
                            />
                        </div>
                        <span class="profile-username">
                                    {{--<span class="fw-bold">{{ Auth()->user()->name }}</span>--}}
                                    <span class="fw-bold">#</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img
                                            src="{{ asset('assets/img/logo-user.png') }}"
                                            alt="image profile"
                                            class="avatar-img rounded"
                                        />
                                    </div>
                                    <div class="u-text">
                                        {{--<h4>{{ Auth()->user()->name }}</h4>--}}
                                        {{--<p class="text-muted">{{ Auth()->user()->email }}</p>--}}
                                        <h4>#</h4>
                                        <p class="text-muted">#</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a class="dropdown-item" href="#">--}}
                                {{--Account Setting--}}
                                {{--</a>--}}
                                <div class="dropdown-divider"></div>

                                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                {{--onclick="event.preventDefault();--}}
                                {{--document.getElementById('logout-form').submit();">--}}
                                {{--Выйти из системы--}}
                                {{--</a>--}}

                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                                {{--@csrf--}}
                                {{--</form>--}}
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
