<header>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TURNERO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            @if(is_null(Auth::user()->idBox))
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('user.index') !!}">Gestionar Usuarios</a></li>
                    <li><a href="{!! route('entity.index') !!}">Gestionar Entidades</a></li>
                    <li><a href="{!! route('subentity.index') !!}">Gestionar Sub Entidades</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('number.index') !!}">Gestionar Numeros</a></li>
                </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="true">{!! Auth::user()->fullName !!} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! route('logout') !!}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</header>