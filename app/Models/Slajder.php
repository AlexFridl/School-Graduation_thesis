<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slajder extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id_slajder';
    protected $fillable = ["naslov_slajder", "putanja_slajder","postavljeno","status"];

    use HasFactory;
    public function getAll(){
        return $rez = DB::table('slajders as s')
            ->select('*')
            ->orderBy('s.postavljeno','desc')
            ->get();
    }

    public function getAllAdmin(){
        return $rez = DB::table('slajders as s')
            ->select('*')
            ->orderBy('s.postavljeno','desc')
            ->simplePaginate(6);
    }
    public function getOne($id_slajder){
        return $rez = DB::table('slajders as s')
            ->select('*')
            ->where([
                ['id_slajder','=',$id_slajder]
            ])
            ->first();
    }

    public function deleteOne($id_slajder){
        return DB::table('slajders')
            ->where(
                ['id_slajder'=>$id_slajder]
            )
            ->update(
                ['status'=>'0']
            );
    }

    public function realDeleteOne($id_slajder){
        return DB::table('slajders')
            ->where(
                ['id_slajder'=>$id_slajder],
                ['status'=>'1']
            )
            ->delete();
    }
}
