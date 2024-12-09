<nav class="navbar navbar-dark bg-gray-900 shadow sticky-top navbar-expand-lg">
        <div class="container">
            <a class="fw-bold ms-4" href="{{ route('movies.index') }}">
                <img src="{{ asset('logo.png') }}" alt="Paciflix" class="d-inline-block align-text-top" height="100" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills ms-auto mb-2 mt-2 mb-lg-0 me-4 align-items-center">
                    <li class="nav-item col-12 col-md-auto align-items-center">
                        <a href="{{ route('movies.index') }}" class="nav-link fw-bold text-primary">Home</a>
                    </li>
                    <li class="nav-item col-12 col-md-auto align-items-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link fw-bold text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>