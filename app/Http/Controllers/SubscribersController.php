<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Pets;
// Facades\Authを追加
use Illuminate\Support\Facades\Auth;
use App\Calendar\CalendarView;
use App\Models\Pets_helthes;
use App\Models\Publices;
use App\Models\Customers;
use Carbon\Carbon;
use App\Models\Replies;
use Illuminate\Support\Str;

class SubscribersController extends Controller{
    //
    public function complete() {
        //ログインしていたら、complete表示
        if(Auth::check()){
           return view('complete'); 
        }else{
            return view('auth/login');
        }
        
    }
    
    //管理者がユーザー一覧に遷移
    public function userlist(){
        $user = new Users();
        $users = $user->select();
        return view('userlist', compact('users'));
    }
    //petsテーブルに登録
    public function petcomp(Request $request){
        $request->validate([
            'name' => 'required|string',
            'date' => 'required',
            'weight' => 'required|integer',
        ]);
        $pet = new Pets();
        $pets = $pet->petsub($request);
        return view('petsubcomp', compact('pets')); 
    }
    //petsテーブルのデータ編集
    public function edit(Request $request){
        $request->validate([
            'name' => 'required|string',
            'date' => 'required',
            'animals_id' => 'required|integer',
            'weight' => 'required|integer',
        ]);
        $pet = new Pets();
        $pets = $pet->edit($request);
        return view('editcomp', compact('pets')); 
    }
    //pets_helthテーブルにデータ挿入
    public function calendarcomp(Request $request){
        $request->validate([
            'pets_id' => 'required|integer',
            'eat' => 'required|integer',
            'date' => 'required',
        ]);
        $pet = new Pets_helthes();
        $pets = $pet->pet_helth_sub($request);
        return view('calendarcomp', compact('pets'));
    }
    //publicesテーブルにデータ挿入
    public function postcomplete(Request $request){
        $request->validate([
            'title' => 'required',
            'name' => 'required|string', 
            'body' => 'required',
            'image' => 'required',
        ]);
        $publice = new Publices();
        $publices = $publice->postcomplete($request);   
        return view('postcomplete', compact('publices','publice'));
    }
    //customersにデータイン
    public function customercomp(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required', 
        ]);
        $customer = new Customers();
        $customers = $customer->customerscomplete($request);
        return view('customercomp',compact('customers'));
    }
    //replyにデータイン
    public function replycomp(Request $request){
        $request->validate([
            'body' => 'required', 
        ]);
        $reply = new Replies();
        $replies = $reply->reply($request);
        return view('replycomp',compact('reply'));
    }
    //投稿の論理消去
    public function postdelete(Request $request){
        $publice = new Publices();
        $publices = $publice->postdelete($request);
        return view('postdelete',compact('publices'));
    }
    //user論理消去
    public function us_delete(Request $request){
        $user = new Users();
        $users = $user->rogick($request);
        return view('userdelete',compact('users'));
    }
    //customerの相談論理消去
    public function customerdelete(Request $request){
        $customer = new Customers();
        $customers = $customer->customerdelete($request);
        return view('customerdelete',compact('customers'));
    }
        //日記の相談論理消去
    public function datedelete(Request $request){
        $pet = new Pets_helthes();
        $pets = $pet->datedelete($request);
        return view('datedelete',compact('pets'));
    }
}
