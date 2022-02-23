<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="col-md-12">
{{--    //NOVI CARUSEL--}}
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0; $i<count($slajder); $i++)
                                    <li data-target="#carouselExampleIndicators" @if($i == 0) class="active" @endif data-slide-to="{{$i+1}}"></li>
                                @endfor
                                {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
                            </ol>
                            <div class="carousel-inner">
                                @foreach($slajder as $s)
                                    <div class="carousel-item @if($loop->index == 0) active @endif">
                                        <img style="/*border:1px solid #4B3049;*/" src="{{asset('/')}}img/{{$s->putanja_slajder}}" class="d-block w-100" width="550px" height="350px" alt="{{$s->naslov_slajder}}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about_us padding_top" style="padding-top: 50px;">
    <div class="container">
        <div class="row justify-content-center" style="padding-bottom: 50px;">
