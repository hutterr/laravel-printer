<div class="area"></div><nav class="main-menu">
    
            
    <ul>
        <li>
            <a href="/home">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                   Kezdőlap
                </span>
            </a>          
        </li>       
        @guest
        @else        
        <li class="has-subnav">
            <a href="/munkalapok">
               <i class="fas fa-clipboard-list fa-2x"></i>
                <span class="nav-text">
                    Munkalapok
                </span>
            </a>           
        </li>
        <li class="has-subnav">
        <a href="{{ route('munkalapok.create')}}">
               <i class="fas fa-plus fa-2x"></i>
                <span class="nav-text">
                    Új munka felvétele
                </span>
            </a>           
        </li>
        
        @endguest
        
    </ul>
    @guest
        <ul class="logout">
            <li>
                <a href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt fa-fw fa-lg"></i>
                    <span class="nav-text">
                        Bejelentkezés
                    </span>
                </a>            
            </li>
        </ul>
    @else
       
    <ul class="logout">
                <li class="user-info">                        
                    <i class="fas fa-user fa-2x"></i>
                    <span class="nav-text">
                        Bejelentkezve:  {{ Auth::user()->name }} 
                    </span>                                             
                </li>  
                <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Kijelentkezés
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>
    @endguest
</nav>