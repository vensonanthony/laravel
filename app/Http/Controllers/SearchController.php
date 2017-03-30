<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
    	$query = $request->input('query');

    	if (!$query)
    	{
    		return redirect()->back();
    	}

    	$users = User::where('name', 'LIKE', "%{$query}%")
    			->get();

    	return view('search.results', compact('users'));
    }
}
