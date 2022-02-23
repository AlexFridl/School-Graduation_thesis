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
                        <h2 class="contact-title">Zakazivanje termina</h2>
                    </div>
                    <div class="col-lg-8">
                        @if($errors->any())
                            <div class="alert alert-danger">
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
                        <form method="POST" action="{{route('doZakazani_insert')}}" >
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ime" id="ime" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your name'" placeholder='Unesite svoje ime'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="prezime" id="prezime" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter email address'" placeholder='Unesite svoje prezime'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" placeholder='Unesite svoje email'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="brTel" id="brTel" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" placeholder='Unesite svoj broj telefona'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTretman" id="ddlTretman">
                                            <option class="form-control" value="0">Odaberite tretman</option>
                                            @foreach($tretmani as $t)
                                                <option class="form-control" value="{{$t->id_tretman}}">{{$t->t_naziv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php
                                        $danasnji_datum = time();
                                        $datum = date("Y-m-d",$danasnji_datum);
//                                                                        dd($datum);
                                        ?>
                                        <input class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="datum" id="datum" type="date" min="{{$datum}}" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter Subject'" placeholder='Odaberite datum'>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control" style="border:1px solid #4B3049;color:#4B3049;" name="ddlTermini" id="ddlTermini">
                                            <option class="form-control" value="0">Odaberite termin</option>
                                            @foreach($termin as $t)
                                                <option class="form-control" value="{{$t->id_termini}}">{{$t->vreme}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3" align="center">
                                <input type="submit" name="btnZakazi" id="btnZakazi" style="background-color:  #B08EAD;" class="btn_3 button-contactForm" value="Zakaži" />
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
