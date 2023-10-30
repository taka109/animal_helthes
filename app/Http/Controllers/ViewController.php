<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publices;
use App\Models\Pets;
use App\Models\Animals;
use Illuminate\Support\Facades\Auth;

use App\Models\Pets_helthes;
use App\Models\Customers;
use App\Models\Replies;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use App\Models\Goods;

class ViewController extends Controller
{
    //index表示
    public function index(Request $request) {
        // $publice = new Publices();
        $sort = $request->sort;
        $publices = Publices::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'publices' => $publices,
        ];
        // $publices = $publice ->select();
        return view('index', compact('publices', 'sort','param'));
    }

    public function post(Request $request){
        $publice = new Publices();
        $publices = $publice->post($request);
        return view('post',compact('publices'));
    }

    //mypageに遷移
    public function mypage() {
        $pet = new Pets();
        $pets = $pet ->pets_data();
        return view('mypage', compact('pets'));
    }
    //管理者がユーザー一覧に遷移
    public function userlist(){
        $user = new Users();
        $users = $user->select();
        return view('userlist', compact('users'));
    }
    //petsubに遷移
    public function petsub(){
        $animal = new Animals();
        $results = $animal->animals();
        return view('petsub', compact('results'));
    }
    //peteditに遷移
    public function petedit(Request $request){
        $animal = new Animals();
        $pet = new Pets();
        $results = $animal->animals();
        $pets = $pet ->pets_data();
        return view('petedit', compact('pets','results'));
    }
    //petinfoに遷移
    public function petinfo(){
        $animal = new Animals();
        $pet = new Pets();
        $results = $animal->animals();
        $pets = $pet ->pets_info();
        return view('petinfo', compact('pets','results'));
    }

    //calenderinfに遷移
    public function calendarsub(){
        $animal = new Animals();
        $pet = new Pets();
        $results = $animal->animals();
        $pets = $pet ->pets_data();
        return view('calendarsub',compact('pets','results'));
    }
    //newCustomersに遷移
    public function newcustomers(){
        $animal = new Animals();
        $pet = new Pets();
        $results = $animal->animals();
        $pets = $pet ->pets_data();
        return view('newCustomers',compact('results','pets'));
    }
    //myCustomersに遷移
    public function myCustomers(Request $request){
        $publice = new Publices();
        $sort = $request->sort;
        $publices = Publices::paginate(10);
        // $publices = $publice ->select();
        return view('mycustomers',compact('publices', 'sort'));
    }
    //datelistに遷移
    public function datelist(Request $request){
        $date = new Pets_helthes();
        $sort = $request->sort;
        $dates = Pets_helthes::paginate(10);
        // $dates = $date->select();
        return view('datelist',compact('dates', 'sort'));              
    }
    //customerlistに遷移
    public function customerlist(Request $request){
        $customer = new Customers();
        $sort = $request->sort;
        $customers = DB::table('customers')->paginate(10);
        // $customers = $customer->select();
        return view('customerlist', compact('customers', 'sort'));
    }
    //customerlistページ内検索
    public function egosa(Request $request){
       //キーワード受け取り
        $keyword = $request->input('keyword'); 
        //クエリ生成
        $query = Customers::query();
            //もしキーワードがあったら
        if(!empty($keyword)){
            $customers = DB::table('customers')->where('title','like','%'.$keyword.'%')->orderBy('created_at','desc')->paginate(10);
        }elseif(empty($keyword)){
            //ページネーション
            $customers = DB::table('customers')->orderBy('created_at','desc')->paginate(10);
        }
            
        return view('customerlist', compact('customers'));

    }
    //mycustomerに遷移
    public function mycustomer(Request $request){
        $customer = new Customers();
        $sort = $request->sort;
        $customers = DB::table('customers')->paginate(10);
        return view('mycustomer', compact('customers','sort'));
    }
    
    //customerformに遷移
    public function customerform(){
        return view('customerform');
    }
    //customerinfoに遷移
    public function customerinfo(Request $request){
        $customer = new Customers();
        $customers = $customer->detail($request);
        $reply = new Replies();
        $sort = $request->sort;
        $replies = Replies::paginate(10);
        // $replies = $reply->select();
        return view('customerinfo',compact('customers','replies', 'sort'));
    }
    //customerreplyに遷移
    public function customerreply(Request $request){
        $customer = new Customers();
        $customers = $customer->detail($request);
        return view('customerreply', compact('customers'));
    }
    //replyinfoに遷移
    public function replyinfo(Request $request){
        $reply = new Replies();
        $replies = $reply->edit($request);
        return view('replyinfo', compact('replies'));
    }
    //Customersに遷移
    public function Customers(Request $request){
        $publice = new Publices();
        $publices = $publice->Customers($request);
        return view('Customers', compact('publices'));
    }
    //newpostに遷移
    public function newpost(Request $request){
        $animal = new Animals();
        $pet = new Pets();
        $results = $animal->animals();
        $pets = $pet ->pets_data();
        return view('newpost',compact('results','pets'));
    }
    //mypostに遷移
    public function mypost(Request $request){
        $publice = new Publices();
        $sort = $request->sort;
        $publices = Publices::paginate(10);
        // $publices = $publice ->select();
        return view('mypost', compact('publices', 'sort'));
    }
    //日記詳細
    public function dateinfo(Request $request){
        $pet = new Pets_helthes();
        $pets = $pet->dateinfo($request);
        return view('calendarinf',compact('pets'));
    }

    public function like(Request $request){
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $publice_id = $request->publice_id; //2.投稿idの取得
        $already_liked = Goods::where('user_id', $user_id)->where('publices_id', $publice_id)->first(); 

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Goods; //4.Goodsクラスのインスタンスを作成
            $like->publices_id = $publice_id; //Likeインスタンスにpublices_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Goods::where('publices_id', $publice_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $publice_likes_count = publices::withCount('likes')->findOrFail($publice_id)->likes_count;
        $param = [
            'publice_likes_count' => $publice_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }

    public function send(){
        return view("user.reset_password.send_complete");
    }
}
