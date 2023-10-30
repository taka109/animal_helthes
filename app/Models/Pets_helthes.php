<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Pets_helthes extends Model
{
    use HasFactory;
    protected $table = 'pets_helth';
      //登録・変更可能なカラムの指定
    protected $fillable = [
        'pets_id',
        'body',
        'date',
        'eat'
    ];
    //pets_helthテーブルに登録
   public function pet_helth_sub($request){
        $param = ([
            'users_id' => Auth::id(),
            'pets_id'=> $request->get('pets_id'),
            'body'=> $request->get('body'),
            'date'=> $request->get('date'),
            'eat'=> $request->get('eat'),
        ]);

        $pets = DB::table('pets_helth')->insert($param);
        return $pets;
    }
    //pets_helthテーブル表紙
    public function select(){
        $dates = DB::table('pets_helth')->get();
        return $dates;
    }
    //idを指定して表示
    public function dateinfo($request){
        $id = $request->get('id');
        $pets = DB::table('pets_helth')->find($id);
        return $pets;
    }
    //idを取得して論理消去
    public function datedelete($request){
        $id = $request->get('id');
        $param = ([
            'deleted_at' =>$request->get('deleted_at')
        ]);
        $pets = DB::table('pets_helth')->where('id',$id)->update($param);
        return $pets;
    }
}
