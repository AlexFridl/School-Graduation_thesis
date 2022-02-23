@extends('layout.index')

@section('title')
    Admin Panel - Tretmani
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Tretmani </h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <table class="table table-striped adminTable">

                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Tekst</th>
                    <th scope="col">Tip tretmana</th>
                    <th scope="col">Slika</th>
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
                @foreach($tip_tretmana as $t)
{{--                    {{dd($tip_tretmana)}}--}}
                    <tr>
{{--                        <input type="hidden" name="hiddenId" id="hiddenId" value="{{$t->id_tt}}"/>--}}
                        <th scope="row">{{$i}}</th>
                        <?php $i++ ?>
                        <td>{{$t->t_naziv}}</td>
                        <td>{{$t->text_tretman}}</td>
                        <td>{{$t->tt_naziv}}</td>
                        <td> <img src="{{asset('/')}}img/{{$t->putanja_slika}}" width="100px" height="100px" alt="{{$t->t_naziv}}"/></td>
                        @if($t->t_status == '1')
                            <td>Aktivan</td>
                        @elseif($t->t_status == '0')
                            <td>Neaktivan</td>
                            @else
                            <td></td>
                        @endif
                        <td><a class="linkA"  href="{{route('adminPanel_tretmani_update',['id_tretman'=>$t->id_tretman])}}">Izmeni</a></td>
                        <td><a class="linkA"  href="{{route('adminPanel_tretmani_delete',['id_tt'=>$t->id_tt,'id_tretman'=>$t->id_tretman])}}">Obrisi</a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div style="margin-left:750px;padding-bottom: 50px;">
                {{ $tip_tretmana->links() }}
            </div>
        </div>

    </div>
    </div>
    </div>

    </section>

@endsection