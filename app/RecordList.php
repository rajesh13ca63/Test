<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use App\Requests;

class RecordList extends Model
{
	protected $table = "posts";
    /*This Method is used for show all records of student in bootgrid */
    public function ShowAllCandidateRecords($request, $order_by_column, $order_by_value)
    {
        //$studenttotal = Student::wStudentTotal_cn;
        //dd($studenttotal);exit;        
                        
        $current = $request['current'];
        $row = $request['rowCount'];
       
        $i = 0;
        $results = Student::orderBy($order_by_column, $order_by_value)
                            //->skip($current)->limit($row)->get();
                           ->get();
       
        foreach($results as $result ) {
        $response[] = $result['attributes'];
        $i++;
        }
       
        $data = array(
            'current' => $current,
            'rowCount' => $i,
            'rows' => $response,
            'total'=> count($results)
        );
        
        echo json_encode($data); 
       
    }
}
