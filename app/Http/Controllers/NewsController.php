<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        //News::all()はEloquentを使った、すべてのnewsテーブルを取得するというメソッド。sortByDesc()はカッコの中の値（キー）で並び替えをするためのメソッド
        //sortBy(‘xxx’)：xxxで昇順に並べ換える。sortByDesc(‘xxx’)：xxxで降順に並べ換える。
        $posts = News::all()->sortByDesc('updated_at');//News::all()->sortByDesc('updated_at')は、「投稿日時順に新しい方から並べる」という並べ換えをしていることを意味
        
        if (count($posts) > 0)  {
            $headline = $posts->shift();//最新の記事を変数$headlineに代入し、$postsは代入された最新の記事以外の記事が格納されていることになる。
        } else {
            $headline = null;
        }
        
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index',['headline' => $headline, 'posts' => $posts]);
        }
    }
