<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use App\Expense_category;
class ExpenseCategoryController extends Controller
{
    public function get()
    {
 		$category = DB::table('expense_category')
 			-> select ('code', 'description')
 			-> where('active',1)
 			-> get();

 		return response()-> json([
 			'status'=> 200,
 			'data'=> $category,
 			'message' => ''
 		]);
    }
}
