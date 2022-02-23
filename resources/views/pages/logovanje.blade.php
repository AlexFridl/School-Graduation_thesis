@extends('layout.index')

@section('title')
    Logovanje
@endsection

@section('content')
    <div class="move_right poruka">
        @empty(!session('poruka'))
            {{session('poruka')}}
        @endempty
    </div>
    <div id="log" class="col-lg-8">
    <div style="background-color:#d9c7b2;height: 350px;
/*	display: flex;
	align-items: center;
	justify-content: center;*/">
        <div style="padding-top:70px;padding-left: 280px;padding-right: 220px;letter-spacing: 2px;">
            <form method="POST" action="{{route('doLogovanje')}}">
                {{csrf_field()}}
                <table style="padding:50px;">
                    <h3>Logovanje</h3>
                    <tr align="center" >
                        <td style="padding-bottom: 10px;">Korisničko ime:</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="tbKorIme" id="tbKorIme" placeholder="Korisnicko ime"/></td>
                    </tr>
                    <tr align="center" >
                        <td style="padding-bottom: 10px;">Lozinka:</td>
                    </tr>
                    <tr>
                        <td><input type="password" name="tbPassword" id="tbPassword" placeholder="Lozinka"/></td>
                    </tr>
                    <tr align="center">
                        <td style="padding-top: 10px;">
                            <input type="submit" name="tbPotvrdi" id="tbPotvrdi" value="Uloguj se"/>
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
