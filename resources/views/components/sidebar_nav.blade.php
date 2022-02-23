<div style="background-color:#B08EAD;float: left;width:250px;margin-bottom: 50px;height:100%;">
    <nav style="padding-top: 15px;padding-bottom:15px;font-size: 15px;font-family:'Rubik', sans-serif;">
        <ul>
            @foreach($tretmani as $t)
            <li class="nav-item">
                <a style="color: #4B3049;" class="nav-link" href="{{route('opisTretmana',['id_tretman'=>$t->id_tretman,'id_tt'=>$t->id_tt])}}">{{$t->t_naziv}}</a>
            </li>
            @endforeach
        </ul>
    </nav>
</div>
