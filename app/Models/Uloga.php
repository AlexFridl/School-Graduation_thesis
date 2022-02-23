<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uloga extends Model
{
    use HasFactory;

    public function korisniks(){
        return $this->belongsToMany(Korisnik::class);
    }

    public function getAll(){
        return $rez = DB::table('ulogas as u')
            ->select('*')
            ->get();
    }

}
