<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;

class Newscontroller extends Controller
{
    private $columns = ['newstitle', 'author','content','published'];
    /**
     * Display a listing of the resource.
     */
   /* public function news(){
        return view ('news');
    }
  */
    public function index()
    {
        $news=News::get();
        return view ('news',compact("news"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $news = new News;
        $news->newstitle = $request->newstitle;
        $news->author = $request->author;
        $news->content= $request->content;
        if(isset( $request->published)){
             $news->published=true;
        }else{
             $news->published=false;
        }
        $news->save();
        return 'News Added Successfully';

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $news = news::findOrFail($id); 
       return view ('shownews',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $news = news::findOrFail($id); 
       return view ('eidtnews',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->only($this->columns);
        $data['published']=isset($data['published'])? true:false;
        news::where('id', $id)->update($data);
          return'yes';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
     news::where('id', $id)->delete();
     return redirect('newslist');

    }
        public function forcedeleted(string $id):RedirectResponse
    {
    News::where('id', $id)->forceDelete(); // to permanent delete
     return redirect('newslist');

    }
    public function trashed()
{
$news = News::onlyTrashed()->get();
return view('trashed'
, compact('news'));
}
public function restore(string $id):RedirectResponse
{
News::where('id', $id)->restore();
return redirect('newslist');
}

}
