<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Goods;

class Publices extends Model
{
    use HasFactory;
     //テーブル
     protected $table = 'publices';

     //登録・変更可能なカラムの指定
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'body',
        'date',
        'good',
        'delete'
    ];
    //テーブル結合し一覧に投稿表示
    public function select(){
        $publices = DB::table('publices')->get();
        return $publices;
    }

    public function postcomplete($request){
        $publice = $request->file('image')->store('public/img');
        $publice  = str_replace('public/img/', '', $publice);
        $param = ([
            'users_id' => Auth::id(),
            'title' => $request->get('title'),
            'name' => $request->get('name'),
            'animals_id' =>$request->get('animals_id'),
            'image' =>$publice,
            'body' => $request->get('body'),
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
       
        $publices = DB::table('publices')->insert($param);
        return $publices;
    }
    //users_idを指定して表示
    public function post($request){
        $id = $request->get('id');
        $publices = DB::table('publices')->find($id);
        return $publices;
    }
    //idを取得して論理消去
    public function postdelete($request){
        $id = $request->get('id');
        $param = ([
            'deleted_at' =>$request->get('deleted_at')
        ]);
        $publices = DB::table('publices')->where('id',$id)->update($param);
        return $publices;
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Goods');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        
        return Goods::where('user_id', $user->id)->where('publices_id', $this->id)->first() !==null;
    }
}