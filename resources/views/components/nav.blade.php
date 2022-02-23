<body>
<!--::header part start::-->
<header class="main_menu home_menu" style="border-bottom: /*1px solid #B08DAD;*/1px solid #F4EDF2;">
    <div class="container" >
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">  <img src="{{asset('/')}}img/spela_beauty3.jpg" with="50px" height="50px" alt="logo"> </a>
                    <div class="collapse navbar-collapse main-menu-item"  id="navbarSupportedContent">
                        @if(!session()->has('user'))
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('index')}}">Početna</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle navigacija" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tretmani
                                    </a>
                                    <ul class="dropdown-menu"  aria-labelledby="navbarDropdown" style="background-color:#d9c7b2;color: #4B3049;">
                                        @foreach($tipTretmana as $tt)
                                            <li style="color:#4B3049;"><a class="dropdown-item" style="background-color:#d9c7b2;color: #4B3049;" href="{{route('tretmani',['id_tt'=>$tt->id_tt])}}">{{$tt->tt_naziv}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('zakazati')}}">Zakazivanje</a>
                                </li>
                            </ul>

                        @elseif(session()->has('user') && session()->get('user')->naziv == 'admin')
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('adminPanel_tipTretman')}}">Tip tretmana</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link  navigacija dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tretmani
                                    </a>
                                    <ul class="dropdown-menu" style="background-color:#d9c7b2;color: #4B3049;" aria-labelledby="navbarDropdown">
                                        @foreach($tipTretmana as $tt)
                                            <li style="color:#4B3049"><a class="dropdown-item" style="background-color:#d9c7b2;color: #4B3049;" href="{{route('adminPanel_tretmani',['id_tt'=>$tt->id_tt])}}">{{$tt->tt_naziv}}</a></li>
                                        @endforeach
                                        <li style="color:#4B3049"><a class="dropdown-item" style="background-color:#d9c7b2;color: #4B3049;" href="{{route('adminPanel_tretmani_insert')}}">Dodaj tretman</a></li>
                                    </ul>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('adminPanel_slajder')}}">Slajder</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('adminPanel_korisnici')}}">Korisnici</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('adminPanel_blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('zakazaniA')}}">Zakazani termini</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" href="{{route('otkazaniA')}}">Otkazani termini</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('adminPanel_podaci')}}">Podaci</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('logout')}}" class="log" style="font-family:'Rubik';sans-serif:line-height: 2;font-size: 15px;margin-bottom: 0px;color: #795376;font-weight: 400;"> Odjava</a>
                                </li>
                            </ul>

                    @elseif(session()->has('user') && session()->get('user')->naziv == 'bloger')
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('bloger')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('blog_insert')}}">Unesi blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('all_blog')}}">Admin Blogova</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('logout')}}" class="log" style="font-family:'Rubik';sans-serif:line-height: 2;font-size: 15px;margin-bottom: 0px;color: #795376;font-weight: 400;"> Odjava</a>
                                </li>
                            </ul>
                    @elseif(session()->has('user') && session()->get('user')->naziv == 'zaposleni')
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('zakazani_insert')}}">Zakaži termin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('zakazani')}}">Zakazani termini</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('otkazani')}}">Otkazani termini</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link navigacija" style="color: #4B3049;" href="{{route('logout')}}" class="log" style="/*font-family:'Rubik';sans-serif:line-height: 2;font-size: 15px;margin-bottom: 0px;color: #795376;
                                                                                    font-weight: 400;*/"> Odjava</a>
                                </li>
                            </ul>
                    @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->




