<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

    <!-- Navbar -->
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteName() == 'front' ? 'active' : '' }}">
                <a class="nav-link" href="{{ config('app.url') }}">
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'stores' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('stores') }}">Stores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'inventory' ? 'active' : '' }}" href="{{ route('inventory') }}">View Inventory</a>
            </li>
        </ul>
    </div>
</nav>
