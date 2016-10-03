<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\User;
use App\User;
use DB;
use App\Http\Requests;

class ListController extends Controller
{
    /*This Method is used to Show all Candidate records and search records */
     public function AllCandidateInfo(Request $request){
        $order_by_column = 'First_name';
        $order_by_value = 'asc';
        
        if (isset($request['sort']) && ! empty($request['sort']) ){
            $order_by="";
            foreach($request['sort'] as $key=> $value)
            $order_by_column = $key;
            $order_by_value = $value; 
        }
     
        if (isset($request['searchPhrase']) && ! empty($request['searchPhrase'])) {
            
            $candidate = new User();
            $candidate->SearchAllCandidateRecords($request, $order_by_column, $order_by_value);
        
        } else {
            $candidate = new User();
            $candidate->ShowAllCandidateRecords($request, $order_by_column, $order_by_value);
        }

    }
}
