<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;

use App\Collection;

class CollectionController extends Controller
{
    public function index()
    {
    	return view('collection.index')	;
    }

    public function create(Request $request)
    {
    	$collection = new Collection;
    	
    	$this-> validate($request, [
    		'amount'=> 'required',
    		'category'=> 'required',
    		'entityvalue'=> 'required',
    		'ordate'=> 'required',
    		'orno'=> 'required',
    		'orno'=> 'required',
    		'refid'=> 'required',
    		'type'=> 'required'
    	]);

    	dd($collection->all());
    }
}
