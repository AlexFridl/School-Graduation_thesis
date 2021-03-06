<?php

namespace App\Http\Controllers;

use App\Models\Termini;
use App\Models\Tretman;
use App\Models\Zakazano;
use Illuminate\Http\Request;
use App\Http\Requests\ZakazaniRequest;
use App\Http\Requests\ZakazaniUpdateRequest;
class ZakazaniBackendController extends BackendController
{

    public function zakazaniA()
    {
        $zakazano = new Zakazano();
        $this->data['zakazani'] = $zakazano->getAll();
        return view('pages.admin.zakazani', $this->data);
    }

    public function adminPanel_zakazano_insert(Request $request)
    {
        $tretmani = new Tretman();
        $this->data['tretmani'] = $tretmani->getAll();
        $this->data['termin'] = Termini::all();
        return view('pages.admin.zakazani_insert', $this->data);
    }

    public function adminPanel_zakazano_insert_ajax(Request $request)
    {
        //2021-09-16
        $unos = $request->post('unos');
//       return json_encode($unos);
        $datum = explode("-", $unos);
        $godina = intval($datum[0]);
        $mesec = intval($datum[1]);
        $dan = intval($datum[2]);
        $tmStmDatumPokupljeni = mktime(0, 0, 0, $mesec, $dan, $godina);

        $termin = new Termini();
        $zakazani_rez = $termin->getDateTermin($tmStmDatumPokupljeni); //PO DATUMU

        $termini_rez = $termin->getAllTermin(); //SVI TERMINI

        $podaci = null;

        if(count($zakazani_rez) != 0) {
            $p = array();
            $bla = array();
            $podaci .= "<option class='form-control' value='0'>Odaberite termin</option>";

            foreach ($termini_rez as $t) {
                $bla[] = $t->id_termini;
                foreach ($zakazani_rez as $z) {
                    if($t->id_termini == $z->termin_id){
                        $p[] = $t->id_termini;
                        //$podaci .= "<option class='form-control' value='$t->id_termini'>$t->vreme</option>";
                    }
                }
            }

            $termini_rez_array = array($termini_rez);
            $differente = array_diff($bla, $p);

            foreach ($differente as $d){
                $slobodni_rez = $termin->getFreeTermin($d);
                foreach ($slobodni_rez as $sr) {
                    $podaci .= "<option class='form-control' value='$sr->id_termini'>$sr->vreme</option>";
                }
            }
//            dd($differente);
            return json_encode($podaci);
        }
        else{
            $podaci .= "<option class='form-control' value='0'>Odaberite termin</option>";
            foreach ($termini_rez as $t) {
                //$podaci .= "<option class='form-control' value='$t->id_termini'>ELSE</option>";
                $podaci .= "<option class='form-control' value='$t->id_termini'>$t->vreme</option>";
            }
            return json_encode($podaci);
        }
    }

    public function doAdminPanel_zakazano_insert( ZakazaniRequest $request)
    {
        if ($request->has('btnZakazi')) {
            $ime = $request->input('ime');
            $prezime = $request->input('prezime');
            $email = $request->input('email');
            $brTel = $request->input('brTel');
            $datum = $request->input('datum');
            $tretman = $request->input('ddlTretman');
            $termin = $request->input('ddlTermini');
            $status_termina = 1;
            //datum
            $datum = explode("-", $datum);
            $godina = intval($datum[0]);
            $mesec = intval($datum[1]);
            $dan = intval($datum[2]);
            $tmStmDatumPokupljeni = mktime(0, 0, 0, $mesec, $dan, $godina);

            $tmStDanasnjiDatum = time();
            $tmpokupljeni = date('Y-m-d',$tmStDanasnjiDatum);
            $datum_now = explode("-", $tmpokupljeni);
            $godina_now = intval($datum[0]);
            $mesec_now = intval($datum[1]);
            $dan_now = intval($datum[2]);
            $tmStmDatumPokupljeni_now = mktime(0, 0, 0, $mesec_now, $dan_now, $godina_now);

//            dd($tmStmDatumPokupljeni);

            $datumZaUpis = date("Y-m-d", $tmStmDatumPokupljeni);

            try {
                if ($tmStmDatumPokupljeni > $tmStmDatumPokupljeni_now || $tmStmDatumPokupljeni == $tmStmDatumPokupljeni_now) {
                    $rez = Zakazano::create(array(
                        'ime' => $ime,
                        'prezime' => $prezime,
                        'email' => $email,
                        'datum' => $tmStmDatumPokupljeni,
                        'br_tel' => $brTel,
                        'tretman_id' => $tretman,
                        'termin_id' => $termin,
                        'status_termina' => $status_termina
                    ));
                    if ($rez) {
                        return redirect()->route('zakazaniA')->with('poruka', 'Uspe??no ste izvr??ili zakazivanje!');
                    } else {

                        return redirect()->route('adminPanel_zakazano_insert')->with('poruka', 'Niste obavili zakazivanje!');
                    }
                }
                else {
                    return redirect()->route('adminPanel_zakazano_insert')->with('poruka', 'Morate odabrati datum posle dana??njeg datuma!');
                }
            }
            catch (\Exception $ex) {
                \Log::error("Greska:" . $ex->getMessage());
            }
        }
    }

