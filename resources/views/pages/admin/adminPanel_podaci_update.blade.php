@extends('layout.index')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Izmena podataka</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            <form action="{{route('doAdminPanel_podaci_update',['id'=>$podaci->id])}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tekst:</td>
                        <td style="padding-top: 15px;">
                            <textarea rows="8" cols="80" name="text" id="text">{{$podaci->tekst}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Ulica:</td>
                        <td style="padding-top: 25px;">
                            <input type="text"  name="ulica" id="ulica" value="{{$podaci->ulica}} "/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Mesto:</td>
                        <td style="padding-top: 25px;">
                            <input type="text"  name="mesto" id="mesto" value="{{$podaci->mesto}} "/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Kontekt telefon:</td>
                        <td style="padding-top: 25px;">
                            <input type="text"  name="tell" id="tell" value="{{$podaci->kontakt_tel}} "/>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Slika:</td>
                        <td style="padding-top: 15px;">
                            <img src="{{asset('/')}}img/{{$podaci->podaci_slika}}" width="100px" height="100px" alt="{{$podaci->podaci_slika}}"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Izmeni sliku:</td>
                        <td style="padding-top: 15px;">
                            <input type="file" name="slika" id="slika" placeholder="Unesite sliku"/>
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
        <div class="move_right poruka">
            @empty(!session('poruka'))
                {{session('poruka')}}
            @endempty
        </div>
    </div>
    </div>
    </div>

    </section>

@endsection