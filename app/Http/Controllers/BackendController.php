<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Korisnik;
use App\Models\Podaci;
use App\Models\TipTretmana;
use App\Models\Tretman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Output\ProcOutputPager;

class BackendController extends Controller
{
    public $data = [];
    public function __construct()
    {
        $tipTretmana = new TipTretmana();
        $podaci = new Podaci();
        try{

            $this->data['tipTretmana'] = $tipTretmana->getAll();
            $this->data['podaci'] = $podaci->getAll();
            //dd($this->data['tipTretmana']);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_podaci(){
        $podaci = new Podaci();
        try {
            $this->data['podaci'] = $podaci->getAll();
            return view('pages.admin.adminPanel_podaci', $this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }


    public  function adminPanel_podaci_update($id)
    {  $podaci = new Podaci();
        $this->data['podaci'] = $podaci->getOne($id);
        return view('pages.admin.adminPanel_podaci_update',$this->data);
    }

    public function doAdminPanel_podaci_update($id,Request $request){
        if($request->has('btnIzmeni')){
            $tekst = $request->input('text');
            $ulica = $request->input('ulica');
            $mesto = $request->input('mesto');
            $tel1 = $request->input('tell');

            $slika = $request->file('slika');

            if($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if (File::move($tmp_path, $new_path)) {
                    $podaci = Podaci::find($id);
                    $podaci->id = $id;
                    $podaci->tekst = $tekst;
                    $podaci->ulica = $ulica;
                    $podaci->mesto = $mesto;
                    $podaci->kontakt_tel = $tel1;
                    $podaci->podaci_slika = $slika_ime;

                    try {
                        $rez = $podaci->save();
                        if ($rez) {
                            return redirect()->route('adminPanel_podaci')->with('poruka', 'Uspešna izmena podataka!');
                        }
                        else {
                            return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruka', 'Neuspešna izmena podataka!');
                        }

                    } catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_podaci_update',['id'=>$id])->with('porukporukaa','Greška pri postavljanju slike na server!');
                }
            }
            else {
                $podaci = Podaci::find($id);
                $podaci->id = $id;
                $podaci->tekst = $tekst;
                $podaci->ulica = $ulica;
                $podaci->mesto = $mesto;
                $podaci->kontakt_tel = $tel1;

                try {
                    $rez = $podaci->save();

                    if ($rez) {
                        return redirect()->route('adminPanel_podaci')->with('poruke', 'Uspešna izmena podataka!');
                    } else {
                        return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruke', 'Neuspešna izmena podataka!');
                    }
                }
                catch (\Exception $ex) {
                    \Log::error("Greska:" . $ex->getMessage());
                }
            }
        }

    }
    public function adminPanel_podaci_delete($id){
        $podaci = new Podaci();
        $podaci->id = $id;
        try{
            $podaci->deleteOne($id);
            return redirect()->route('adminPanel_podaci')->with('poruka','Uspešno izvršenp brisanje!');
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }
}
