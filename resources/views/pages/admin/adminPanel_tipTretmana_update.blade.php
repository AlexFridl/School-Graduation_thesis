@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="InsertTipTermina" class="nav-link">Dodaj tip tretman</h3>
            </div>
            @if($errors->any())
                <div class="alert alert-danger" style="margin-left: 280px;">
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
            <form method="POST" action="{{route('doAdminPanel_tipTretman_update',['id_tt'=>$tipTretman->id_tt])}}">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naziv:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="naziv" id="naziv" value="{{$tipTretman->tt_naziv}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Status:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlStatus" name="ddlStatus">
                                @if($tipTretman->tt_status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($tipTretman->tt_status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;">
                        <input type="submit" name="btnIzmena" id="btnIzmena" value="Izmeni tip tretmana"/>
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