<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::where('approved', 1)->orderby('created_at', 'desc')->get();
        return view('blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=> 'required',
            'text'=>'required',
            'image'=>'required|image'
        ]);       

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->text = $request->text;
        $blog->authorid = Auth::id();

        $imageFile = $request->file('image');
        $imagePath = '/images/'.$imageFile->getClientOriginalName();
        $imageFile->move(public_path().$imagePath, $imageFile->getClientOriginalName());
        
        $blog->image_url = $imagePath;
		
        
        if ($blog->save()){
               return back()->with('success', 'Text added successfully');
        } else {
            return back()->with('error', 'Some error occured.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::where('id',$id)->firstOrFail();
        return view('blog.show', ['blog'=> $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        return view('blog.edit', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->text = $request->text;

        if($request->has('image')){
            $imageFile = $request->file('image');
            $imagePath = '/images/'.$imageFile->getClientOriginalName();
            $imageFile->move(public_path().$imagePath, $imageFile->getClientOriginalName());
            
            $blog->image_url = $imagePath;
        }

        if ($blog->save()){
               return back()->with('success', 'Text updated successfully');
        } else {
            return back()->with('error', 'Some error occured.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
