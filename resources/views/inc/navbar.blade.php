<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">ADMINer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-dark" href="{{route('login')}}">Bejelentkezés <span class="sr-only">(current)</span></a>
                </li>
                
            </ul>
        @else
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home"><i class="fas fa-home fa-fw"></i>Kezdőlap</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-building fa-fw"></i>Cégek
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('cegek.index')}}"><i class="fas fa-list fa-fw"></i>Listázás</a>
                <a class="dropdown-item" href="{{route('cegek.create')}}"> <i class="fas fa-plus fa-fw"></i>Új cég felvétele</a>
                
                </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-print fa-fw"></i>Nyomtatók
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('nyomtatok.index')}}"><i class="fas fa-list fa-fw"></i>Nyomtatók listája</a>
                    <a class="dropdown-item" href="{{route('nyomtatok.create')}}"> <i class="fas fa-plus fa-fw"></i>Új nyomtató felvétele</a>
                    <a class="dropdown-item" href="{{route('nyomtatok.atlagalatt')}}"> <i class="fas fa-plus fa-fw"></i>Átlag alatti szűrés</a>
                   
                    </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-clipboard-list fa-fw"></i>Számlálók
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('szamlalo.create')}}"><i class="fas fa-file-medical fa-fw"></i>Új számláló rögzítése</a
                    </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tools fa-fw"></i>Javítások
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('javitasok.create')}}"><i class="fas fa-screwdriver fa-fw"></i>Új javítás rögzítése</a>
                    </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-stream fa-fw"></i>Kellékek, alkatrészek
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('alkatresz.index')}}"><i class="fas fa-list fa-fw"></i>Alkatrészek listája</a>
                    <a class="dropdown-item" href="{{route('alkatresz.create')}}"><i class="fas fa-plus fa-fw"></i>Új alkatrészek rögzítése</a>
                    <a class="dropdown-item" href="{{route('hasznalt.create')}}"><i class="fas fa-plus fa-fw"></i>Új felhasználás rögzitése</a>
                    </div>
            </li>
            
            
            </ul>

            <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-fw"></i>  {{ Auth::user()->name }} 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a  class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off fa-fw"></i>                                        
                                            Kijelentkezés                                        
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                            </div>
                        </li>
            </ul>
        
        
        @endguest
      
    </div>
  </nav>