<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use App\Friendships;
use App\Notification;
use App\Post;

class ProfileController extends Controller
{
    public function index($id)
    {
        $posts = Post::latest()->Paginate(10);

        $user = User::where('name', $id)->first();
        // dd($user);
        // $users = User::all();
        return view('partials/profiles', compact('user', 'posts'));
    }

    public function getProfile($name)
    {
    	$user = User::where('name', $name)->first();

    	return view('partials/profiles', compact('user'));
    }

    public function findFriends()
    {
    	$uid = Auth::user()->id;
		$allUsers = DB::table('users')->where('id', '!=', $uid)->get();

		return view('profile.findFriends', compact('allUsers'));
    }

    public function sendRequest($id)
    {
    	Auth::user()->addFriend($id);
    	
    	return back();
    }

    public function requests()
    {
    	$uid = Auth::user()->id;
    	// dd($uid);
    	$FriendRequests = DB::table('friendships')
    		->rightJoin('users', 'users.id', '=', 'user_id')
    	->where('accepted', 0)
    		->where('friendships.friend_id','=', $uid)
    		->get();

    	// dd($FriendRequests);

    	return view('profile.requests', compact('FriendRequests'));
    	
    }

    public function accept($id, $name)
    {
    	// dd($uid);
    	$checkRequest = Friendships::where('user_id', $id)
    					->where('friend_id',Auth::user()->id)
    					->first();

    	if ($checkRequest) 
    	{
    		// echo "yes, update here";
    		$updateFriendship = DB::table('friendships')
    			->where('friend_id', Auth::user()->id)
    			->where('user_id', $id)
    			->update(['accepted'=> 1]);

    		$notifications = new Notification;
    		$notifications->note ='accepted your friend request';
			$notifications->accept_id =$id;
			$notifications->user_logged =Auth::user()->id;
			$notifications->accepted ='1';
			$notifications->save();   		

    		if ($updateFriendship) 
    		{
    			return back()->with('msg', 'You are now Friend with '. $name);
    		}

    	} else {
    			return back()->with('msg', 'You are not Friend with '. $name);
    		}

    }

    public function friends()
    {
    	$friends1 = DB::table('friendships')
    			->leftJoin('users','users.id', 'friendships.friend_id')
    			->where('accepted', 1)
    			->where('user_id', Auth::user()->id)
    			->get();
    	
    	$friends2 = DB::table('friendships')
    			->leftJoin('users','users.id', 'friendships.user_id')
    			->where('accepted', 1)
    			->where('friend_id', Auth::user()->id)
    			->get();

    	$friends = array_merge($friends1->toArray(),$friends2->toArray());
    	
    	return view('profile.friends', compact('friends'));
    }

    public function requestRemove($id)
    {
        	DB::table('friendships')
        		->where('friend_id', $id)
        		->where('user_id', Auth::user()->id)
        		->delete();

            DB::table('notifications')
                ->where('user_logged', $id)
                ->where('accept_id', Auth::user()->id)
                ->delete();
    	
    	return back()->with('msg', 'Friend has been deleted');
    }

    public function requestRemoveMe($id)
    {
            DB::table('friendships')
                ->where('friend_id', Auth::user()->id)
                ->where('user_id', $id)
                ->delete();

             DB::table('notifications')
                ->where('user_logged', Auth::user()->id)
                ->where('accept_id', $id)
                ->delete();

        return back()->with('msg', 'Friend has been Fired');
    }

    public function requestReject($id)
    {
    	DB::table('friendships')
    		->where('user_id', $id)
    		->where('friend_id', Auth::user()->id)
    		->delete();
    	
    	return back()->with('msg', 'Request has been deleted');
    }

    public function notifications($id)
    {
    	// dd($id);
    	$notes = DB::table('notifications')
                ->leftJoin('users', 'users.id', 'notifications.user_logged')
                ->where('accept_id', Auth::user()->id)
                ->orderBy('notifications.created_at', 'desc')
                ->get();

        $updateNotes = DB::table('notifications')
        		->where('user_logged', $id)
    			->where('accept_id',Auth::user()->id)
    			->update(['accepted'=> 0]);
       
       return view('profile.notifications', compact('notes'));
    }


}
