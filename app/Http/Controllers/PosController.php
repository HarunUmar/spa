<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class PosController extends Controller
{
    //
    public function search(Request $request){
    	$query = $request['query'];
    	
    		$result = Karyawan::where('rfid',$query)->get();
    		return response()->json($result);
    	
    	
    }
}
