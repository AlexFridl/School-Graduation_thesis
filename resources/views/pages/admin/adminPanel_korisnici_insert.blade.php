@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Dodaj korisnika</h3>
            </div>
            @if($errors->any())
                <div class="alert alert-danger" style="margin-left: 280px;margin-right: 700px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <form action="{{route('doAdminPanel_korisnik_insert')}}" method="POST">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Korisničko ime:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbKorIme" id="tbKorIme" placeholder="Unesi korisničko ime"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Lozinka:</td>
                        <td style="padding-top: 25px;">
                            <input type="password"  name="tbLozinka" id="tbCena" placeholder="Unesi lozinku"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Uloga:</td>
                        <td>
                            <select id="ddlUloga" name="ddlUloga">
                                <option value="0">Izaberi</option>
                                    @foreach($uloga as $u)
                                        <option value="{{$u->id_uloga}}">{{$u->naziv}}</option>
                                    @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr  >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                            <input type="submit" name="btnUnesi" id="btnUnesi" value="Unesi"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
    </div>
    </div>

    </section>

@endsection