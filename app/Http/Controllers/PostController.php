<?php

namespace App\Http\Controllers;

use App\Post;
use App\Pokemon;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        
        $user=User::All();
        
        $pokemon= Pokemon::All();
        
        return view('post/post')->with(['posts' => $posts , 'user' => $user, 'pokemon' => $pokemon ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pokemon= Pokemon::All();
    
        return view('post/create')->with(['pokemon' => $pokemon ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   
        $input = $request->validated();
        $post = new Post($input);
        $post ->iduser = auth()->user()->id;
        $post -> idpokemon = $request-> get("postcardtags");
        try {
            $result=$post->save();
        } catch(\Exception $e) {
           /*return redirect(route('post.create'));*/
           var_dump($e);
           exit;
          
        }
    
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        $comment=Comment::All();
        
        $user=User::All();
        
        $pokemon= Pokemon::All();
        
        return view('post/show')-> with(['post'=>$post, 'comment' => $comment, 'user' => $user, 'pokemon'=> $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post/edit')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
         $input=$request->validated();
         try{
            $result=$post->update($input);
        }catch(\Exception $e){
            $error=['post'=>'error ocurred'];
            return redirect('post/'. $post->id . '/edit') ->withErrors($error) -> withInput();
        }
        return redirect(route('post.index'))->with(['result'=>$result,'op'=>'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         try{
             $post->delete();
             $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('post.index'))->with(['result'=>$result ,'op'=>'destroy']); 
    }
}
