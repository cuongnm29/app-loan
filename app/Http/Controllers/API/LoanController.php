<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Loans;
use Illuminate\Http\Request;
use Validator;
class LoanController extends Controller
{
    //get all loan by userid
    public function show(){
        $loan=Loans::where('userid',auth()->user()->id)->get();
          return response()
        ->json(['data' => $loan]);
    }
    //create loan
    public function loan(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'amount' => 'required',
            'loan_term' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $loan = Loans::create([
            'userid' =>  auth()->user()->id,
            'amount' => $request->amount,
            'loan_term' => $request->loan_term,
            'status' => 0// 
         ]);
         return response()
         ->json(['data' => $loan,'message'=>'create loan success']);
    }
    //appr
    public function approved(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $loan = Loans::find($request->id);
        $loan->status =1;
        $loan->save();
        return response()
         ->json(['message'=>'Approved loan success']);
    }
    //pay by week
    public function pay(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pay' => 'required',
            'id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $loan = Loans::find($request->id);
        $status=$loan->status;
        if($status==1){
         $loan->pay+=$request->pay;  
         $loan->remain_amount=$loan->amount-$loan->pay;
         $loan->pay_count +=1; 
         $loan->save(); 
        return response()
         ->json(['message'=>'Pay Loan success','remain'=>$loan->remain_amount]);
        }
        return response()
         ->json(['message'=>' Loan unapproved']);
    }
}
