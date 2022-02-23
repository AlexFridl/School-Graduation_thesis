<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\Slajder;
use App\Models\TipTretmana;
use Illuminate\Http\Request;

class BaseFrontendController extends Controller
{
    public $data = [];
    public function __construct()
    {
        try{
            $tipTretmana = new TipTretmana();
            $this->data['tipTretmana'] = $tipTretmana->getAll();

            $slajder = new Slajder();
            $this->data['slajder']  = $slajder->getAll();
//            dd($this->data['slajder']);

            $podaci = new Podaci();
            $this->data['podaci'] = $podaci->getAll();
//            dd($this->data['podaci']);
            return view('pages.pocetna',$this->data);
        }
        catch(\Exception $ex){
            \Log::error("Greska:" .$ex->getMessage());
        }
    }
}
