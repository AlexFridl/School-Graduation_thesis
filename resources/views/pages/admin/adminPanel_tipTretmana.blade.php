@extends('layout.index')

@section('title')
    Admin Panel - Tip tretmana
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Tipovi tretmana</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div style="padding-left: 1200px;">
                <h5><a class="linkA"  class="nav-link" href="{{route('adminPanel_tipTretman_insert')}}">Dodaj tip tretmana</a></h5>
            </div>
                <table class="table table-striped adminTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
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
                    @foreach($tipTretman as $tt)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <?php $i++ ?>
                            <td>{{$tt->tt_naziv}}</td>
                            @if($tt->tt_status == '1')
                                <td>Aktivan</td>
                            @elseif($tt->tt_status == '0')
                                <td>Neaktivan</td>
                            @else
                                <td></td>
                            @endif
                            <td><a class="linkA"  href="{{route('adminPanel_tipTretman_update',['id_tt'=>$tt->id_tt])}}">Izmeni</a></td>
                            @if($tt->tt_status == '0')
                                <td><a class="linkA"  href="{{route('adminPanel_tipTretman_delete',['id_tt'=>$tt->id_tt])}}">Obrisi</a></td>
                            @else
                                <td><a class="linkA"  href="{{route('adminPanel_tipTretman_delete',['id_tt'=>$tt->id_tt])}}">Obrisi</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <div style="margin-left:750px;padding-bottom: 50px;">
                {{ $tipTretman->links() }}
            </div>
            </div>
           </div>

    </div>
    </div>
    </div>
    </section>

@endsection
