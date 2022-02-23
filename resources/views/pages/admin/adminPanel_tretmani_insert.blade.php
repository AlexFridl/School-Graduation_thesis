@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Dodaj tretman</h3>
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
            <form method="POST" action="{{route('doAdminPanel_tretmani_insert')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naziv:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaziv" id="tbNaziv" placeholder="Unesite naziv tretmana"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tekst:</td>
                        <td style="padding-top: 25px;">
                            <textarea name="taTekst" rows="8" cols="80"  id="taTekst" placeholder="Unesite tekst"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tip tretmana:</td>
                        <td style="padding-top: 25px;">
                            <select id="ddlTipTretmana" name="ddlTipTretmana">
                                <option value="0">Izaberi...</option>
                                @foreach($tip_tretmana as $tt)
                                    <option value="{{$tt->id_tt}}">{{$tt->tt_naziv}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Unesi sliku:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="fSlika" id="fSlika" placeholder="Unesite sliku"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Status:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlStatus" name="ddlStatus">
                                <option value="0">Neaktivan</option>
                                <option value="1">Aktivan</option>
                            </select>
                        </td>
                    </tr>

                    <tr >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;"">
                        <input type="submit" name="btnUnesi" id="btnUnesi" value="Unesi tretman"/>
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