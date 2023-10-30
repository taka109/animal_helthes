<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes; // トレイトを使う
use Carbon\Carbon;
use App\Models\Goods;
use App\Notifications\PasswordResetNotification;

class Users extends Model
{
    use HasFactory;
  
    //テーブル
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    //登録・変更可能なカラムの指定
    protected $fillable = [
        'name',
        'email',
    ];
    //ユーザーデータ取得
    public function select(){
        $users =DB::table('users')->get();
        return $users;
    }
    //ユーザーデータ論理消去
    public function rogick($request){
        $id = $request->get('id');
        $param = ([
            'deleted_at' =>$request->get('deleted_at')
        ]);
        $users = DB::table('users')->where('id',$id)->update($param);
        return $users;
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Goods');
    }

    public function sendPasswordResetNotification($token)
{
    $this->notify(new PasswordResetNotification($token));
}

    
}
