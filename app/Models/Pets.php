<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Pets extends Model
{
    use HasFactory;
     //テーブル
     protected $table = 'pets';
      //登録・変更可能なカラムの指定
    protected $fillable = [
        'name',
        'birth',
        'animals_id',
        'weight'
    ];
    //
    public function pets_data(){
        $id = auth()->id();
        $pets = DB::table('pets')->where('users_id',$id)->first();
        return $pets;
    }
    
    //petsテーブルの表示
    public function pets_info(){
        $id = auth()->id();
        $pets = DB::table('pets')->where('users_id',$id)->first();
        $pets->age = Carbon::parse($pets->birth)->age;
        return $pets;
    }
   //petsテーブルに登録
   public function petsub($request){
        $param = ([
            'users_id' => Auth::id(),
            'name' => $request->get('name'),
            'birth' => $request->get('date'),
            'animals_id' => $request->get('animals_id'),
            'weight' => $request->get('weight')
        ]);

        $pets = DB::table('pets')->insert($param);
        return $pets;
   }
   //petsテーブルのデータ編集
   public function edit($request){
        $id = auth()->id();
        $param = ([
            'users_id' => Auth::id(),
            'name' => $request->get('name'),
            'birth' => $request->get('date'),
            'animals_id' => $request->get('animals_id'),
            'weight' => $request->get('weight')
        ]);
        $pets = DB::table('pets')->where('users_id',$id)->update($param);
        return $pets;
   }
}
