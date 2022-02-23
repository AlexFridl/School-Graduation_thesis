@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="divAdminTable">
        <div style="width:700px;">
            <h3 class="naslovAdminTable" class="nav-link">Slajder</h3>
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
            <form method="POST" action="{{route('doAdminPanel_slajder_update',['id_slajder'=>$slajder->id_slajder])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naslov:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaslov" id="tbNaslov" value="{{$slajder->naslov_slajder}}"/>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Slika:</td>
                        <td style="padding-top: 15px;">
                            <img src="{{asset('/')}}img/{{$slajder->putanja_slajder}}" width="100px" height="100px" alt="{{$slajder->naslov_slajder}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Izmeni sliku:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="fSlika" id="fSlika" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Aktivan:</td>
                        <td style="padding-top: 15px;">
                            <select id="ddlStatus" name="ddlStatus">
                                @if($slajder->status == '0')
                                    <option value="0" selected>Neaktivan</option>
                                    <option value="1">Aktivan</option>
                                @else($slajder->status == '1')
                                    <option value="0">Neaktivan</option>
                                    <option value="1" selected>Aktivan</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
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