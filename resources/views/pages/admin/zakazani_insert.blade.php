@extends('layout.index')

@section('title')
    Admin Panel - Zakazati termin
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTable" class="nav-link">Zakaži termin</h3>
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
            <form method="POST" action="{{route('doAdminPanel_zakazano_insert')}}" >
                {{csrf_field()}}
                <table class="adminTable">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Ime:</td>
                        <td style="padding-top: 15px;">
                            <input type="text" name="ime" id="ime" placeholder="Unesite ime"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Prezime:</td>
                        <td style="padding-top: 25px;">
                            <input type="text" name="prezime" id="prezime" placeholder="Unesite prezime"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Email:</td>
                        <td style="padding-top: 25px;">
                            <input type="text" name="email" id="email" placeholder="Unesite email"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Broj telefona:</td>
                        <td style="padding-top: 25px;">
                            <input type="text" name="brTel" id="brTel" placeholder="Unesite broj telefona"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Tretman:</td>
                        <td style="padding-top: 25px;">
                            <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTretman" id="ddlTretman">
                                <option class="form-control" value="0">Odaberite tretman</option>

                                @foreach($tretmani as $t)
                                    <option class="form-control" value="{{$t->id_tretman}}">{{$t->t_naziv}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Datum:</td>
                        <td style="padding-top: 25px;">
                            <?php
                                $danasnji_datum = time();
                                $datum = date("Y-m-d",$danasnji_datum);
//                                dd($datum);
                            ?>
                            <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="datum" id="datum" min="{{$datum}}" type="date" placeholder='Odaberite datum'/>
                        </td>
                    </tr>
                    <div id="ispis">
                    <tr>
                        <td style="padding-top: 20px;padding-left: 50px;">Termini:</td>
                        <td style="padding-top: 25px;">
                            <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTermini" id="ddlTermini" disabled>
                                <option class="form-control" value="0">Odaberite termin</option>
                            </select>
                        </td>
                    </tr>
                    </div>
                    <tr >
                        <td colspan="2" align="center" style="padding-bottom:5px;padding-top: 15px;"">
                        <input type="submit" name="btnZakazi" id="btnZakazi" value="Zakaži tretman"/>
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