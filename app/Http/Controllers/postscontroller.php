<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\post;
//use DB;

class postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index()
    {
        //$posts=DB::select('SELECT * FROM posts'); $posts=Post::all();
        //$posts=post::where('title','post one')->get();
        //$posts=post::orderBy('title',$var)->get(); var='desc'||var='asc'
        //$posts=post::orderBy('title',$var)->take($n)->get(); /*var='desc'||var='asc' & n=1||2||3||....*/
        //$posts=post::orderBy('created_at','desc')->paginate(1);
        $posts=Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);
        if($request->hasFile('cover_image')){
            //get file name
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        //create post
        $post =new post ;
        $post->title =$request ->input('title');
        $post->body =$request ->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','post created successfully') ;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);

        //check user

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized');
        }

        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);

        if($request->hasFile('cover_image')){
            //get file name
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();

            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }

        //create post
        $post =post::find($id) ;
        $post->title =$request ->input('title');
        $post->body =$request ->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image=$fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','post updated successfully') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =post::find($id) ;

        //check user

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Unauthorized');
        }
        if($post->cover_image!='noimage.jpg'){

            storage::delete('public/cover_image/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/posts')->with('success','post deleted successfully') ;

    }
}
