<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
 

class Admincontroller extends Controller
{
    
    public function index(Request $req)
    {
    	$dt=DB::table('tb_transaksi');
    	$dt->select(
    		'tb_transaksi.*',
    		'buyer.name as nama_pembayar',
    		'freelancer.name as nama_frelance',
    		'service.title',
    		'order_status.name as status');
    	$dt->leftJoin('order','order.id','=','tb_transaksi.id_order');
    	$dt->leftJoin('users as buyer','buyer.id','=','order.buyer_id');
    	$dt->leftJoin('users as freelancer','freelancer.id','=','order.freelancer_id');
    	$dt->leftJoin('service','service.id','=','order.service_id');
    	$dt->leftJoin('order_status','order_status.id','=','order.order_status_id');

    	$dt->orderBy('tb_transaksi.id','DESC'); 
    	$tb_transaksi=$dt->paginate(20);
    	$i=0;
    	foreach ($tb_transaksi as $key) 
    	{
    	$tb_transaksi[$i]->created_at=	$this->keIndonesiaa($key->created_at);
    	$tb_transaksi[$i]->detail_report=@unserialize(@$key->detail_report)?@unserialize(@$key->detail_report):array();

    	$i++;
    	}

    	//dd($tb_transaksi);
            return view('admin.dashboard',compact('tb_transaksi'));
    }
public static function keIndonesiaa($Carbon,$date=false,$time=false)
	{
		if(preg_match("/[a-z]/", $Carbon)==true)
		{
			return;
		}
		$dt = new Carbon($Carbon);
		setlocale(LC_TIME, 'IND');
		if($date==true && $time==false)
		{

			$tanggal='%B %Y';
			$dt_=str_replace('Pebruari', 'Februari', $dt->formatLocalized($tanggal));
			return $dt_;
		}
		elseif($date==true && $time==true)
		{
			$tanggal='%d %B %Y %H:%M:%S';
			$dt_=str_replace('Pebruari', 'Februari', $dt->formatLocalized($tanggal));
			return $dt_;
		}
		elseif($date==false && $time==true)
		{
			$tanggal='%H:%M:%S';
			$dt_=str_replace('Pebruari', 'Februari', $dt->formatLocalized($tanggal));
			return $dt_;
		}
		elseif($date==false && $time==false)
		{
			$tanggal='%d %B %Y %H:%M:%S';
			$dt_ 	=str_replace('Pebruari', 'Februari', $dt->formatLocalized($tanggal));
			return $dt_;
		}

		
	}
      
}
