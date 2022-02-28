<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostHashtag;
use Exception;
use Illuminate\Http\Request;

class PostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->reverse();
        return view('home')->with('posts' , $posts);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'title' => 'required',
                'content' => 'required'
            ]);

            $picName = '';
            if ($request->has('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move('uploads\\postpicture\\', $imageName);

                $picName = 'uploads/postpicture/' . $imageName;
            }

        } catch(Exception $e){
            return redirect()->back()->with('error' , 'something went wrong!');
        } finally {
            $post = Post::create([
                'user_id'=> Auth::id(),
                'title' => $request->title,
                'content' => $request->content,
                'picture' => $picName
            ]);

            foreach($request->hashtags as $hashtag){
                PostHashtag::create([
                    'post_id' => $post->id,
                    'hashtag_id' => $hashtag
                ]);
            }
        }

        return redirect()->back()->with('success' , 'posted successfully!');
    }

    public function show($id)
    {
        $post = DB::table('posts')->where('id', '=', $id)->get()->first();

        return view('post')->with('post' , $post);
    }

    public function getSpecificPost($id){
        $post = Post::where('id' , $id)->first();
        if(!empty($post))
            return $post;
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id' , $id)->first();
        return view('users.editpost')->with('post' , $post);
    }

    public function myPosts()
    {
        //$posts = DB::table('posts')->where('user_id' , Auth::id())->get();
        $posts = Post::where('user_id' , Auth::id())->get()->reverse();
        return view('users.profile')->with('posts' , $posts);
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
            'title'     => 'required',
            'content' => 'required'
        ]);
        $post = Post::where('id' , $id)->first();

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move('uploads\\postpicture\\', $imageName);

            $post->picture = 'uploads/postpicture/' . $imageName;
        }

        $post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostHashtag::where('post_id' , $id)->delete();
        Post::where('id' , $id)->delete();
        return redirect()->back();
    }
}
