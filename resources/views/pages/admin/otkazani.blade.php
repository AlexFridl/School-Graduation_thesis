
@extends('layout.index')

@section('title')
    Admin Panel - Otkazani
@endsection

@section('content')
    <div>
        <div class="divAdminTable">
            <div style="width:500px;">
                <h3 class="naslovAdminTableZakazani" class="nav-link">Otkazani termini</h3>
            </div>
            <div class="move_right poruka">
                @empty(!session('poruka'))
                    {{session('poruka')}}
                @endempty
            </div>
            <div style="margin-left: 600px;padding-bottom: 10px;">
                <label style="color: #4B3049;font-size: 16px;">Sortiraj po datumu:</label>
                <input type="date"name="sortByDateOtkazane" id="sortByDateOtkazane"/>
                {{--                </form>--}}
            </div>
            <div id="ispis">
                <table class="table table-striped adminTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime</th>
                        <th scope="col">Prezime</th>
                        <th scope="col">Email</th>
                        <th scope="col">Broj telefona</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Zakazni tretman</th>
                        <th scope="col">Termin</th>
                        <th scope="col">Status termina</th>
                        <th scope="col">Obriši</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div id="ispis">
                        <?php
                        if(isset($_GET['page'])){
                            $perPage = $_GET['page'];
                            if(!isset($perPage) || $perPage == 1){
                                $i = 1;
                            }
                            else{
                                $i = (($perPage -1 ) * 6) + 1;
                            }
                        }else{
                            $i = 1;
                        }
                        ?>
                        @foreach($zakazani as $z)
                            {{--                    {{dd($z)}}--}}
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <?php $i++;     ?>
                                <td>{{$z->ime}}</td>
                                <td>{{$z->prezime}}</td>
                                <td>{{$z->email}}</td>
                                <td>{{$z->br_tel}}</td>
                                <td>{{date("d.m.Y",$z->datum)}}</td>
                                <td>{{$z->t_naziv}}</td>
                                <td>{{$z->vreme}}</td>
                                @if($z->status_termina == '0')
                                    <td>Otkazano</td>
                                @else
                                    <td>Zakazano</td>
                                @endif
                                @if($z->status_termina == '0')
                                    <td><a  class="linkA"  href="{{route('doOtkazaniA',['id_zakazano'=>$z->id_zakazano])}}">Obriši</a></td>
                                @else
                                    <td><a  class="linkA"  href="{{route('doOtkazaniA',['id_zakazano'=>$z->id_zakazano])}}">Otkaži</a></td>
                                @endif
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-left:750px;padding-bottom: 50px;">
                    {{ $zakazani->links() }}
                </div>
            </div>

        </div>
    </div>
    </div>

    </section>

@endsection