<?php

namespace App\Http\Controllers;

use App\Http\Requests\TretmanRequest;
use App\Http\Requests\TretmanUpdateRequest;
use App\Models\TipTretmana;
use App\Models\Tretman;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TretmanBackendController extends BackendController
{
    public $data = [];

    public function adminPanel_tretmani($id_tt){
        try{
            $tipTretmana = new Tretman();
            $tipTretmana->id_tt = $id_tt;
            $this->data['tip_tretmana'] = $tipTretmana->getTretmane($id_tt);
//            dd($this->data['tip_tretmana']);
            return view('pages.admin.adminPanel_tretmani',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_tretmani_insert()
    {
        $tipTretmana = new TipTretmana();
        try {
            $this->data['tip_tretmana'] = $tipTretmana->getAll();
            return view('pages.admin.adminPanel_tretmani_insert', $this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function doAdminPanel_tretmani_insert(TretmanRequest $request){
        if($request->has('btnUnesi')){
            $naziv = $request->input('tbNaziv');
            $tekst = $request->input('taTekst');
            $tipTretmana = $request->input('ddlTipTretmana');
            $slika = $request->file('fSlika');
            $status = $request->input('ddlStatus');

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if(File::move($tmp_path, $new_path)) {
                    $tretman = new Tretman();
                    $tretman->t_naziv = $naziv;
                    $tretman->text_tretman = $tekst;
                    $tretman->t_status = $status;
                    $tretman->tt_id = $tipTretmana;
                    $tretman->putanja_slika = $slika_ime;
                    try {
                        $rez = $tretman->insertTretman();

                        if($rez){
                            return redirect()->route('adminPanel_tretmani',['id_tt'=>$tipTretmana])->with('poruka','Uspešan unos tretmana!');
                        }
                        else{
                            return redirect()->route('adminPanel_tretmani_insert')->with('poruka','Greška pri unosu tretmana!');
                        }
                    }
                    catch(\Exception $ex){
                        \Log::error("Greska:" .$ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_tretmani_insert')->with('poruka','Greška pri postavljanju slike na server!!');
                }
            }
            else{
                return redirect()->route('adminPanel_tretmani_insert')->with('poruka','Morate odabrali sliku!');
            }
        }
    }

    public function adminPanel_tretmani_update($id_tretman){
        $tretman = new Tretman();
        $tretman->id_tretman = $id_tretman;

        $tipTretmana = new TipTretmana();

        try {
            $this->data['tretman'] = $tretman->getOneTretmanUpdate($id_tretman);

            $this->data['tip_tretmana'] = $tipTretmana->getAll();
//            dd($this->data['tretman']);
            return view('pages.admin.adminPanel_tretmani_update',['id_tretman'=>$id_tretman], $this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function doAdminPanel_tretmani_update($id_tretman, TretmanUpdateRequest $request){
        if($request->has('btnIzmeni')){
            $naziv = $request->input('tbNaziv');
            $tekst = $request->input('taTekst');
            $tipTretmana = $request->input('ddlTipTretmana');
            $slika = $request->file('fSlika');
            $status = $request->input('ddlStatus');
            $tretman = new Tretman();

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if(File::move($tmp_path, $new_path)) {
                    try{
                        $tretman->id_tretman = $id_tretman;
                        $tretman->t_naziv = $naziv;
                        $tretman->text_tretman = $tekst;
                        $tretman->t_status = $status;
                        $tretman->tt_id = $tipTretmana;
                        $tretman->putanja_slika = $slika_ime;

                        $rez = $tretman->updateTretmanSaS($id_tretman);
                        if($rez){
                            return redirect()->route('adminPanel_tretmani',['id_tt'=>$tipTretmana])->with('poruka','Uspešna izmena tretmana!');
                        }
                        else{
                            return redirect()->route('adminPanel_tretmani_update',['id_tretman'=>$id_tretman])->with('poruka','Neuspešna izmena tretmana! 1');
                        }
                    }
                    catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_tretmani_update',['id_tretman'=>$id_tretman])->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                $tretman->t_naziv = $naziv;
                $tretman->text_tretman = $tekst;
                $tretman->t_status = $status;
                $tretman->tt_id = $tipTretmana;
                try{
                    $rez = $tretman->updateTretmanBezS($id_tretman);
                        return redirect()->route('adminPanel_tretmani',['id_tt'=>$tipTretmana])->with('poruka','Uspešna izmena tretmana!');
                }
                catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_tretmani_delete($id_tt,$id_tretman){
        $tretman = new Tretman();
        $tretman->id_tretman = $id_tretman;

        $thisTretman = $tretman->getOneTretman($id_tt,$id_tretman);
//        dd($thisTretman);
        try{
            if($thisTretman->t_status == 1){
                $this->data['tretman'] = $tretman->deleteOneTretman($id_tretman);
                return redirect()->route('adminPanel_tretmani',['id_tt'=>$id_tt])->with('poruka','Uspešno izvršeno deaktiviranje tretmana!');
            }
            else{
                $this->data['tretman'] = $tretman->realDeleteOneTretman($id_tretman);
                return redirect()->route('adminPanel_tretmani',['id_tt'=>$id_tt])->with('poruka','Uspešno brisanje tretmana!');
            }
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }

    }
}
