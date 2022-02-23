@extends('layout.index')

@section('title')
    Ponuda
@endsection

@section('content')
    @include('components.sidebar_nav')
@foreach($tip_tretmana as $t)

    <div style="width:350px;float: left;">
        <div class="about_us_content" id="opisTretmana">
            <h5><a style="color:#B08EAD;" href="{{route('opisTretmana',['id_tretman'=>$t->id_tretman,'id_tt'=>$t->tt_id])}}">{{$t->t_naziv}}</a></h5>
            <p>
                {{$truncated = Str::limit($t->text_tretman, 200, ' (...)')}}
            </p>
            <p>
                <b><a href="{{route('opisTretmana',['id_tt'=>$t->id_tt,'id_tretman'=>$t->id_tretman])}}" style="color:#4B3049/*#B08EAD*/;">Više</a></b>
            </p>
            <div class="about_us_video">
                <img class="img-fluid" src="{{asset('/')}}img/{{$t->putanja_slika}}" style="" width="250px" height="150px" alt="{{$t->t_naziv}}"/>
            </div>
        </div>
    </div>
<br>
@endforeach
    </div>
    <div style="text-align:center;margin-top:25px;margin-bottom: 50px;">
        {{ $tip_tretmana->links() }}
    </div>

    </div>
    </div>
    </div>
    </div>
</section>


@endsection