<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use GuzzleHttp\Psr7\Response;

class postcontroller extends Controller 
{
    //post is my models name ... you can set your models name instead of that



    //creat a post method
    public function create(Request $request){
        
        $input = $request->only([
            'title',
            'cover',
            'category',
            'auther',
            'content',
            'keywords',
            'caption',
            'isCommentOn'
        ]);
        try {
            $post = Post::create($input);
            return Response()->json($post, 200);
        } catch (Exception $error) {
            return Response()->json($error, 400);
        }
    }
    //delete post method
    public function delete($id){
        try {
            $post_to_delete = Post::where('id' , $id)->delete();
            return Response()->json(( $post_to_delete) ?'post with id : ' . $id  . 'deleted susseccfully ...' : ' post was not delete ... an error occured !!!' , 202 );
        } catch (Exception $error) {
            return Response()->json($error , 400);
        }
    }
    //update method
    public function update(Request $request) {
        $input = $request->input();
        try {
            $post = post::where(['id'=>$request['id']])->update($input);
            return Response()->json($post , 202);
        } catch (Exception $error) {
            return Response()->json($error, 400);
        }
    }
    //get all posts by filter or without filter ...
    public function allPosts( ){
        $posts = post::all();
        try{
            return Response()->json($posts , 200);
        }catch(Exception $error){
            return Response()->json($error , 200);
        }

    
    }

    //search in posts
    public function search (Request $request){
        $inputs = $request->only([
            'id',
            'category',
            'auther'
        ]);
        try{
            if(count($inputs)>0){
                $posts= post::where($inputs)->get();
                return Response()->json($posts , 200);
            }else{
                return Response()->json(['massage' =>'no post found ...'] , 202);
            }
        }catch(Exception $error){
            return Response()->json($error , 400);
        }
    }
}
