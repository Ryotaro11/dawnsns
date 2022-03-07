<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; //add
use Illuminate\Http\Request;
use App\Providers\User; //add
use DB;
use Auth;


class FollowsController extends Controller
{
    //
    public function follow(Int $id){
        DB::table('follows')->insert([
            'follow' => $id, //相手のid取得
            'follower' => Auth::id(),//自分のid取得
        ]);
        return redirect('/search');
    }
    public function unfollow(Int $id){
        DB::table('follows')
            ->where('follow', $id)
            ->where('follower',Auth::id())
            ->delete();
        return redirect('/search');
    }
    //↑フォローする・はずす
        public function createFollow(Int $id){
        DB::table('follows')
            ->where('follow', $id)
            ->get();
         return redirect('/search');
        }

    //↑フォロー・フォロワーのデータ取得
    public function followList(){
        $icon = DB::table("follows")
        ->leftjoin('users', 'users.id', '=', 'follows.follow')
        ->where('follows.follower',Auth::id())
        ->select('users.images','users.id')
        ->get();

        $list = DB::table("posts")
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('posts.posts','posts.created_at','users.id','users.username','users.images')
        ->latest()
        ->get();
        return view('follows.followList',["list" => $list,"icon"=>$icon]);
    }
    public function followerList(){
        //フォロワーの画像と投稿リスト出力
       $icon = DB::table("follows")
        ->leftjoin('users', 'users.id', '=', 'follows.follower')
        ->where('follows.follow',Auth::id())
        ->select('users.images','users.id')
        ->get();

        $list = DB::table("posts")
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('posts.*','users.username','users.images')
        ->latest()
        ->get();
        return view('follows.followerList',["list" => $list,"icon"=>$icon]);
    }

}