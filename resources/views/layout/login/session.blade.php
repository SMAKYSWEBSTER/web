@if (Auth::check() == true)
    <span class="alert info">Welcome, {{ Auth::user()->username }}</span>
@endif
