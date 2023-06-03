<!-- NAV BAR -->
<nav class="navbar navbar-light">
    <i class="hamburger fa-solid fa-bars"></i>
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Noted.</a> -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
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
    </div>
    <div style="display: flex">
        @auth
        <span class="me-4">
            Hello, {{ auth()->user()->namalengkap }}
        </span>
        <span class="me-4">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </span>
        @else
        <a href="/login" class="nav-link {{ ($title === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i>Login</a>
        @endauth
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</nav>
<!-- NAV BAR -->