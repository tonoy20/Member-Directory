<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center">
            <h1 class="sitename"><img src="{{ asset('image/logo/11.jpeg') }}" alt=""></h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li><a href="{{ route('frontend.about') }}">About</a></li>

                <li><a href="{{ route('frontend.registerMember.index') }}">Members</a></li>
                <li><a href="{{ route('frontend.registerMember.create') }}">Apply for membership</a></li>
                <li><a href="{{ route('frontend.events') }}">Events</a></li>

                <li><a href="{{ route('frontend.notices') }}">Notice</a></li>
                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>

                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">

                                Logout
                            </button>
                        </form>
                    </li>
                @endif


            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
