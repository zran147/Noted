@push('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush

<!-- NAV BAR -->
<nav class="navbar navbar-light">
    <i class="hamburger fa-solid fa-bars"></i>
    <div class="sidebar">
        <!-- <a class="navbar-brand" href="#">Noted.</a> -->
        <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center justify-content-center">
                <h1 class="hamburger">Noted</h1>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link {{ ($title === 'Home') ? 'active' : ''  }}" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Transactions') ? 'active' : ''  }}" href="/transactions">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'MoneyBox') ? 'active' : ''  }}" href="/moneybox">MoneyBox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Notes') ? 'active' : ''  }}" href="/notes">Notes</a>
            </li>
        </ul>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        @auth
        <span class="white poppins me-4">
            Hello, {{ auth()->user()->namalengkap }}
        </span>
        <span>
            <a class="white poppins d-flex align-items-center nav-link px-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </span>
        @else
        <span>
            <a href="/login" class="white poppins d-flex align-items-center nav-link px-4 {{ ($title === 'login') ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
        </span>
            @endauth
    </div>
</nav>
<!-- NAV BAR -->