<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo" style="background-color: inherit;">
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            @if (Auth::user()->role == 'student')
                <h3 class="page-title">Student Dashboard</h3>
            @else
                <h3 class="page-title">Lecturer Dashboard</h3>
            @endif
                <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (Auth::user()->role == 'student')
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="#">Lecturer</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>

        <div class="header-body-right">
            <div class="d-flex align-items-center">
                <a onclick="document.getElementById('logout-form').submit()" class="nav-link bg-none">
                    Logout
                </a>
            </div>
        </div>

    </div>

    <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
    </form>
</div>
