<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $list = DB::table("posts")->get(); //postsテーブルからすべてのレコード情報をゲットする
        return view("posts.index", ["list" => $list]);
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost'); //登録処理だけを行うページ
        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'posts' => $post
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
                ['posts' => $up_post]
            );

        return redirect('/top');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
