<?php

namespace App\Http\Controllers;

use App\Models\ThanhToan;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentCheck(Request $request){
    //    return response()->json([
    //     'data' => $request->all(),
    //    ]);
        $des = $request->hashCode;
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
                    ->where('don_hangs.id', $request->id)->first();
                    if($checkPay){ 
                        return response()->json([
                            'status' => 1,
                            'message' => 'Thanh Toán Thành Công !'
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
                        }
                        $input = $value['description'];
                        if (preg_match('/CUSTOMER\s(.*?)\s  M/i', $input, $matches)) {
                            $result = $matches[1];
                            if($result == $request->hashCode)  {
                                return response()->json([
                                    'status' => 1,
                                    'message' => 'Thanh toán thành công'
                                ]);
                            } else {
                                return response()->json([
                                    'status' => 0,
                                    'message' => 'Thanh toán thất bại'
                                ]);
                            }
                        }
                    }
                    // return response()->json([
                    //     'status' => 1,
                    //     'data' => $data
                    // ]);
                }
        } catch(Exception $e){

        }
    }
}
