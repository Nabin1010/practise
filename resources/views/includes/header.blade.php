<header>
    <nav class="navbar navbar-expand-lg navbar dark">
        <a href="/" class="navbar-brand">Shopping Center</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home</a>
                <a class="nav-item nav-link " href="#">Features</a>
                <a class="nav-item nav-link " href="#">Price</a>

            </div>

        </div>
        @if (Auth::user())
    <a href="{{ url('/admin')}}" class="nav-link nav-user-img">
    <i class="fas fa-user  mr-2"></i>
</a>   
        @endif

    </nav>
</header>