@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Korisnici</h3>
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
            <form action="{{route('doAdminPanel_korisnici_update',['id_korisnik'=>$korisnik->id_korisnik])}}" method="POST">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Korisničko ime:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbKorIme" id="tbKorIme" value="{{$korisnik->korisnicko_ime}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Lozinka:</td>
                        <td style="padding-top: 25px;">
                            <input type="password"  name="tbLozinka" id="tbLozinka" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Uloga:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlUloga" name="ddlUloga">
                                @isset($uloga)
                                @foreach($uloga as $u)
                                    @if($u->id_uloga == $korisnik->uloga_id)
                                        <option value="{{$u->id_uloga}}" selected>{{$u->naziv}}</option>--}}
                                    @else
                                         <option value="{{$u->id_uloga}}">{{$u->naziv}}</option>--}}
                                    @endif
                                @endforeach
                                @endisset
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Status:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlStatus" name="ddlStatus">
                                @if($korisnik->k_status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($korisnik->k_status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr  >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                            <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni"/>
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