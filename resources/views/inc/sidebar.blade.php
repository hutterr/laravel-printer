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
        
             <!--  Cégek -->

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

             <!-- Nyomtatók -->

        <li class="info">           
            <i class="fas fa-print fa-2x"></i>
             <span class="nav-text">
               <strong>Nyomtatók</strong>
             </span>                  
        </li>
        <li class="has-subnav">
            <a href="{{route('nyomtatok.index')}}">
               <i class="fas fa-list"></i>
                <span class="nav-text">
                   Nyomtatók listája
                </span>
            </a>           
        </li>
        <li class="has-subnav">
        <a href="{{route('nyomtatok.create')}}">
               <i class="fas fa-plus"></i>
                <span class="nav-text">
                    Új nyomtató felvétele
                </span>
            </a>           
        </li>  
        <li class="has-subnav">
            <a href="{{route('nyomtatok.atlagalatt')}}">
                   <i class="fas fa-search"></i>
                    <span class="nav-text">
                       Átlag alatti szűrés
                    </span>
                </a>           
            </li> 
        
        <!-- Számlálók -->

        <li class="info">           
                <i class="fas fa-clipboard-list fa-2x"></i>
                 <span class="nav-text">
                   <strong>Számlálók</strong>
                 </span>                  
            </li>
            
            <li class="has-subnav">
            <a href="{{route('szamlalo.create')}}">
                   <i class="fas fa-file-medical"></i>
                    <span class="nav-text">
                        Új számláló rögzítése
                    </span>
                </a>           
            </li>    

                 <!--  Javítások -->

            <li class="info">           
                    <i class="fas fa-tools fa-2x"></i>
                     <span class="nav-text">
                       <strong>Javítások</strong>
                     </span>                  
                </li>
                
                <li class="has-subnav">
                <a href="{{route('javitasok.create')}}">
                       <i class="fas fa-screwdriver"></i>
                        <span class="nav-text">
                            Új javítás rögzítése
                        </span>
                    </a>           
                </li>    

                <!--  Alkatrészek, kellékek -->

                <li class="info">           
                    <i class="fas fa-stream fa-2x"></i>
                     <span class="nav-text">
                       <strong>Kellékek, alkatrészek</strong>
                     </span>                  
                </li>
                <li class="has-subnav">
                    <a href="{{route('alkatresz.index')}}">
                           <i class="fas fa-list"></i>
                            <span class="nav-text">
                            Alkatrészek listája
                            </span>
                        </a>           
                    </li>                 
                <li class="has-subnav">
                <a href="{{route('alkatresz.create')}}">
                       <i class="fas fa-plus"></i>
                        <span class="nav-text">
                            Új alkatrész rögzítése
                        </span>
                    </a>           
                </li> 
                
                 
                <li class="has-subnav">
                    <a href="{{route('hasznalt.create')}}">
                           <i class="fas fa-plus"></i>
                            <span class="nav-text">
                                Új felhasználás rögzítése
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