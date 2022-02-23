<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZakazaniRequest;
use App\Models\Podaci;
use App\Models\Termini;
use App\Models\TipTretmana;
use App\Models\Tretman;
use App\Models\Zakazano;
use App\Models\Blog;

use Illuminate\Http\Request;

class FrontendCotroller extends BaseFrontendController
{
    public function index(){
        try{
            $podaci = new Podaci();
            $this->data['podaci'] = $podaci->getAll();
//            dd($this->data['podaci']);
            return view('pages.pocetna',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }
    public function zakazati(){
        $this->data['tipTretmana'] = TipTretmana::all();
        $this->data['termini'] = Termini::all();
        $tretman = new Tretman();
        $this->data['tretman'] = $tretman->getAll();
//        dd($this->data['termini']);
        return view('pages.zakazati',$this->data);
    }

    public function doZakazati(ZakazaniRequest $request){
        if($request->has('btnZakazi')){
//            dd($request);
            $ime = $request->input('ime');
//            dd($ime);
            $prezime = $request->input('prezime');
            $email = $request->input('email');
            $brTel = $request->input('brTel');
            $datum = $request->input('datum');
//            dd($datum);
//            $tipTretmana = $request->input('ddlTipTretman');
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

            try{
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
                }
                else{
                    return redirect()->route('zakazati')->with('poruka','Morate odabrati datum posle današnjeg datuma!');
                }
                if($rez){
                    return redirect()->route('zakazati')->with('poruka','Uspešno ste izvršili zakazivanje!');
                }
                else{
                    return redirect()->route('zakazati')->with('poruka','Niste obavili zakazivanje!');
                }
            }
            catch (\Exception $ex) {
                \Log::error("Greska:" . $ex->getMessage());
            }
        }
    }
    public function tretmani($id_tt){
        try{
           $tipTretmana = new TipTretmana();
            $this->data['tip_tretmana'] = $tipTretmana->getAllTretmane($id_tt);
            //sidebar_nav promenljiva
            $this->data['tretmani'] = $tipTretmana->getTretmanPoTT($id_tt);
//            dd($this->data['tip_tretmana']);
//            dd($this->data['tretmani']);
            return view('pages.tretmani',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }
    public function opisTretmana($id_tt, $id_tretman){
//        dd($id_tretman);
        $tipTretmana = new TipTretmana();
        $tretman = new Tretman();

        try{
            //za sidebar nav promenljiva
            $this->data['tretmani'] = $tipTretmana->getTretmanPoTT($id_tt);
            $this->data['tretman'] = $tretman->getOneTretman($id_tt,$id_tretman);
//            dd($this->data['tretman']);
            return view('pages.opisTretmana',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function blog(){
        $blog = new Blog();
        $tretmani = new Tretman();
        try{
            $this->data['tretmani'] = $tretmani->getTretamane();
            $this->data['blog'] = $blog->getAll();
            return view('pages.blog',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }
    public function oneBlog($id_blog){
        $blog = new Blog();
        try{
            $this->data['oneBlog'] = $blog->getOne($id_blog);
            return view('pages.oneBlog',['id_blog'=>$id_blog],$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function search(Request $request)
    {
            $unos = $request->post('unos');

            $blog = new Blog();
            $rez = $blog->searchBlog($unos);
            //return json_encode($rez);
            $podaci = null;

            foreach ($rez as $item) {
                $podaci .= "<article class='blog_item'>";
                $podaci .= "<div class='blog_item_img'>";
                $podaci .= "<img class='card-img rounded-0' width='400px' height='400px' src='".asset('/')."img/".$item->putanja_slika_blog."' alt='".$item->naslov_blog."'>";
                $podaci .= "</div>";
                $podaci .= "<div class='blog_details'>";
                $podaci .= "<a class='d-inline-block' href='".route('one_Blog',['id_blog'=>$item->id_blog])."'>";
                $podaci .= "<h2>".$item->naslov_blog."</h2>";
                $podaci .= "</a>";
                $podaci .= "<h4>".$item->podnaslov_blog."</h4>";
                $podaci .= "<p>";
                $podaci .= substr($item->text_blog,0,200);
                $podaci .= "(...)</p>";
                $podaci .= "<b><a href='".route('one_Blog',['id_blog'=>$item->id_blog])."' style='color:#B08EAD;'>Više</a></b>";
                $podaci .= "</div>";
                $podaci .= "</article>";
            }
            return json_encode($podaci);
        }

    public function zakazati_ajax(Request $request){
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

}
