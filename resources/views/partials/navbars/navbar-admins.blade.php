@props(['title', 'navbarColor', 'logOutIcon','userIcon', 'userTitle', 'logOutTitle'])

<nav class="navbar navbar-expand-lg navbar-light py-2" style="background-color:{{ $navbarColor }};">
    <div class="container">
        <div class="d-flex align-content-center align-items-center my-0 py-0">
            <button class="icon-button navbar-icon-button me-2" title="{{ $userTitle }}">
                <i class="{{$userIcon}}"></i>
            </button>
            <span class="navbar-title text-wrap">{{ $title }}</span>
        </div>
        <button class="icon-button navbar-icon-button" title="{{ $logOutTitle }}"> 
            <i class="{{$logOutIcon}}"></i>
        </button>
    </div>
</nav>
