<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function formatCheckboxValue($imagesImage)
    {
    	$imagesImage->is_active = ($imagesImage->is_active ==null) ? 0: 1;
    	$imagesImage->is_featured = ($imagesImage->is_featured == null) ? 0 : 1;
    }
}
