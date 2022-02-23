<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'id_blog';

    protected $fillable = ["naslov_blog", "text_blog","podnaslov_blog","status","putanja_slika_blog","postavljeno"];

    public function getAll(){
        return $rez = DB::table('blogs as b')
            ->select('*')
            ->where([
                ['b.status','=','1']
            ])
            ->orderBy('b.postavljeno','desc')
           ->simplePaginate(3);
    }

    public function getAllBloger(){
        return $rez = DB::table('blogs as b')
            ->select('*')
            ->where([
                ['b.status','=','1']
            ])
            ->orderBy('b.postavljeno','desc')
            ->simplePaginate(3);
    }

    public function getAllAdmin(){
            return $rez = DB::table('blogs as b')
                ->select('*')
                ->orderBy('b.postavljeno','desc')
                ->simplePaginate(6);
//                ->get();
    }
    public function getOne($id_blog){
        return $rez = DB::table('blogs')
            ->select('*')
            ->where(
                ['id_blog'=>$id_blog]
            )
            ->first();
    }

    public function deleteOne($id_blog){
        return $rez = DB::table('blogs as b')
            ->where(
                ['b.id_blog'=>$id_blog]
             )
            ->update(
                ['b.status'=>'0']
            );
    }

    public function realDeleteOne($id_blog){
        return $rez = DB::table('blogs')
            ->where(
                ['id_blog'=>$id_blog],
                ['status'=>'0']
            )
            ->delete();
    }

    public function searchBlog($unos){
        return $rez = DB::table('blogs as b')
//            ->join('slikas as s','b.slika_id','=','s.id_slika')
            ->select('*')
            ->where('b.naslov_blog','LIKE','%'.$unos.'%')
            ->orWhere('b.text_blog','LIKE','%'.$unos.'%')
            ->orWhere('b.podnaslov_blog','LIKE','%'.$unos.'%')
            ->orderBy('b.postavljeno','desc')
            ->get();
    }
}
