@props(['title', 'navbarColor', 'logOutIcon','userIcon'])

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:{{ $navbarColor }};">
    <div class="container">
        <div class="d-flex align-content-center align-items-center">
            <button class="navbar-log-out me-2"><img class="navbar-user" src="{{ asset($userIcon) }}" alt=""></button>
            <span class="navbar-title text-wrap">{{ $title }}</span>
        </div>
        <button class="navbar-log-out"> <img class="navbar-user" src="{{asset($logOutIcon)}}" alt=""></button>
    </div>
</nav>
