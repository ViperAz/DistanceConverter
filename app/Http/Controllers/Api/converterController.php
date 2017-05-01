<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class converterController extends Controller
{
    //

    public function convert ($num_1,$unit_1,$unit_2){
    	// 3 km -2 cm  -3 mm  1609.344 m mi(mile) 0.9144 m yard yd 0.3048m feet{ft}  0.0254m inche{in}

    	//Convert to metre first
    	$data = $num_1 ;
    	if (!is_null($num_1) && !is_null($unit_1) && !is_null($unit_2)){
    		$data = ($data*$this->RawUnit($unit_1)/$this->RawUnit($unit_2));
			return [
				'success' => true,
				'original_data' => $num_1 . " " .$unit_1,
				'converted_data'=> $data ." ".$unit_2
			];

    	}else{
    		return [
    			'success' => false,
    			'data' => 'Invalid Input'
    		];
    	}

    }


    public function RawUnit($unit){

        if ($unit == 'km'){
            return 1000;
        }
        if ($unit == 'cm'){
            return 0.01 ;
        }
        if ($unit == 'mm'){
            return 0.001 ;
        }
        if ($unit == 'mi'){
            return 1609.344;
        }
        if ($unit == 'yd' ){
            return 0.9144 ;
        }
        if ($unit == 'ft'){
            return 0.3048 ;
        }
        if ($unit == 'in'){
            return 0.0254 ;
        }
        if ($unit == 'm'){
            return 1 ;
        }

    }

}


