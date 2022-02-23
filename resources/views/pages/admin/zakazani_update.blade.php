@extends('layout.index')

@section('title')
    Izmena zaakazanog
@endsection

@section('content')
    <div id="log" class="col-lg-8">
        <div style="height: 750px;width:1000px;margin-left: 500px;
/*	display: flex;
	align-items: center;
	justify-content: center;*/">
            <div style="padding-top:70px;letter-spacing: 2px;">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Izmena zakazanog termina</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="move_right" style="color: #4B3049;/*margin-left: 300px;*/padding-bottom: 50px;">
                            @empty(!session('poruka'))
                                {{session('poruka')}}
                            @endempty
                        </div>
                        <form method="POST" action="{{route('doAdminPanel_zakazano_update',['id_zakazano'=>$zakazani->id_zakazano])}}" >
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ime" id="ime" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your name'" value="{{$zakazani->ime}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="prezime" id="prezime" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email address'" value="{{$zakazani->prezime}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" value="{{$zakazani->email}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="brTel" id="brTel" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" value="{{$zakazani->br_tel}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="datum" id="datum" type="date" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" value="{{date("Y-m-d",$zakazani->datum)}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTretman" id="ddlTretman">
                                            <option class="form-control" value="0">Odaberite tretman</option>

                                            @foreach($tretmani as $t)
                                                @if($t->id_tretman == $zakazani->tretman_id)
                                                    <option class="form-control" value="{{$t->id_tretman}}" selected>{{$t->t_naziv}}</option>
                                                @else
                                                    <option class="form-control" value="{{$t->id_tretman}}">{{$t->t_naziv}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTermini" id="ddlTermini">
                                            <option class="form-control" value="0">Odaberite termin</option>
                                            @foreach($termin as $t)
                                                @if($t->id_termini == $zakazani->termin_id)
                                                    <option class="form-control" value="{{$t->id_termini}}" selected>{{$t->vreme}}</option>
                                                @else
                                                    <option class="form-control" value="{{$t->id_termini}}">{{$t->vreme}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlStatus" id="ddlStatus">
                                            @if($zakazani->status_termina == 0)
                                                <option class="form-control" value="0" selected>Otkazano</option>
                                                <option class="form-control" value="1">Zakazano</option>
                                            @else
                                                <option class="form-control" value="0" selected>Otkazano</option>
                                                <option class="form-control" value="1" selected>Zakazano</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3" align="center">
                                <input type="submit" name="btnIzmeni" id="btnIzmeni" style="background-color:  #B08EAD;" class="btn_3 button-contactForm" value="Izmeni" />
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
    </section>

@endsection
