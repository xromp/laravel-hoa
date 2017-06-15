<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\Person;
use App\Collection;
use App\Collection_line;
use App\Transaction;
use DB;
class PersonController extends Controller
{
    //
    public function index()
    {
    	return view('person.index');
    }

    public function store(Request $request)
    {
    	$person = new Person;

    	$this->validate($request, [
    		'lname'=>'required|max:100',
    		'fname'=>'required|max:100',
    		'mname'=>'required|max:100'
		]);

    	$person->lname = $request-> input('lname');
    	$person->fname = $request-> input('fname');
    	$person->mname = $request-> input('mname');
        $person->type = 'HOMEOWNER';
    	$person->datestarteffectivity = Carbon::now();
    	$person->dateendeffectivity = Carbon::now();
    	$person->createdby = 1;
        $person->save();
    	
    	return response()->json([
		    'status' => 200,
		    'data' => 'null',
		    'message' => 'Successfully saved.'
		]);
    }

    public function getPersonProfile(Request $request) 
    {
        $personid = $request-> input('personid');
        $type = $request-> input('type');
        $person_profile = DB::select('CALL sp_personprofile(?,?)',array($personid,$type));

        return response()->json([
            'status'=> 200,
            'data'=>$person_profile,
            'message'=>''
        ]);
    }

    public function getPersonCollection(Request $request) 
    {
        $formData = array(
            'personid'=> $request-> input('personid')
        );

        $totalCollection = 0;

        $collection = DB::table('person as p')
            ->select('t.transactionid','p.personid','c.orno','c.ordate','cc.description as category','cc.description as description','t.amount')
            ->leftjoin('collection as c', 'c.referenceid', '=', 'p.personid')
            ->leftjoin('collection_category as cc', 'cc.code', '=', 'c.category')
            ->leftjoin('transaction as t', 't.refid', '=', 'c.orno')
            ->where('t.trantype','COLLECTION')
            ->where('t.deleted',0);

        if ($formData['personid']) {
            $collection = $collection-> where('personid',$formData['personid']);
        }
        $collection = $collection->get();

        foreach ($collection as $key => $col) {
            $totalCollection += $col->amount;
        }

        return response()->json([
            'status'=> 200,
            'data'=>array(
                'collection'=> $collection,
                'total'=>$totalCollection
            ),
            'message'=>''
        ]);
    }
}
