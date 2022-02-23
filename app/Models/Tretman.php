<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tretman extends Model
{
    use HasFactory;

    public $t_naziv;
    public $text_tretman;
    public $t_status;
    public $tt_id;
    public $putanja_slika;


    public $primaryKey = 'id_tretman';
    public $foreignKey = 'tt_id';
    public $timestamps = false;

    protected $fillable = ["t_naziv", "text_tretman","t_status","tt_id","putanja_slika"];

    public function tip_tretmanas(){
        return $this->hasOne(TipTretmana::class);
    }

    public function zakazanos(){
        $this->belongsToMany(Zakazano::class);
    }

    public function getAll(){
        return $rez = DB::table('tretmans')
            ->select('*')
            ->get();
    }
    public function getTretamane(){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('*')
            ->where([
                ['t.t_status','=','0'],
            ])
            ->get();
    }
    public function getTretmane($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('*')
            ->where(
                ['id_tt'=>$id_tt]
            )
            ->orderBy('t.t_naziv','desc')
            ->simplePaginate(6);
    }

    public function getOneTretman($id_tt,$id_tretman){
        return $rez = DB::table('tretmans as t')
            ->select('t.*')
            ->where(
                ['t.tt_id'=>$id_tt])
            ->where(['t.id_tretman'=>$id_tretman])
            ->first();
    }
    public function getOneTretmanUpdate($id_tretman){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('*')
            ->where(['t.id_tretman'=>$id_tretman])
            ->first();

    }
    public function deleteOneTretman($id_tretman){
        return $rez = DB::table('tretmans as t')
            ->where(
                ['t.id_tretman'=>$id_tretman]
            )
            ->update(
                ['t.t_status'=>'0']
            );
    }

    public function realDeleteOneTretman($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(
                ['id_tretman'=>$id_tretman],
                ['t_status'=>'0']
            )
            ->delete();
    }

    public function insertTretman(){
        return $rez = DB::table('tretmans')
            ->insert([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id,
                'putanja_slika'=>$this->putanja_slika
            ]);
    }

    public function updateTretmanSaS($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(
                ['id_tretman'=>$id_tretman]
            )
            ->update([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id,
                'putanja_slika'=>$this->putanja_slika
            ]);
    }

    public function updateTretmanBezS($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(['id_tretman'=>$id_tretman])
            ->update([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id
            ]);
    }
}
