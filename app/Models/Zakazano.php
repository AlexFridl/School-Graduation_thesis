<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Zakazano extends Model
{
    use HasFactory;


    public $timestamps = false;
    public $primaryKey = 'id_zakazano';
    public $foreignKey = 'tretman_id, status_terminas_id, termin_id';
    protected $fillable = ["ime", "prezime","email","datum","br_tel","tretman_id","status_termina","termin_id"];

    public function termini(){
        $this->hasOne(Termini::class);
    }

    public function status_termin(){
        $this->hasOne(StatusTermina::class);
    }

    public function tretman(){
        $this->hasOne(Tretman::class);
    }

    public function getAll(){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['z.status_termina'=>'1'])
            ->orderBy('z.datum','desc')
            ->simplePaginate(6);
    }

    public function getOne($id_zakazano){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['z.id_zakazano'=>$id_zakazano])
            ->first();
    }

    public function otkazi($id_zakazano){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['z.id_zakazano'=>$id_zakazano])
            ->update(['status_termina'=>'0']);
    }
    public function obrisi($id_zakazano){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['z.id_zakazano'=>$id_zakazano])
            ->delete();
    }

    public function getAllZakazane(){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['status_termina'=>'1'])
            ->orderBy('te.id_termini','asc')
            ->get();
    }
    public function getAllOtkazane(){
        return $rez = DB::table('zakazanos as z')
            ->join('tretmans as t','z.tretman_id','=','t.id_tretman')
            ->join('terminis as te','z.termin_id','=','te.id_termini')
            ->select('*')
            ->where(['status_termina'=>'0'])
            ->orderBy('te.id_termini','asc')
            ->simplePaginate(6);
    }
}
