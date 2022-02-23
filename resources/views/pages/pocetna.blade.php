@extends('layout.index')

@section('title')
    Početna
@endsection

@section('content')
    <div class="move_right" style="color: #4B3049;padding-bottom: 50px;font-weight: bold;">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    @foreach($podaci as $p)
        <div class="about_us_content" >
            <h2 style="text-align: justify;margin-left: 450px;">Špela beauty</h2>
            <div class="pocetnaTekst">
                <p style="">{{$p->tekst}}</p>
            </div>
            <div style="margin-left: 425px;padding-top: 50px;" class="about_us_video">
                <img src="{{asset('/')}}img/{{$p->podaci_slika}}" width="400px" height="300px" alt="Špela beauty"/>
            </div>
        </div>
    @endforeach
    </div>
    </div>
    </div>
    </section>

@endsection