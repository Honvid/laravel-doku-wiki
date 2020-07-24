{{--<nav class="header navbar navbar-expand flex-md-row bd-navbar navbar-fixed-top navbar-default">--}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container d-sm-flex">
        <div class="navbar-header d-none d-md-flex" id="navbar-header" data-turbolinks-permanent="">
            <a href="/" class="navbar-brand"><b>Ruby</b> China</a>
        </div>
        <div class="navbar-nav-scroll">
            <ul id="main-nav-menu" class="navbar-nav d-flex">
                <li class="nav-item"><a class="nav-link active" href="/topics">社区</a></li>
                <li class="nav-item"><a class="nav-link" href="/jobs">招聘</a></li>
                <li class="nav-item"><a class="nav-link" href="/wiki">Wiki</a></li>
                <li class="nav-item"><a class="nav-link" href="/sites">酷站</a></li>
            </ul>
        </div>
        <div class="ml-auto d-md-flex">
            <form class="d-none d-lg-flex mr-2 form-search active" action="/search" method="GET">
                <i class="fa btn-search fa-search"></i>
                <input class="form-control" name="q" type="text" value="" placeholder="搜索本站内容">
            </form>
            <ul class="nav navbar-nav user-bar align-items-center justify-content-end">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 超级管理员 <span
                                        class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>