    public function adminPanel_zakazano_update($id_zakazano)
    {
        $zakazano = new Zakazano();
        $this->data['zakazani'] = $zakazano->getOne($id_zakazano);
//        dd($this->data['zakazano']);
        $tretmani = new Tretman();
        $this->data['tretmani'] = $tretmani->getAll();
        $this->data['termin'] = Termini::all();
        return view('pages.admin.zakazani_update', $this->data);
    }

    public function doAdminPanel_zakazano_update($id_zakazano, ZakazaniUpdateRequest $request)
    {
        if ($request->has('btnIzmeni')) {
            $ime = $request->input('ime');
            $prezime = $request->input('prezime');
            $email = $request->input('email');
            $brTel = $request->input('brTel');
            $datum = $request->input('datum');
//            dd($datum);
//            $tipTretmana = $request->input('ddlTipTretman');
            $tretman = $request->input('ddlTretman');
            $termin = $request->input('ddlTermini');
            $status_termina = $request->input('ddlStatus');
            //datum
            $datum = explode("-", $datum);
            $godina = intval($datum[0]);
            $mesec = intval($datum[1]);
            $dan = intval($datum[2]);
            $tmStmDatumPokupljeni = mktime(0, 0, 0, $mesec, $dan, $godina);

            $tmStDanasnjiDatum = time();
            $datumZaUpis = date("Y-m-d", $tmStmDatumPokupljeni);
            $zakazano = Zakazano::find($id_zakazano);
            try {
                if ($tmStmDatumPokupljeni > $tmStDanasnjiDatum || $tmStmDatumPokupljeni == $tmStDanasnjiDatum) {
                    $zakazano->ime = $ime;
                    $zakazano->prezime = $prezime;
                    $zakazano->email = $email;
                    $zakazano->datum = $tmStmDatumPokupljeni;
                    $zakazano->br_tel = $brTel;
                    $zakazano->tretman_id = $tretman;
                    $zakazano->status_termina = $status_termina;
                    $zakazano->termin_id = $termin;

                    $rez = $zakazano->save();

                    if ($rez) {
                        return redirect()->route('zakazaniA')->with('poruka', 'Uspe??no ste izmenili zakazani termin!');
                    } else {
                        return redirect()->route('adminPanel_zakazano_update',['id_zakazano'=>$zakazano->id_zakazano])->with('poruka', 'Niste obavili izmenu!');
                    }
                } else {
                    $zakazano->ime = $ime;
                    $zakazano->prezime = $prezime;
                    $zakazano->email = $email;
                    $zakazano->datum = $tmStmDatumPokupljeni;
                    $zakazano->br_tel = $brTel;
                    $zakazano->tretman_id = $tretman;
                    $zakazano->status_termina = $status_termina;
                    $zakazano->termin_id = $termin;

                    $rez = $zakazano->save();
                    return redirect()->route('zakazaniA')->with('poruka', 'Uspe??no ste izmenili zakazani termin!');
                }
            } catch (\Exception $ex) {
                \Log::error("Greska:" . $ex->getMessage());
            }
        }
    }

