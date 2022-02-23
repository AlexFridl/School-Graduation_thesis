@extends('layout.index')

@section('title')
    Blog
@endsection

@section('content')

<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="move_right poruka">
                        @empty(!session('poruka'))
                            {{session('poruka')}}
                        @endempty
                    </div>
                <div id="ispis">
                    @foreach($blog as $b)
                    <article class="blog_item ">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" width="400px" height="400px" src="{{asset('/')}}img/{{$b->putanja_slika_blog}}" alt="{{$b->naslov_blog}}">
                        </div>
                        <div class="blog_details ">
                            <a class="d-inline-block" href="{{route('oneBlog',['id_blog'=>$b->id_blog])}}">
                                <h2>{{$b->naslov_blog}}</h2>
                            </a>
                            <h4>{{$b->podnaslov_blog}}</h4>
                            <p>
                                {{$truncated = Str::limit($b->text_blog, 200, ' (...)')}}
                            </p>
                            <b><a href="{{route('oneBlog',['id_blog'=>$b->id_blog])}}" style="color:#B08EAD;">Više</a></b>
                        </div>
                    </article>
                    @endforeach
                </div>
                    <div style="margin-left: 450px;">
                        {{ $blog->links() }}
                    </div>
                </div>
                </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="searchBloger" id="searchBloger" class="form-control" placeholder='Search Keyword'
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Search Keyword'">
                                        </div>
                                    </div>
                                    <input class="button rounded-0 primary-bg text-white w-100 btn_1 btnSearch" name="btnSearchBloger" id="btnSearchBloger"
                                            type="submit" value="Search"/>
                            </aside>

                        </div>
                    </div>
                </div>
        </div>
</section>
<!--================Blog Area =================-->
</div>
</div>
</div>
</div>
</section>

@endsection
