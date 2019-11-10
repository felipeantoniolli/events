<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="{{route('index.page')}}">Home <span class="sr-only">(Página atual)</span></a>
        </li>
        @if(!session()->exists('user'))
            <ul class="navbar-nav  my-2 my-lg-0">
                <li class="nav-item"> <a class="nav-link" href="{{route('login.page')}}"> Login </a> </li>
            </ul>
            <ul class="navbar-nav  my-2 my-lg-0">
                <li class="nav-item"> <a class="nav-link" href="{{route('register.page')}}"> Registre-se </a> </li>
            </ul>
        @endif

        @if(session()->exists('type'))
            @if (session()->get('type') == 1)
                <ul class="navbar-nav  my-2 my-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{route('adm.index')}}"> Administração </a> </li>
                </ul>
            @endif
        @endif

        @if(session()->exists('user'))
            <ul class="navbar-nav  my-2 my-lg-0">
                <li class="nav-item"> <a class="nav-link" href="{{route('subscription.index')}}"> Inscrições </a> </li>
            </ul>
            <ul class="navbar-nav  my-2 my-lg-0">
                <li class="nav-item"> <a class="nav-link" href="{{route('logout.submit')}}"> Logout </a> </li>
            </ul>
        @endif
    </div>
</nav>
