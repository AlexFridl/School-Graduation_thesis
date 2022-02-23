@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
    <div class="divAdminTable">
        <div style="width:700px;">
            <h3 class="naslovAdminTable" class="nav-link">Dodaj sliku za slajder</h3>
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
            <form method="POST" action="{{route('doAdminPanel_slajder_insert')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Naslov:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="tbNaslov" id="tbNaslov" placeholder="Unesite naslov"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Slika:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="fSlika" id="fSlika"/>
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
                    <tr>
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