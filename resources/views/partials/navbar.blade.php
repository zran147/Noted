   <!-- NAV BAR -->
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255, 165, 89, 1); color:rgba(69, 69, 69, 1);">
    <div class="container">
      <a class="navbar-brand" href="#">Noted.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : ''  }}" href="/home">Home</a>
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
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hello, {{ auth()->user()->namalengkap }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
            <form action="">
              <button type="submit" class="nav-item"><i class="bi bi-box-arrow-right"></i> Logout
              </button>
            </form>
          </ul>
        </li>
        <form action="/logout" method="post">
          @csrf
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Logout") ? 'active' : ''  }}" href="/login"><i class="bi bi-box-arrow-right"></i> Logout  </a>
          </li>
        </form>
        @else
          <li class="nav-item">
            <a href="/login" class="nav-link {{ ($title === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i>
              Login</a>
          </li>
        </ul>
        @endauth
      </div>
    </div>
  </nav>

        {{-- <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hello, {{ auth()->user()->namalengkap }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($title === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i>
                Login</a>
            </li>
          </ul>
          @endauth
        </ul>
      </div>
    </div>
  </nav> --}}
  <!-- NAV BAR -->
  