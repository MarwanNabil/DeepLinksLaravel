<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Post;
use App\Models\PostHashtag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use PostController;
use App\Http\Controllers\PostContoller;
use Exception;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function view()
    {
        $hashtags = Hashtag::all();
        return view('users.allhashtags')->with('hashtags' , $hashtags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.hashtag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'color' => 'required'
        ]);

        Hashtag::create([
            'name' => $request->name,
            'description' => $request->description,
            'color' => $request->color
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {

        try{
            $hashtag = DB::table('hashtags')->where('name', $name)->first();
            $postsID = (DB::table('post_hashtag')
            ->select('post_id')
            ->where('hashtag_id' , $hashtag->id))
            ->Join('posts', 'post_hashtag.post_id', '=', 'post_id')
            ->distinct()
            ->get();

            $Posts = array();

            foreach($postsID as $postID){
                $post = PostContoller::getSpecificPost( $postID->post_id );
                if(!empty($post))
                    array_push($Posts , $post);
            }

            return view("users.hashtag")->with('posts' , $Posts);

        } catch(Exception $e){
            return view("users.hashtag")->with('error' , $e->getMessage());
        }
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
