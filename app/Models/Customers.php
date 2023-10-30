<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class customers extends Model
{
    use HasFactory;
    use SoftDeletes;
    //テーブル
    protected $table = 'customers';

    //登録・変更可能なカラムの指定
   protected $fillable = [
       'user_id',
       'title',
       'body',
       'created_at',
       'updated_at',
       'delete'
   ];
   //customersにデータ登録
   public function customerscomplete($request){
        $param = ([
            'users_id' => Auth::id(),
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now()
        ]);
    
        $customers = DB::table('customers')->insert($param);
        return $customers;
    }
    //customer表示
    public function select(){
        $customers = DB::table('customers')->get();
        return $customers;
    }
    //customer詳細取得
    public function detail($request){
        $id = $request->get('id');
        $customers = DB::table('customers')->find($id);
        return  $customers;
    }
    //customersページ内検索
    public function egosa($request){
        $keyword = $request->get('keyword');
        if(!empty($keyword)){
            $customers = DB::table('customers')->where('title','like',"%{$keyword}%")->get();
        }
        return $customers;
    }
     //idを取得して論理消去
    public function customerdelete($request){
        $id = $request->get('id');
        $param = ([
            'deleted_at' =>$request->get('deleted_at')
        ]);
        $customers = DB::table('customers')->where('id',$id)->update($param);
        return $customers;
    }
}

