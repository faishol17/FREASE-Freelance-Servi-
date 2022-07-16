<?php

namespace App\Http\Controllers\Landing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB; 
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\Transaction;
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\Sanitizer;
use Carbon\Carbon;


class MidtransController extends Controller
{
   
    
    public function prosesPayment(Request $request)
    {
        Config::$serverKey          = 'SB-Mid-server-4Fy5yjowRrTdTK15ghhd2r6A';
        Config::$clientKey          = 'SB-Mid-client-AGm-heRvURMrM0kK'; 
        Config::$isSanitized        = true; 
        Config::$is3ds              = true; 
        Config::$appendNotifUrl     = url('payment_midtrans');
        Config::$overrideNotifUrl   = url('payment_midtrans');
        $torder                     =DB::table('order')->where('id',$request->input('id_order'))->first();
        $tb_frilancer               =DB::table('users')->where('id',@$torder->freelancer_id)->first();
        $tb_buyer                   =DB::table('users')
                ->select('users.*','detail_user.*')
                ->LeftJoin('detail_user','users.id','=','detail_user.users_id')
                ->where('users.id',@$torder->buyer_id)
                ->first();
        $tb_service                  =DB::table('service')->where('id',@$torder->service_id)->first();
       // dd($torder);
        $biayatrx               =4000;
        $amount                 =@$tb_service->price?@$tb_service->price:0;
        $gross_amount           =$amount+$biayatrx;
        $transaction_details    = array(
        'order_id'          => Carbon::now()->format('ymdhis').'-'.@$torder->id,
        'gross_amount'      => $gross_amount, // no decimal allowed for creditcard
        );
        $item1_details = array(
        'id'        =>  'a01',
        'price'     => $amount,
        'quantity'  => 1,
        'name'      => @$tb_service->title
        );

$item2_details = array(
        'id'        =>  'a02',
        'price'     => $biayatrx,
        'quantity'  => 1,
        'name'      => 'Biaya Transaksi'
        );

    $item_details           = array($item1_details,$item2_details);
    $name                   =explode(' ', @$tb_buyer->name);
    $billing_address    = array(
                    'first_name'    =>  @$name[0],
                    'last_name'     =>  @$name[1],
                    'address'       =>  @$tb_buyer->email,
                    'city'          =>  'indramayu',
                    'postal_code'   =>  '45211',
                    'phone'         =>  @$tb_buyer->contact_number,
                    'country_code'  => 'IDN'
                    );

      $shipping_address = array(
        'first_name'    => @$name[0],
        'last_name'     => @$name[1],
        'address'       => @$tb_buyer->email,
        'city'          => 'indramayu',
        'postal_code'   => '45211',
        'phone'         => @$tb_buyer->contact_number,
        'country_code'  => 'IDN'
        );

        $customer_details = array(
        'first_name'        => @$name[0],
        'last_name'         => @$name[1],
        'email'             => @$tb_buyer->email,
        'phone'             => @$tb_buyer->contact_number,
        'billing_address'   => $billing_address,
        'shipping_address'  => $shipping_address
        );
        $enable_payments=array();
        //$enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');
            // Fill transaction details
        $transaction = array(
            // 'enabled_payments'          => $enable_payments,
            'transaction_details'       => $transaction_details,
            'customer_details'          => $customer_details,
            'item_details'              => $item_details,
            );
        $resp='';
        $error=true;
        try {
            // Get Snap Payment Page URL
            $resp= Snap::getSnapToken($transaction); 
            $error=false;
        
        }
        catch (\Exception $e) {
           $resp        = $e->getMessage();
            $error=true;
        }
        print json_encode(array('key'=>$resp,'error'=>$error));

    }

    public function payment_midtrans(Request $request)
    {
        $json   = file_get_contents('php://input');
        $data    = json_decode($json,true); 
        $id_order=@explode('-', @$data['order_id'])[1];
      
        $get_order=DB::table('order')->where('id',$id_order)->first();
        $get_trx=DB::table('tb_transaksi')->where('id_order',$id_order)->first();


        if($get_trx)
        {
                DB::table('tb_transaksi')->where('id_order',$id_order)->update(
                [
                    'id_buyer'      =>@$get_order->buyer_id,
                    'id_order'      =>@$id_order,
                    'status'        =>@$data['transaction_status'],
                    'detail_report' =>serialize($data), 
                    'updated_at'    =>Carbon::now() 
                ]); 
        }else
        {

            DB::table('tb_transaksi')->insert(
                [
                    'id_buyer'=>@$get_order->buyer_id,
                    'id_order'=>@$id_order,
                    'status'   =>@$data['transaction_status'],
                    'detail_report'=>serialize($data),
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now() 
                ]);

        }
             print json_encode(array('error'=>false));


          
    }


    
}
