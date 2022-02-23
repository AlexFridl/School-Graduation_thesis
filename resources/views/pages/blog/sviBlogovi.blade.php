
@extends('layout.index')

@section('title')
    Admin Panel Blog
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Blog</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div style="margin-left: 600px;padding-bottom: 10px;">
                <label style="color: #4B3049;font-size: 16px;">Sortiraj po datumu:</label>
                <input type="date"name="sortByDateBlog" id="sortByDateBlog"/>
            </div>
            @if(session()->has('user') && session()->get('user')->naziv == 'admin')
                <div style="width: 500px;padding-left: 1200px;">
                    <h5><a class="linkA"  class="nav-link" href="{{route('adminPanel_blog_insert')}}">Dodaj blog</a></h5>
                </div>
            @endif
            <div id="ispis">
                <table class="table table-striped adminTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Podnaslov</th>
                        <th scope="col">Text</th>
                        <th scope="col">Slika</th>
                        <th scope="col">Postavljeno</th>
                        <th scope="col">Status</th>
                        <th scope="col">Izmeni</th>
                        <th scope="col">Obrisi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['page'])){
                        $perPage = $_GET['page'];
                        if(!isset($perPage) || $perPage == 1){
                            $i = 1;
                        }
                        else{
                            $i = (($perPage -1 ) * 6) + 1;
                        }
                    }else{
                        $i = 1;
                    }
                    ?>
                    @foreach($blog as $b)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <?php $i++ ?>
                            <td>{{$b->naslov_blog}}</td>
                            <td>{{$b->podnaslov_blog}}</td>
                            <td>{{$b->text_blog}}</td>
                            <td>  <img class="img-fluid" src="{{asset('/')}}img/{{$b->putanja_slika_blog}}" width="200px" height="250px" alt="{{$b->naslov_blog}}"/></td>
                            <td>{{date('d.m.Y.',$b->postavljeno)}}</td>
                            @if($b->status == 1)
                                <td>Aktivan</td>
                            @else
                                <td>Neaktivan</td>
                            @endif
                            <td><a class="linkA"  href="{{route('blog_update',['id_blog'=>$b->id_blog])}}">Izmeni</a></td>
                            <td><a  class="linkA"  href="{{route('blog_delete',['id_blog'=>$b->id_blog])}}">Obrisi</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-left:750px;padding-bottom: 50px;">
                    {{ $blog->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>

@endsection
