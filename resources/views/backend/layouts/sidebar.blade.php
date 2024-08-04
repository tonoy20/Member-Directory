<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('carosels.index') }}">
                        <i class="bi bi-circle"></i><span>Carosel</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="bi bi-circle"></i><span>users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.registerMember.index') }}">
                        <i class="bi bi-circle"></i><span>members</span>
                    </a>
                </li>
                <hr>

                <li>
                    <a href="{{ route('abouts.index') }}">
                        <i class="bi bi-circle"></i><span>about</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="{{ route('events.index') }}">
                        <i class="bi bi-circle"></i><span>event</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('notices.index') }}">
                        <i class="bi bi-circle"></i><span>notice</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="{{ route('contacts.index') }}">
                        <i class="bi bi-circle"></i><span>contact</span>
                    </a>
                </li>
                <hr>
            </ul>
        </li>
    </ul>
</aside>
