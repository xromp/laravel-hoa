<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use App\Collection_category;

class CollectionCategoryController extends Controller
{
    public function get() 
    {
 		$category = DB::table('collection_category')
 			-> select ('code', 'description', 'frequency', 'isfixamount', 'amount', 'datestarteffectivity', 'dateendeffectivity')
 			-> where('active',1)
 			-> get();

 		return response()-> json([
 			'status'=> 200,
 			'data'=> $category,
 			'message' => ''
 		]);
    }
}
