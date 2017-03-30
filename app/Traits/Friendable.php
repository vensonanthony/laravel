<?php 
namespace App\Traits;
use App\Friendships;

trait Friendable
{
	public function test()
	{
		return 'hi';
	}

	public function addFriend($id)
	{

		$Friendship = Friendships::create([
			'user_id'=> $this->id,
			'friend_id'=> $id
			]);

		if($Friendship)
		{
			return redirect()->back();
		}
			return 'failed';
	}
}

 ?>
