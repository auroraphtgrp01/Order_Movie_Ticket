<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\ThanhToan;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentCheck(Request $request){
        $des = $request->hashCode;
        $totalOrder = $request->tong_tien;
        // return response()->json([
        //  'data' => $totalOrder,
        // ]);
        $client = new Client();
        $payload = [
            'USERNAME' => 'HOANG09082003',
            'PASSWORD' => 'Matkhautao12',
            'DAY_BEGIN' => Carbon::now()->format('d/m/Y'),
            'DAY_END' => Carbon::now()->format('d/m/Y'),
            'NUMBER_MB' => '5040109082003',
        ];
        try{
            $response = $client->post('http://osm.dzfullstack.com:3000/mb', [
                'json' => $payload
            ]);
            $arr = [];
            $checkPay = false;
            $data = json_decode($response->getBody(), true);
           
            $checkPay = ThanhToan::join('don_hangs', 'thanh_toans.id_don_hang', '=', 'don_hangs.id')
                    ->where('don_hangs.id', $request->id)
                    ->where('don_hangs.is_thanh_toan', 1)
                    ->first();
                    if($checkPay){ 
                        return response()->json([
                            'status' => 1,
                            'message' => 'ĐƠN HÀNG ĐÃ ĐƯỢC Thanh Toán Thành Công !'
                        ]);
                    } 
                if(isset ($data['transactionHistoryList'])){
                    foreach($data['transactionHistoryList'] as $key => $value){
                        $check = ThanhToan::where('refNo', $value['refNo'])->first();
                        if(!$check){
                            $payment = ThanhToan::create([
                                'refNo' => $value['refNo'],
                                'creditAmount' => $value['creditAmount'],
                                'description' => $value['description'],
                                'id_don_hang' => $request->id,
                            ]);
                            $creditAmout = $value['creditAmount'];
                            $input = $value['description'];
                            if (preg_match('/CUSTOMER\s(.*?)\s  M/i', $input, $matches)) {
                                $result = $matches[1];
                                if($result == $request->hashCode && $creditAmout >= $totalOrder)  {
                                    $donHang = DonHang::find($request->id);
                                    $donHang->is_thanh_toan=1;
                                    $donHang->save();
                                    return response()->json([
                                        'status' => 1,
                                        'message' => 'Thanh toán thành công',
                                        'amount_pay' =>$creditAmout,
                                        'total_order' => $totalOrder                
                                    ]);
                                } else if($creditAmout < $totalOrder) {
                                    return response()->json([
                                        'status' => -1,
                                        'message' => 'Thanh toán thất bại - Số tiền thanh toán không đủ',
                                        'amount_pay' => $creditAmout,
                                        'total_order' => $totalOrder
                                    ]);
                                } else {
                                    return response()->json([
                                        'status' => 0,
                                        'message' => 'Thanh toán thất bại',
                                        'amount_pay' => $creditAmout,
                                        'total_order' => $totalOrder
                                    ]);
                                }
                            }
                        } else {
                            $input = $value['description'];
                            if (preg_match('/CUSTOMER\s(.*?)\s[MT ]/i', $input, $matches)) {
                                $result = $matches[1];
                                if($result == $request->hashCode)   {
                                $creditAmout = $value['creditAmount'];
                                    if($creditAmout >= $totalOrder)
                                        {
                                        $donHang = DonHang::find($request->id);
                                        $donHang->is_thanh_toan=1;
                                        $donHang->save();
                                        return response()->json([
                                            'status' => 1,
                                            'message' => 'Thanh toán thành công',
                                            'amount_pay' =>$creditAmout,
                                            'total_order' => $totalOrder                
                                        ]);
                                    } else if($creditAmout < $totalOrder) {
                                        return response()->json([
                                            'status' => -1,
                                            'message' => 'Thanh toán thất bại - Số tiền thanh toán không đủ',
                                            'amount_pay' => $creditAmout,
                                            'total_order' => $totalOrder,
                                            'data' => $value['refNo'],
                                            'text' => $result,
                                            'text1' => $request->hashCode
                                        ]);
                                    }
                                }  else {
                                    return response()->json([
                                        'status' => 0,
                                        'message' => 'Thanh toán thất bại',
                                        'result' => $result,
                                        'x' => $request->hashCode
                                    ]);
                                }
                            }
                        }
                       
                    }
                  
                }
        } catch(Exception $e){

        }
    }
    public function qrPay(Request $request) {
        dd($request->all());    
    }
}
