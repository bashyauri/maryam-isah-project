<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#password-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="password-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="">Update
                            Password</a></li>
                    <li class="nav-item"> <a class="nav-link" href="">Update
                            Details</a></li>
                </ul>
            </div>
        </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Applicants</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="">Shortlist</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="">Drop
                                Candidate</a></li>

                    </ul>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Applicants</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/dashboard') }}">Not
                                Pay Applicants
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="">Recommended
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="">Shortlisted
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
