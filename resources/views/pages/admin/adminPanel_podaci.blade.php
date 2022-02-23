
@extends('layout.index')

@section('title')

    Admin Panel - Podaci
@endsection

@section('content')
    <div>

        <div class="divAdminTable">
            <h3 class="naslovAdminTable" class="nav-link">Podaci</h3>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <table class="table table-striped adminTable">
                <thead>
                <tr>
                    <th scope="col">Tekst</th>
                    <th scope="col">Ulica</th>
                    <th scope="col">Mesto</th>
                    <th scope="col">Kontakt</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Izmeni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($podaci as $p)
                    <tr>
                        <td>{{$p->tekst}}</td>
                        <td>{{$p->ulica}}</td>
                        <td>{{$p->mesto}}</td>
                        <td>{{$p->kontakt_tel}}</td>
                        <td>
                            <img src="{{asset('/')}}img/{{$p->podaci_slika}}" width="25 0px" height="150px" alt="{{$p->podaci_slika}}"/>
                        </td>
                        <td><a class="linkA"  href="{{route('adminPanel_podaci_update',['id'=>$p->id])}}">Izmeni</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
    </div>

    </section>

@endsection