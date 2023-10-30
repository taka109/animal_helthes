<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Replies extends Model
{
    use HasFactory;
    //テーブル
    protected $table = 'replies';

    //登録・変更可能なカラムの指定
   protected $fillable = [
       'customers_id',
       'body',
       'created_at',
       'updated_at',
       'delete'
   ];
    //replies表示
    public function select(){
        $replies = DB::table('replies')->get();
        return $replies;
    }
    //返信内容の指定
    public function edit($request){
        $id = $request->get('id');
        $replies = DB::table('replies')->find($id);
        return $replies;
    }
    //replyに登録
    public function reply($request){
        $param = ([
            'customers_id' => $request->get('id'),
            'body' => $request->get('body'),
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
        $replies = DB::table('replies')->insert($param);
        return $replies;
    }
}

