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
                if(isset ($data['transactionHistoryList'])){
                    foreach($data['transactionHistoryList'] as $key => $value){
                        // $check = ThanhToan::where('refNo', $value['refNo'])->first();

                            $payment = ThanhToan::create([
                                'refNo' => $value['refNo'],
                                'creditAmount' => $value['creditAmount'],
                                'description' => $value['description'],
                                'id_don_hang' => $request->id,
                            ]);
                            dd($payment);

                        $pattern = '/CUSTOMER\s(.*?)\sMa giao dich/i';
                        $input = $value['description'];
                        if (preg_match($pattern, $input, $matches)) {
                            $customerInfo = $matches[1];
                            if($customerInfo == $des) {
                            }
                        }
                    }
                }
        } catch(Exception $e){

        }
    }
}
