<link rel="stylesheet" href="{{ asset("assets/bootstrap-select/dist/css/bootstrap-select.css") }}">
<link rel="stylesheet" href="{{ asset("assets/flag-icon-css-master/css/flag-icon.css") }}">

<nav class="navbar navbar-expand-lg navbar-light bg-light"><a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name', '3000 Words') }}</a>

    <select class="selectpicker" id="changeLang" data-width="fit"  data-style="">
        <option value="ru" data-content='<span class="flag-icon flag-icon-ru"></span> Russian' @if(\Illuminate\Support\Facades\App::getLocale() === 'ru') selected @endif>Russian</option>
        <option value="en" data-content='<span class="flag-icon flag-icon-us"></span> English' @if(\Illuminate\Support\Facades\App::getLocale() === 'en') selected @endif>English</option>
    </select>
    <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{--<li class="nav-item active"><a class="nav-link" href="#">Все слова<span class="sr-only">(current)</span></a></li>--}}
            {{--<li class="nav-item"><a class="nav-link" href="#">Только отмеченные<span class="sr-only">(current)</span></a></li>--}}
        </ul>
        @guest
        <form class="form-inline my-2 my-lg-0" method="post" action="{{ route('login') }}">
            <input class="form-control mr-sm-2" name="login" type="text" placeholder="{{ __('Username') }}" aria-label="Login">
            <input class="form-control mr-sm-2" name="password" type="password" placeholder="{{ __('Password') }}" aria-label="Password">
            @csrf
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ __('Login') }}</button>
        </form>
        <div class="nav-item active">
            <ul class="navbar-nav mr-auto"><li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li></ul>
        </div>
        @else
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endguest
    </div>
</nav>

@push('scripts')
    <script src="{{ asset("assets/bootstrap-select/dist/js/bootstrap-select.min.js") }}"></script>
    <script>
        $(function(){
            $('.changeLang').selectpicker();
        });

        $('#changeLang').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            var chosen = $(this).val();
            window.location = '{{ route('lang') }}/'+chosen;

        });
    </script>
@endpush