    public function adminPanel_zakazani_delete($id_zakazano)
    {
        $zakazano = new Zakazano();
        $zakazano->id_zakazano = $id_zakazano;
        $allZakazano = $zakazano->getOne($id_zakazano);
        //dd($allZakazano);
        try {
            if ($allZakazano->status_termina == 1) {
                $rez1 = $zakazano->otkazi($id_zakazano);
                return redirect()->route('zakazani')->with('poruka', 'Uspe??no otkazivanje zakazanog termina!');
            } else {
                $rez2 = $zakazano->obrisi($id_zakazano);
                return redirect()->route('zakazani')->with('poruka', 'Uspe??no brisanje zakazanog termina!');
            }
        } catch (\Exception $ex) {
            \Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function sortByDate_zakazanoA(Request $request)
    {
        $unos = $request->post('unos'); //2021-09-11
         //return json_encode($unos);
        list($year_sort, $month_sort, $day_sort) = explode('-', $unos);
//        dd($day_sort);

        $zakazano = new Zakazano();
        $rez = $zakazano->getAllZakazane();
//    return json_encode($rez);
        $podaci = null;
        $array = null;

        $podaci .= "<table class='table table-striped adminTable'>";
        $podaci .= "<thead>";
        $podaci .= "<tr>";
        $podaci .= "<th scope='col'>#";
        $podaci .= "<th scope='col'>Ime</th>";
        $podaci .= "<th scope='col'>Prezime";
        $podaci .= "<th scope='col'>Email";
        $podaci .= "<th scope='col'>Broj telefona";
        $podaci .= "<th scope='col'>Datum";
        $podaci .= "<th scope='col'>Zakazni tretman";
        $podaci .= "<th scope='col'>Termin";
        $podaci .= "<th scope='col'>Status termina";
        $podaci .= "<th scope='col'>Izmeni";
        $podaci .= "<th scope='col'>Otka??i";

        $i = 1;
        foreach ($rez as $z) {
//            dd($rez);
            $array .=$z->id_zakazano;
            $date = date("Y-m-d", $z->datum);
//            dd($z->datum);
            list($year, $month, $day) = explode('-', $date);
//            dd($day);
            if ($unos == $date) {
                $podaci .= "<tr>";
                $podaci .= "<th scope='row'>".$i."</th>";
                $i++;
                $podaci .= "<td>".$z->ime."</td>";
                $podaci .= "<td>".$z->prezime."</td>";
                $podaci .= "<td>".$z->email."</td>";
                $podaci .= "<td>".$z->br_tel."</td>";
                $podaci .= "<td>".date('d.m.Y',$z->datum)."</td>";
                $podaci .= "<td>".$z->t_naziv."</td>";
                if ($z->status_termina == '0') {
                    $podaci .= "<td>Otkazano";
                } else {
                    $podaci .= "<td>Zakazano";
                }
                $podaci .= "<td>".$z->vreme."</td>";
                $podaci .= "<td><a class='linkA'  href='".route('adminPanel_zakazano_update',['id_zakazano'=>$z->id_zakazano])."'>Izmeni</a>";

                if ($z->status_termina == '0') {
                    $podaci .= "<td><a  class='linkA'  href='".route('adminPanel_zakazani_delete',['id_zakazano'=>$z->id_zakazano])."'>Obri??i</a>";
                } else {
                    $podaci .= "<td><a  class='linkA'  href='".route('adminPanel_zakazani_delete',['id_zakazano'=>$z->id_zakazano])."'>Otka??i</a>";
                }
                $podaci .= "</tr>";
            }
        }
        return json_encode($podaci);
    }
    public function otkazaniA(){
        $zakazano = new Zakazano();
        $this->data['zakazani'] = $zakazano->getAllOtkazane();
//        dd($this->data['zakazani']);
        return view ('pages.admin.otkazani',$this->data);
    }

    public function doOtkazaniA($id_zakazano,Request $request){
        $zakazano = new Zakazano();
        $zakazano->id_zakazano = $id_zakazano;
        $rez = $zakazano->obrisi($id_zakazano);
        if($rez)
        {
            return redirect()->route('otkazaniA')->with('poruka',"Uspe??no ste obrisali otkazani termin!");
        }
        else{
            return redirect()->route('otkazaniA')->with('poruka',"Neuspe??no brisanje termina!");
        }

    }

    public function sortByDate_otkazanoA(Request $request){
        $unos = $request->post('unos'); //2021-09-11
//        return json_encode($unos);
        list($year_sort, $month_sort, $day_sort) = explode('-', $unos);
//        dd($day_sort);

        $zakazano = new Zakazano();
        $rez = $zakazano->getAllOtkazane();
//        dd($rez);
        $podaci = null;
        $array = null;

        $podaci .= "<table class='table table-striped adminTable'>";
        $podaci .= "<thead>";
        $podaci .= "<tr>";
        $podaci .= "<th scope='col'>#";
        $podaci .= "<th scope='col'>Ime</th>";
        $podaci .= "<th scope='col'>Prezime";
        $podaci .= "<th scope='col'>Email";
        $podaci .= "<th scope='col'>Broj telefona";
        $podaci .= "<th scope='col'>Datum";
        $podaci .= "<th scope='col'>Zakazni tretman";
        $podaci .= "<th scope='col'>Status termina";
        $podaci .= "<th scope='col'>Termin";
        $podaci .= "<th scope='col'>Obri??i";
        $i = 1;
        foreach ($rez as $z) {
//            dd($rez);
            $array .=$z->id_zakazano;
            $date = date("Y-m-d", $z->datum);
//            dd($z->datum);
            list($year, $month, $day) = explode('-', $date);
//            dd($day);
            if ($unos == $date) {
                $podaci .= "<tr>";
                $podaci .= "<th scope='row'>".$i."</th>";
                $i++;
                $podaci .= "<td>".$z->ime."</td>";
                $podaci .= "<td>".$z->prezime."</td>";
                $podaci .= "<td>".$z->email."</td>";
                $podaci .= "<td>".$z->br_tel."</td>";
                $podaci .= "<td>".date('d.m.Y',$z->datum)."</td>";
                $podaci .= "<td>".$z->t_naziv."</td>";
                if ($z->status_termina == '0') {
                    $podaci .= "<td>Otkazano";
                } else {
                    $podaci .= "<td>Zakazano";
                }
                $podaci .= "<td>".$z->vreme."</td>";
                $podaci .= "<td><a  class='linkA'  href='".route('adminPanel_zakazani_delete',['id_zakazano'=>$z->id_zakazano])."'>Obri??i</a>";
                $podaci .= "</tr>";
            }
        }
        return json_encode($podaci);
    }

}
