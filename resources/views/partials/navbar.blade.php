<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 165, 89, 1); color:rgba(69, 69, 69, 1);">
  <div class="container">
    <a class="navbar-brand" href="#">Noted.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Home') ? 'active' : ''  }}" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Transactions") ? 'active' : ''  }}" href="/transactions">Transactions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "MoneyBox") ? 'active' : ''  }}" href="/moneybox">MoneyBox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Notes") ? 'active' : ''  }}" href="/notes">Notes</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item ml-auto">
                <span class="navbar-text me-2">
                    Hello, {{ auth()->user()->namalengkap }}
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ ($title === "login") ? 'active' : '' }}"><i
                        class="bi bi-box-arrow-right"></i>
                    Login</a>
            </li>
        </ul>
        @endauth
    </div>
  </div>
</nav>
<!-- NAV BAR -->
