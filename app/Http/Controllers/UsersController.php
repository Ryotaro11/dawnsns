<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; //add
use Illuminate\Http\Request;
use App\Providers\User; //add
use DB;
use Auth;

class UsersController extends Controller
{
    //add
    public function profile(Request $request)
    {
        $userlist = Auth::user();
        if($request->isMethod('post')){
            //
            $up_username = $request->input('username');
            $file = $request->file('newimage');
            $password = $request->input('newpassword');
            $bio = $request->input('bionary');

            if (!empty($file) && !empty($password)) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('images', $fileName, ['disk' => 'tokai']);
            //↑config/filesystemにtokai定義
            DB::table('users')
                ->where('id', Auth::id())
                ->update(
                    ['username' => $up_username,
                     'mail' => $request->input('mail'),
                     'images' => $fileName,
                     'password' => $password,
                     'bio' => $bio,
                     //storeasでiconに画像の格納し
                     //ファイル名を取得する$fileName = $file->getClientOriginalName();
                    ]
                    //更新しましたのモーダル
                );

            }elseif(!empty($password) && empty($file)){
                DB::table('users')
                ->where('id', Auth::id())
                ->update(
                    ['username' => $up_username,
                    'mail' => $request->input('mail'),
                    'password' => $password,
                    'bio' => $bio,
                    ]
                    );
                }elseif(empty($password) && !empty($file)){
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('images', $fileName, ['disk' => 'tokai']);
                    DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        ['username' => $up_username,
                         'mail' => $request->input('mail'),
                         'images' => $fileName,
                         'bio' => $bio,
                        ]
                    );
                }else{
                    DB::table('users')
                    ->where('id', Auth::id())
                    ->update(
                        ['username' => $up_username,
                         'mail' => $request->input('mail'),
                         'bio' => $bio,

                         ]
                    );
                }
                return redirect("/profile");
            }
            return view('users.profile', ["userlist" => $userlist]);
        }

public function search(Request $request){
    $userlist = \DB::table('users')
    ->get();
    $follow_btn = \DB::table('follows')
    ->where('follower',Auth::id() )
    ->get()
    ->toArray();


        if($request->isMethod('post'))
        {
            $keyword = $request->input('search');
            $userlist = \DB::table('users')
            ->where('username', 'like','%'.$keyword.'%')
            ->get();
            return view('users.search',["userlist" => $userlist,'keyword'=>$keyword,"following"=>$follow_btn]);
        }
        return view('users.search',["userlist" => $userlist,"following"=>$follow_btn]);
    }
// public function follow(Request $request){
//             $follower = auth()->user();
// $is_following=$follower ->isFollowing($user->id);
// }

    public function yourprofile($user)
    {
        $yourname=\DB::table('users')
        ->leftjoin('posts', 'posts.user_id', '=', 'users.id')
        ->leftjoin('follows', 'posts.user_id', '=', 'follows.follow')
        ->where('users.id',$user)
        ->select('users.*')
        ->first();
        $yourpost= \DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->where('users.id',$user)
        ->get();

        $follow_btn = \DB::table('follows')
        ->where('follower',Auth::id() )
        ->get()
        ->toArray();
            // first(); 特定のレコードを持ってきて、getだと配列として抽出する
            return view('users.yourprofile', ["yourname" => $yourname, "yourpost" => $yourpost, "follow_btn"=>$follow_btn]);
        }



}