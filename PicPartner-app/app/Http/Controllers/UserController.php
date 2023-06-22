<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;

class UserController extends Controller
{
    public function index()
    {
        // すでにswipeしたuserを省いて、swipeしていないuserを1つ取得する

        // すでにswipeしたuser・idsを取得
        $swipedUserIds = Swipe::Where('from_user_id', \Auth::user()->id)->get()->pluck('to_user_id');

        // swipeしていないuserを1つ取得 User(モデル？データベースから取得？) WhereNotInメゾットを使用して$swipedUserIds以外のuseridを取得
        $user = User::where('id', '<>', \Auth::user()->id)->WhereNotIn('id', $swipedUserIds)->first();

        return view('pages.user.index', [
            'user' => $user
        ]);
    }
}
