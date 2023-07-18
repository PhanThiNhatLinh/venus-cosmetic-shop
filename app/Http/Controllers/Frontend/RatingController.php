<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class RatingController extends Controller
{
    public function createRating(Request $request)
    {
        $ratingModel = new Rating();
        $params = $request->all();
        $params['user_id'] = Auth::user()->id;
        $ratingModel->insertItem($params,['task'=>'add_new_rating']);
        return redirect()->back();
    }
    
}
