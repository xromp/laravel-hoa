<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use App\Collection;
use App\Collection_line;

class CollectionController extends Controller
{
    public function index()
    {
    	return view('collection.index')	;
    }

    public function create(Request $request)
    {
        $message = '';

    	$validator = Validator::make($request->all(),[
			'amount'=> 'required',
    		'category'=> 'required',
    		'entityvalue1'=> 'required',
    		'ordate'=> 'required',
    		'orno'=> 'required',
    		'orno'=> 'required',
    		'refid'=> 'required',
    		'type'=> 'required'    	
		]);

    	if ($validator-> fails()) {
	        return response()->json([
                'status'=> 403,
                'data'=>'',
                'message'=>'Unable to save.'
            ]);

    	} else {
            $collection = new Collection;
        	$collection_line = new Collection_line;

            $data = array();
            $data['orno'] 			= $request-> input('orno');
            $data['ordate'] 		= $request-> input('ordate');
            $data['type']			= $request-> input('type');
            $data['referenceid'] 	= $request-> input('refid');
            $data['category'] 		= $request-> input('category');
            $data['amount_paid'] 	= $request-> input('amount');
            $data['entityvalues'] 	= $request-> input('entityvalues');
            $data['remarks']        = $request-> input('remarks');

            $isOrnoExist = $collection
                        -> where('orno','=',$data['orno'])
                        -> where('deleted',0)
                        -> first();

            if ($isOrnoExist) {
                return response()->json([
                    'status'=> 403,
                    'data'=>'',
                    'message'=>"OR no. {$data['orno']} is already exists."
                ]);         
            } else {
            	// saving collections
            	DB::transaction(function($data) use($data){
            		// dd($data['orno']);
            		$collection = new Collection;
	            	
	            	$collection->orno 			= $data['orno'];
	            	$collection->ordate 		= $data['ordate'];
	            	$collection->type 			= $data['type'];
	            	$collection->referenceid 	= $data['referenceid'];
	            	$collection->category 		= $data['category'];
	            	$collection->amount_paid 	= $data['amount_paid'];
                    $collection->remarks    = $data['remarks'];
        		    
	            	$collection->save();

	            	if($collection->id)
				    {
		            	foreach ($data['entityvalues'] as $key => $entityvalue) {
		            		$collection_line = new Collection_line;

			            	$collection_line->collectionid = $collection->id;
			            	$collection_line->entityvalue1 = $entityvalue['entityvalue1'];
			            	$collection_line->entityvalue2 = $entityvalue['entityvalue2'];
			            	$collection_line->entityvalue3 = $entityvalue['entityvalue3'];
		            		$collection_line->save();

		            		if (!$collection_line->id) {
		            			throw new \Exception('Collection line not created.');
		            		}
	            		} 
	            	}
	            	else 
	            	{
				        throw new \Exception('Collection not created.');
	            	}
            	});

            }

            return response()->json([
                'status'=> 200,
                'data'=>'',
                'message'=>'Successfully saved.'
            ]);    		
    	}    
    }
}
