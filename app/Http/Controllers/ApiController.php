<?php

namespace App\Http\Controllers;
use App\Lotto;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function lotto()
    {
        $lotto=Lotto::orderBy('lotto_at','desc')->first();
		$lotto_at=explode('-',$lotto->lotto_at);
		$month = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$at =(int) $lotto_at[1];
		$lotto_at=$lotto_at[0].' '.$month[$at].' '.ceil($lotto_at[2]+543);
		return response()->json([
            'lotto'=>$lotto,
            'lotto_at'=>$lotto_at
		]);
    }
}
