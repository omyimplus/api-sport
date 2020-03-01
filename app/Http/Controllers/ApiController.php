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
			'lotto1closeup'=>$lotto->lotto1,
			'lotto2'=>explode(' ',$lotto->lotto2),
			'lotto3'=>explode(' ',$lotto->lotto3),
			'lotto4'=>explode(' ',$lotto->lotto4),
			'lotto5'=>explode(' ',$lotto->lotto5),
			'lotto_front3'=>explode(' ',$lotto->lotto_front3),
			'lotto_last3'=>explode(' ',$lotto->lotto_last3),
			'lotto_last2'=>$lotto->lotto_last2,
			'lotto_at'=>$lotto_at,
			'reason'=>'none',
		]);
    }
}
