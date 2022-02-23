<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Podaci extends Model
{
    use HasFactory;

    public $id;
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ["id", "tekst","ulica","mesto","kontakt_tel","podaci_slika"];

    public function getAll(){
        return DB::table('podacis')
            ->select('*')
            ->get();
    }
    public function getOne($id){
        return DB::table('podacis as p')
            ->select('*')
            ->where([
                ['id','=',$id]
            ])
            ->first();
    }

    public function deleteOne($id){
        return DB::table('podacis')
            ->where([
                ['id','=',$id]
            ])
            ->update(
                ['status'=>'0']
            );
    }
}
