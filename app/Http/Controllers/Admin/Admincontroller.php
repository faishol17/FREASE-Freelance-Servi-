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
    		'order_status.name as status',
    		'detail_user.no_rekening',
    		'detail_user.nama_pemilik_rek',
    		'detail_user.bank');
    	$dt->leftJoin('order','order.id','=','tb_transaksi.id_order');
    	$dt->leftJoin('users as buyer','buyer.id','=','order.buyer_id');
    	$dt->leftJoin('users as freelancer','freelancer.id','=','order.freelancer_id');
    	$dt->leftJoin('service','service.id','=','order.service_id');
    	$dt->leftJoin('order_status','order_status.id','=','order.order_status_id');
    	$dt->leftJoin('detail_user','detail_user.id','=','order.freelancer_id');

    	//$dt->leftJoin('tb_konfirmasi','b_konfirmasi.id_order','=','order.id');


    	$dt->orderBy('tb_transaksi.id','DESC'); 
    	$tb_transaksi=$dt->paginate(20);
    	$i=0;
    	foreach ($tb_transaksi as $key) 
    	{
	    	$tb_transaksi[$i]->created_at 			=$this->keIndonesiaa($key->created_at);
	    	$tb_transaksi[$i]->detail_report		=@unserialize(@$key->detail_report)?@unserialize(@$key->detail_report):array();
			$status_konfirm=DB::table('tb_konfirmasi')->select('id')->where('id_order',$key->id_order)->first();
			if($status_konfirm)
			{
				$tb_transaksi[$i]->detail_report['status_konfirm'] 	=$status_konfirm;

			}
				$tb_transaksi[$i]->detail_report['no_rekening'] 	=@$key->no_rekening;
				$tb_transaksi[$i]->detail_report['nama_pemilik_rek']=@$key->nama_pemilik_rek;
				$tb_transaksi[$i]->detail_report['bank'] 			=@$key->bank;
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
	public static function simpankonfirmasi(Request $req)
	{



		$data['tgl_transfer']	= Carbon::parse($req->input('tgl_konfirmasi'))->format('Y-m-d');
		$data['note'] 			= $req->input('note');
		$data['id_order']       = $req->input('id_order');

		
		$file                   = $req->file('unggah');
		$real_name              = $req->input('id_order').str_replace(' ', '_', $file->getClientOriginalName()); 
        
        $data['unggah'] 		=$real_name;
		$file->move(public_path('assets'), $data['unggah']);
		 $data['created_at']=Carbon::now();
		 $data['updated_at']=Carbon::now(); 
		 DB::table('tb_konfirmasi')->insert($data);
        print json_encode(array('error' =>false));




	}
	
      
}
