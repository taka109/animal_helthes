<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Animals extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'type'
    ];
    //animalsテーブル取得
    public function animals(){
        $animals = DB::table('animals')->get();
        return $animals;
    }
}
