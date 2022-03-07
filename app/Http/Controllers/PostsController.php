<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\View;


class PostsController extends Controller
{
    public function index()
    {
        $list = DB::table("posts")
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('posts.*','users.username','users.images')
        ->groupBy('posts.id')
        ->latest()
        ->get(); //postsテーブルからすべてのレコード情報をゲットする
        // ジョイン分の挿入
        return view("posts.index", ["list" => $list]);
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost'); //登録処理だけを行うページ
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }
    public function delete($id) //削除処理だけを行うページ
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post , 'user_id' => $id,'updated_at' => now()]
            );

        return redirect('/top');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function follow()
    {
        $list = DB::table("posts")
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('posts.*','users.username','users.images')
        ->get(); //postsテーブルからすべてのレコード情報をゲットする
        // ジョイン分の挿入
        return view("posts.index", ["list" => $list]);
    }
    public function follower()
    {
        $list = DB::table("posts")
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',Auth::id())
        ->orWhere('follows.follower',Auth::id())
        ->select('posts.*','users.username','users.images')
        ->get(); //postsテーブルからすべてのレコード情報をゲットする
        // ジョイン分の挿入
        return view("posts.index", ["list" => $list]);
    }

}