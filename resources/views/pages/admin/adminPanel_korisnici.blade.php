
@extends('layout.index')

@section('title')
    Admin Panel - Korisnici
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
            <h3 class="naslovAdminTable" class="nav-link">Korisnici</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div style="padding-left: 1170px;">
            <h5><a class="linkA"  class="nav-link" href="{{route('adminPanel_korisnik_insert')}}">Dodaj korisnika</a></h5>
            </div>
            <table class="table table-striped adminTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Korisnicko ime</th>
                    <th scope="col">Uloga</th>
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
                @foreach($korisnici as $k)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <?php $i++ ?>
                    <td>{{$k->korisnicko_ime}}</td>
                    <td>{{$k->naziv}}</td>
                    @if($k->k_status == 0)
                        <td>Nektivan</td>
                    @else
                        <td>Aktivan</td>
                    @endif
                    <td><a class="linkA"  href="{{route('adminPanel_korisnici_update',['id_korisnik'=>$k->id_korisnik])}}">Izmeni</a></td>
                    <td><a  class="linkA"  href="{{route('adminPanel_korisnici_delete',['id_korisnik'=>$k->id_korisnik])}}">Obriši</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div style="margin-left:750px;padding-bottom: 50px;">
                {{ $korisnici->links() }}
            </div>

        </div>

    </div>
    </div>
    </div>

    </section>

@endsection