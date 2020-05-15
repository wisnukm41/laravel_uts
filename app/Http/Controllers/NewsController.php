<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller
{
    public function dashboard()
    {
        $allNews = News::paginate(6);
        $carousels = News::orderBy('id','desc')->take(5)->get();

        $data = [
            'allNews' => $allNews,
            'carousels' => $carousels
        ];
        
        return view('dashboard',$data);
    }

    public function news($slug)
    {
        $news = News::where('slug',$slug)->first();
        $allNews = News::where('slug','!=',$slug)->orderBy('id','desc')->take(4)->get();

        $data = [
            'news' => $news,
            'allNews' => $allNews
        ];

        if(isset($news)){
            return view('news',$data);
        } else {
            return view('news_notfound',[ 'allNews' => $allNews ]);
        }
    }

    public function search(Request $request)
    {   
        $string = "%".$request->value."%";

        $result = News::where('topic','LIKE',$string)->orWhere('description','LIKE',$string)->paginate(6);

        return view('search', ['results' => $result,'value'=>$request->value]);
    }
}
