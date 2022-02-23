<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Korisnik extends Model
{
    use HasFactory;


    public $timestamps = false;
    public $primaryKey = 'id_korisnik';
    protected $fillable = ["korisnicko_ime", "lozinka","status","uloga_id"];

    public $korisnicko_ime;
    public $lozinka;
    public $status;
    public $uloga_id;

    public function ulogas(){
        return $this->hasOne(Ulogas::class);
    }

    public  function Logovanje($korIme,$lozinka){
        return DB::table('korisniks as k')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->select('*')
            ->where([
                ['lozinka','=',$this->lozinka],
                ['korisnicko_ime','=',$this->korisnicko_ime]
                ])
            ->first();
    }

    public function getAll(){
        return DB::table('korisniks as k')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->select('k.status as k_status','k.*','u.*','u.status as u_status')
            ->orderBy('k.uloga_id','desc')
            ->simplePaginate(6);
    }

    public function getOne($id_korisnik){
        return DB::table('korisniks as k','k.status as k_status')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->select('k.status as k_status','k.*','u.*','u.status as u_status')
            ->where(
                ['id_korisnik'=>$id_korisnik]
            )
            ->first();
    }

    public function deleteOne($id_korisnik){
        return DB::table('korisniks as k','k.status as k_status')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->where(
                ['id_korisnik'=>$id_korisnik]
            )
            ->update(
                ['k.status'=>'0']
            );
    }
    public function realDeleteOne($id_korisnik){
        return DB::table('korisniks as k')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->where(
                ['id_korisnik'=>$id_korisnik],
                ['k_status'=>'0']
            )
            ->delete();
    }
    public function updateKorisnika($id_korisnik){
        return DB::table('korisniks as k')
            ->join('ulogas as u','k.uloga_id','u.id_uloga')
            ->where(
                ['id_korisnik'=>$id_korisnik]
             )
            ->update(
                ['korisnicko_ime'=>$this->korisnicko_ime,
                   'lozinka'=>$this->lozinka,
                    'k.status'=>$this->status,
                    'uloga_id'=>$this->uloga_id
                ]);
    }

}
