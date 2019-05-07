<nav class="main-menu">              
    <ul>
        <li>
            <a href="/home">
                <i class="fa fa-home fa-2x"></i>
                <span class="nav-text">
                   <strong>Kezdőlap</strong>
                </span>
            </a>          
        </li>       
        @guest
        @else   
        <li class="info">           
               <i class="fas fa-building fa-2x"></i>
                <span class="nav-text">                   
                        <strong>Cégek</strong>                    
                </span>                     
        </li>    
        <li class="has-subnav">
            <a href="{{route('cegek.index')}}">
               <i class="fas fa-list fa-x"></i>
                <span class="nav-text">
                   Listázás
                </span>
            </a>           
        </li>
        <li class="has-subnav">
        <a href="{{route('cegek.create')}}">
               <i class="fas fa-plus"></i>
                <span class="nav-text">
                    Új cég felvétele
                </span>
            </a>           
        </li>
        <li class="info">           
            <i class="fas fa-print fa-2x"></i>
             <span class="nav-text">
               <strong>Nyomtatók</strong>
             </span>                  
        </li>
        <li class="has-subnav">
            <a href="/munkalapok">
               <i class="fas fa-list"></i>
                <span class="nav-text">
                   Nyomtatók listája
                </span>
            </a>           
        </li>
        <li class="has-subnav">
        <a href="">
               <i class="fas fa-plus"></i>
                <span class="nav-text">
                    Új nyomtató felvétele
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