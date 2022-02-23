
@extends('layout.index')

@section('title')
    Admin Panel - Slajder
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Slajder</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div style="padding-left: 1200px;">
                <h5><a class="linkA"  class="nav-link" href="{{route('adminPanel_slajder_insert')}}">Dodaj sliku</a></h5>
            </div>
            <table class="table table-striped adminTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naslov</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Postavljeno</th>
                    <th scope="col">Status</th>
                    <th scope="col">Izmeni</th>
                    <th scope="col">Obriši</th>
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
                @foreach($slajder as $s)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <?php $i++ ?>
                        <td>{{$s->naslov_slajder}}</td>
                        <td> <img src="{{asset('/')}}img/{{$s->putanja_slajder}}" width="100px" height="100px" alt="{{$s->naslov_slajder}}"/></td>
                        <td>{{date('d.m.Y',$s->postavljeno)}}</td>
                        @if($s->status == 1)
                            <td>Aktivan</td>
                        @else
                            <td>Neaktivan</td>
                        @endif
                        <td><a class="linkA"  href="{{route('adminPanel_slajder_update',['id_slajder'=>$s->id_slajder])}}">Izmeni</a></td>
                        <td><a class="linkA"  href="{{route('adminPanel_slajder_delete',['id_slajder'=>$s->id_slajder])}}">Obriši</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="margin-left:750px;padding-bottom: 50px;">
                {{ $slajder->links() }}
            </div>
        </div>

    </div>
    </div>
    </div>

    </section>

@endsection