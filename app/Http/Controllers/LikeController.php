<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likePost($id)
    {
    	$this->handleLike('App\Post', $id);

    	return redirect()->back();
    }

    public function handleLike($type, $id)
    {
    	
    	$existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::User()->id)->first();

    	if( is_null($existing_like) )
    	{
    		Like::create([
    			'user_id' 		=>Auth::User()->id,
    			'likeable_id'	=>$id,
                'likeable_type' =>$type
    			]);
    	}	
    		else {
    			if (is_null($existing_like->deleted_at)) 
    			{
    				$existing_like->delete();
    			}	else {
    				$existing_like->restore();
    			}
    		}
    }
    
}
