@extends('layout.index')

@section('title')
    Ponuda
@endsection

@section('content')
    @include('components.sidebar_nav')

        <div style="width:750px;float: left;">
            <div class="about_us_content" id="opisTretmana">
                <h5>{{$tretman->t_naziv}}</h5>
                <p>{{$tretman->text_tretman}}</p>
                <div class="about_us_video">
                    <img class="img-fluid" src="{{asset('/')}}img/{{$tretman->putanja_slika}}" width="400px" height="300px" alt="{{$tretman->t_naziv}}"/>
                </div>
            </div>
        </div>
        </div>


        </div>
        </div>
        </div>
        </div>
        </section>


@endsection