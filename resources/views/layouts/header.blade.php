<header>
    <div class="logo">
        <img src="{{ asset('/photos/logoyos.jpg') }}" alt="Logo Yos">
        {{-- <h1>SMAK Yos Sudarso</h1> --}}
        <label for="toggle" class="toggle-label"><i class="fas fa-bars"></i></label>
    </div>
    <input type="checkbox" class="toggle" id="toggle">
    <nav>
        <ul>
        <li><a href="/">Home</a></li>
            <li>
                <a href="#">About</a>
                <ul>
                    <li><a href="{{ route('layout.history') }}">History</a></li>
                    <li><a href="{{ route('achievement.index') }}">Achievements</a></li>
                    <li><a href="{{ route('activity.index') }}">Activities</a></li>
                    <li><a href="{{ route('facility.index') }}">Facilities</a></li>
                    <li><a href="{{ route('layout.extracurricular') }}">Extracurricular</a></li>
                    @if(Auth::check() == true)
                        <li><a href="{{ route('myaccount.index') }}">My Account</a></li>
                    @endif
                </ul>
            </li>
            <li><a href="{{ route('announcement.index') }}">Announcement</a></li>
            {{-- <li><a href="{{ route('layout.edufair') }}">Edufair 2018</a></li> --}}
            @if(Auth::check() == true)
                @if(Auth::user()->username == 'tatausaha')
                    <li><a href="{{ route('manage.index') }}">Manage</a></li>
                @else
                    <li><a href="{{ route('promnight.index')}}">Prom Night 2019</a></li>
                @endif
                <li>
                    <a id="logoutButton">Log Out</a>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="{{ route('contactus.index') }}">Contact Us</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
    </nav>
</header>