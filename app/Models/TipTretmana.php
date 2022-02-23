<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipTretmana extends Model
{
    use HasFactory;

    public $primaryKey = 'id_tt';
    public $timestamps = false;
    protected $fillable = ["id_tt", "tt_naziv","tt_status"];

    public function tretmans(){
        return $this->belongsToMany(Tretman::class);
    }

    public function getAll(){
        return $rez = DB::table('tip_tretmanas as tt')
            ->select('*')
            ->where('tt_status','=','1  ')
            ->get();
    }

    public function getTipTretmana($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t', 't.tt_id', '=', 'tt.id_tt')
            ->select('t.*','tt.*')
            ->where(['tt.id_tt' => $id_tt])
            ->first();
    }
    public function getAllTipTretmana()
    {
        return $rez = DB::table('tip_tretmanas as tt')
            ->select('*')
            ->orderBy('tt.tt_naziv','desc')
            ->simplePaginate(6);
    }

    public function getAllTretmane($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('t.*','tt.*')
            ->where(['tt.id_tt'=>$id_tt])
            ->orderBy('t.id_tretman','asc')
            ->simplePaginate(5);
    }

    public  function  getTretmanPoTT($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('t.*','tt.*')
            ->where(['tt.id_tt'=>$id_tt])
            ->get();
    }
    public function deleteTipTretman($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->where(
                ['tt.id_tt'=>$id_tt]
            )
            ->update(
                ['tt.tt_status'=>'0']
            );
    }
    public function realDeleteTipTretman($id_tt){
        return $rez = DB::table('tip_tretmanas')
            ->where(
                ['id_tt'=>$id_tt],
                ['tt_status'=>'0']
            )
        ->delete();
    }
}
