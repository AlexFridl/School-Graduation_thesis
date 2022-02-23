@extends('layout.index')

@section('title')
    Blog
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_padding blogSection" style="padding-left: 250px;text-align: justify;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" style="display: block;margin-left: auto;margin-right: auto;" src="{{asset('/')}}img/{{$oneBlog->putanja_slika_blog}}" alt="{{$oneBlog->naslov_blog}}">
                        </div>
                        <div class="blog_details">
                            <h2>{{$oneBlog->naslov_blog}}</h2>
                            <p class="excert">
                                {{$oneBlog->podnaslov_blog}}
                            </p>
                            <p>
                                {{$oneBlog->text_blog}}
                            </p>
                            <p>
                                {{date("d.m.Y",$oneBlog->postavljeno)}}
                            </p>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="{{asset('/')}}img/spela4.gif" alt="spela">
                            <div class="media-body">
                                <a href="#">
                                    <h4>Špela Klajnšček Mikosavljević</h4>
                                </a>
                                <p>"Ljubavlju prema sebi negujemo unutrašnju i spoljašnju lepotu."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--================Blog Area end =================-->

    </div>
    </div>
    </div>
    </section>

@endsection
