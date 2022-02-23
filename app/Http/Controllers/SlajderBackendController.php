<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlajderRequest;
use App\Http\Requests\SlajderUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Slajder;
use Illuminate\Support\Facades\File;

class SlajderBackendController extends BackendController{

    public function adminPanel_slajder(){
        $slajder = new Slajder();
        $this->data['slajder']  = $slajder->getAllAdmin();
       // dd($this->data['slajder']);
        return view('pages.admin.adminPanel_slajder',$this->data);
    }

    public  function adminPanel_slajder_insert(){
        return view('pages.admin.adminPanel_slajder_insert',$this->data);
    }
    public function doAdminPanel_slajder_insert(SlajderRequest $request){
        if($request->has('btnUnesi')){
            $naslov = $request->input('tbNaslov');
            $status = $request->input('ddlStatus');
            $slika = $request->file('fSlika');

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if(File::move($tmp_path, $new_path)) {
                    try {
                        $rez = Slajder::create(
                            array(
                                'naslov_slajder' => $naslov,
                                'putanja_slajder' =>$slika_ime,
                                'postavljeno' => time(),
                                'status' => $status
                            )
                        );
                        if($rez){
                            return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste uneli sliku za sajder!');
                        }
                        else{
                            return redirect()->route('adminPanel_slajder_insert')->with('poruka','Niste uneli sliku za slajder!');
                        }
                    }
                    catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_slajder')->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                return redirect()->route('adminPanel_slajder_insert')->with('poruka','Morate odabrati sliku!');
            }
        }


    }

    public  function adminPanel_slajder_update($id_slajder)
    {
        $slajder = new Slajder();
        $slajder->id_slajder = $id_slajder;
        $this->data['slajder'] = $slajder->getOne($id_slajder);
        return view('pages.admin.adminPanel_slajder_update',$this->data);
    }
    public function doAdminPanel_slajder_update($id_slajder,SlajderUpdateRequest $request){
      if($request->has('btnIzmeni')){
            $naslov = $request->input('tbNaslov');
            $status = $request->input('ddlStatus');
            $slika = $request->file('fSlika');

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/' . $slika_ime;

                if(File::move($tmp_path, $new_path)) {
                    $slajd = Slajder::find($id_slajder);
                    $slajd->id_slajder = $id_slajder;
                    $slajd->naslov_slajder = $naslov;
                    $slajd->putanja_slajder = $slika_ime;
                    $slajd->postavljeno = time();
                    $slajd->status = $status;
                    try {
                        $rez = $slajd->save();
                        if($rez){
                            return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste uneli sliku za sajder!');
                        }
                        else{
                            return redirect()->route('adminPanel_slajder_update')->with('poruka','Niste uneli sliku za slajder!');
                        }
                    }
                    catch (\Exception $ex) {
                        \Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_slajder')->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                $slajd = Slajder::find($id_slajder);
                $slajd->id_slajder = $id_slajder;
                $slajd->naslov_slajder = $naslov;
                $slajd->postavljeno = time();
                $slajd->status = $status;
                try {
                    $rez = $slajd->save();
                    if($rez){
                        return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste izmenili podatke za slajder!');
                    }
                    else{
                        return redirect()->route('adminPanel_slajder_update')->with('poruka','Izmena nije uspela!');
                    }
                }
                catch (\Exception $ex) {
                    \Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_slajder_delete($id_slajder){
        $slajder = new Slajder();
        $slajder->id_slajder = $id_slajder;
        $sveSlike = $slajder->getOne($id_slajder);
        //dd($sveSlike);
        try{
            if($sveSlike->status == 1){
                $slajder->deleteOne($id_slajder);
                return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno deaktiviranje slike slajdera!');
            }
            else{
                $slajder->realDeleteOne($id_slajder);
                return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno brisanje slike slajdera!');
            }
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }

}
