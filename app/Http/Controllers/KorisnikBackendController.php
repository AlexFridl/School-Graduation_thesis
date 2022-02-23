<?php

namespace App\Http\Controllers;

use App\Http\Requests\KorisnikRequest;
use App\Http\Requests\KorisnikUpdateRequest;
use App\Models\Korisnik;
use App\Models\Uloga;
use Illuminate\Http\Request;

class KorisnikBackendController extends BackendController
{
    public function adminPanel_korisnici(){
        $korisnik = new Korisnik();
        try{
            $this->data['korisnici'] = $korisnik->getAll();
        //        dd($this->data['korisnici']);
            return view('pages.admin.adminPanel_korisnici',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_korisnik_insert(){

        $this->data['uloga']= Uloga::all();
        return view('pages.admin.adminPanel_korisnici_insert',$this->data);
    }

    public  function doAdminPanel_korisnik_insert(KorisnikRequest $request){
        if($request->has('btnUnesi')){
            $korIme = $request->input('tbKorIme');
            $lozinka = $request->input('tbLozinka');
            $uloga = $request->input('ddlUloga');

            try{
                $rez = Korisnik::create(array(
                    'korisnicko_ime'=>$korIme,
                    'lozinka'=>md5($lozinka),
                    'status'=>'1',
                    'uloga_id'=>$uloga
                ));
                if($rez){
                    return redirect()->route('adminPanel_korisnici')->with('poruka','Uspešno ste uneli korisnika!');
                }
                else{
                    return redirect()->route('adminPanel_korisnik_insert')->with('poruka','Niste uneli korisnika!');
                }
            }
            catch(\Exception $ex){
                \Log::error("Greska:" .$ex->getMessage());
            }
        }
    }

    public function adminPanel_korisnici_update($id_korisnik)
    {
        $korisnik = new Korisnik();
        $uloga = new Uloga();

        try{
            $korisnik->id_korisnik = $id_korisnik;
            $this->data['korisnik'] = $korisnik->getOne($id_korisnik);
            $this->data['uloga'] = $uloga->getAll();
            //dd($this->data['korisnik']);
            return view('pages.admin.adminPanel_korisnici_update',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function doAdminPanel_korisnici_update($id_korisnik,KorisnikUpdateRequest $request){
        if($request->has('btnIzmeni')){

            $korIme = $request->input('tbKorIme');
            $lozinka = $request->input('tbLozinka');
            $uloga = $request->input('ddlUloga');
            $status = $request->input('ddlStatus');

            $korisnik = Korisnik::find($id_korisnik);

            $korisnik->id_korisnik = $id_korisnik;
            $korisnik->korisnicko_ime = $korIme;
            $korisnik->lozinka = md5($lozinka);
            $korisnik->status = $status;
            $korisnik->uloga_id = $uloga;

            try{
                $rez = $korisnik->updateKorisnika($id_korisnik);
//                dd($korisnik->korisnicko_ime);
                if($rez){
                    return redirect()->route('adminPanel_korisnici')->with('poruka','Uspešno ste izmenili korisnika!');
                }
                else{
                    return redirect()->route('adminPanel_korisnik_update',['id_korisnik'=>$id_korisnik])->with('poruka','Niste izmenili korisnika!');
                }
            }
            catch (\Exception $ex) {
                \Log::error("Greska:" . $ex->getMessage());
            }
        }
    }
    public  function adminPanel_korisnici_delete($id_korisnik){
//        dd($id_korisnik);
        $korisnik = new Korisnik();
        $korisnik->id_korisnik = $id_korisnik;
        $thisKorisnik = $korisnik->getOne($id_korisnik);
//        dd($thisKorisnik);
        try{
            if($thisKorisnik->k_status == 1){
                $korisnik->deleteOne($id_korisnik);
                return redirect()->route('adminPanel_korisnici')->with('poruka','Uspešno deaktiviranje korisnika!');
            }
            else{
                $korisnik->realDeleteOne($id_korisnik);
                return redirect()->route('adminPanel_korisnici')->with('poruka','Uspešno brisanje korisnika!');
            }
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

    }
