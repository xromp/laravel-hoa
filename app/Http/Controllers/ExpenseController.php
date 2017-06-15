<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use App\Expense;
use App\Expense_line;


class ExpenseController extends Controller
{
    public function index()
    {
    	return view('expense.index');
    }
    public function get(Request $request)
    {
    	$formData = array(
    		'orno'=> $request-> input('orno')
    	);

        $expense = DB::table('expense')
            ->select ('expenseid','orno','ordate','expense_category.description as category','amount','posted','deleted','expense.created_at')
            -> leftjoin('expense_category','expense_category.code','=','expense.category')
            -> where('deleted',0);

        if ($formData['orno']) {
            $expense -> where('orno',$formData['orno']);            
        }
        $expense = $expense->get();

        return response()-> json([
            'status'=>200,
            'data'=>$expense,
            'message'=>''
        ]);
    }
}
