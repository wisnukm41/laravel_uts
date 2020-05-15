<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\News;
use Validator,File,Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $allNews = News::all();
        return view('admin',['allNews'=>$allNews, 'i'=> 0]);
    }

    public function addNews()
    {
        return view('addnews');
    }

    public function editNews($slug)
    {
        $news = News::where('slug',$slug)->first();

        if(isset($news)){
            return view('editnews',['news'=>$news]);
        } else {
            return Redirect::to("admin");
        }
    }

    public function postAddNews(Request $request)
    {
        $validated = $this->validate($request,[
            'topic' => 'required|min:10|max:80|unique:news',
            'image' => 'required|image|max:3082',
            'description' => 'required|min:30'
        ]);
        
        $slug = Str::slug($validated['topic'],'-');
        $image = $request->file('image');
        
        $image->move('assets/img/news', $image->getClientOriginalName());
        
        News::create([
            'topic' => $validated['topic'],
            'image' => $image->getClientOriginalName(),
            'description' => $validated['description'],
            'slug' => $slug,
        ]);

        return Redirect::to("admin")->with('status','News Added Successfully!');
    }

    public function postEditNews(Request $request)
    {
        $newNews = News::find($request->id);    

        if($request->topic === $newNews->topic){
            $arr = [
                'topic' => 'required|min:10|max:80',
                'image' => 'image|max:3082',
                'description' => 'required|min:30'
            ];
        } else {
           $arr = [
                'topic' => 'required|min:10|max:80|unique:news',
                'image' => 'image|max:3082',
                'description' => 'required|min:30'
           ];
        }
        
        $validated = $this->validate($request,$arr);

        $slug = Str::slug($validated['topic'],'-');

        $image = $request->image;
            
        if(isset($image)){
            $imageName = $image->getClientOriginalName();
            @unlink(public_path().'/assets/img/news/'.$newNews->image);
            $image->move('/assets/img/news', $imageName);
        } else {
            $imageName = $newNews->image;
        }
        
        $newNews->topic = $request->topic;
        $newNews->description = $request->description;
        $newNews->image = $imageName;
        $newNews->slug = $slug;
        
        $newNews->save();

        return Redirect::to("admin")->with('status','News Updated Successfully!');
    }
    
    public function deleteNews($slug)
    {
        $news = News::where('slug',$slug)->first();

        if(isset($news)){
        @unlink(public_path(). '/assets/img/news/'.$news->image);
        $news->topic = $news->topic.time();
        $news->slug = '-';
        $news->save();

        $news->delete();

        return redirect('/admin')->with('status','News Deleted Successfully!');
        }   else {
            return Redirect::to("admin");
        }
    }
}