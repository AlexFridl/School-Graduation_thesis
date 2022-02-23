<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Termini extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'id_termini';

    public function zakazanos(){
        return $this->belongsToMany(Zakaano::class);
    }

    public function getDateTermin($tmStmDatumPokupljeni){
        return $rez = DB::table('zakazanos as z')
            ->join('terminis as t','z.termin_id','=','t.id_termini')
            ->select('*')
            ->where(['z.datum'=>$tmStmDatumPokupljeni],
                    ['z.status_termina'=>'1'])
            ->get();
    }

    public function getAllTermin(){
        return $rez = DB::table('terminis as t')
            ->select('*')
            ->get();
    }
    public function getFreeTermin($id_termini){
        return $rez = DB::table('terminis as t')
            ->select('*')
            ->where(['t.id_termini'=>$id_termini],
                ['t.status'=>'1'])
            ->get();
    }
}
