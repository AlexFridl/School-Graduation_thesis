@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Tretmani</h3>
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
            <form method="POST" action="{{route('doAdminPanel_tretmani_update',['id_tretman'=>$tretman->id_tretman])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naziv:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaziv" id="tbNaziv" value="{{$tretman->t_naziv}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tekst:</td>
                        <td style="padding-top: 25px;">
                            <textarea name="taTekst" rows="8" cols="80" id="taTekst">{{$tretman->text_tretman}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tip tretmana:</td>
                        <td style="padding-top: 25px;">
                            <select id="ddlTipTretmana" name="ddlTipTretmana">
                                @isset($tip_tretmana)
                                    @foreach($tip_tretmana as $tt)
                                        @if($tt->id_tt == $tretman->tt_id)
                                            <option value="{{$tt->id_tt}}" selected>{{$tt->tt_naziv}}</option>
                                        @else
                                            <option value="{{$tt->id_tt}}">{{$tt->tt_naziv}}</option>
                                        @endif
                                    @endforeach
                                @endisset
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Slika:</td>
                        <td style="padding-top: 15px;">
                            <img src="{{asset('/')}}img/{{$tretman->putanja_slika}}" width="100px" height="100px" alt="{{$tretman->t_naziv}}"/></td>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Izmeni sliku:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="fSlika" id="fSlika" placeholder="Unesite sliku"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Status:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlStatus" name="ddlStatus">
                                @if($tretman->t_status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($tretman->t_status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                        <input type="submit" name="btnIzmeni" id="btnIzmeni" value="Izmeni tretman"/>
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