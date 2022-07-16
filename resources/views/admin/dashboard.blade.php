@extends('admin.layouts_admin') 
@section('title', ' Dashboard') 
@section('content')
<style type="text/css">
  
.w-full-color {
  background: rgba(0, 0, 0, 0.13);
}
.w-full-color td {
  padding: 5px 8px;
}
tr img {
  margin: auto;
}
tr i {
  font-size: 14px;
  color: #11db60;
}
</style>

<main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        New Transaction
                    </h2>
                    <p class="text-sm text-gray-400">
                        Data transaksi terbaru
                    </p>
                </div>
            </div>
        </div>
         <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">
                <li class="flex items-center">
                    <a href="{{ route('member.service.index') }}" class="text-gray-400">Services</a>
                </li> 
            </ol>
        </nav>
        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">

                	<div class="bg-white rounded-xl">
                        <section class="pt-6 pb-20 mx-8 w-auth">
                        	 <table class="w-full" aria-label="Table">
                                <thead>
                                    <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Services</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Nama Freelancer</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Nama Buyer</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Harga</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Status pembayaran</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Status order</th>
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Tanggal Transaksi</th> 
                                        <th class="px-1 py-5 text-sm w-2/8" scope="">Opsi</th>
                                    </tr>
                                </thead>
                                	@foreach($tb_transaksi as $key)
                                <tbody>
                                	<tr>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->title}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->nama_pembayar}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->nama_frelance}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->detail_report['gross_amount']}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->detail_report['transaction_status']}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->status}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->created_at}}</td>  
                                		<td class="px-1 py-5 text-sm w-2/8">
                                			
                                			<a href="#" data-id="{{$key->id}}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email  detail_trx">Details</a>
                                		</td>      
                                	</tr>
                                </tbody>
                                	@endforeach
                            </table>
                        </section>
                    </div>
                </main>
            </div>
        </section>
 </main> 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="simpanKonfirmasi" name="simpanKonfirmasi">
            <div class="form-group">
                <label>Tanggal Transfer</label>
                <input type="date" name="tgl_konfirmasi" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Unggah Bukti</label>
                <input type="file" required="" name="unggah" class="form-control"  accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label>Note</label>
                <textarea class="form-control" required="" name="note"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kirim</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Rekening</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="rekeningList">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
     $(document).ready(function()
     {
        
        @foreach($tb_transaksi as $k)
        window['detail_{{$k->id}}']={!!json_encode($k->detail_report)!!};
        @endforeach
     });
     $(document).ready(function()
     {
        $('body').delegate('.detail_trx','click',function(e)
        {
            e.preventDefault();
            $(this).toggleClass('show')
            var dt_id=  $(this).data('id');
            window.id=dt_id;
            $('.dtail_mid').remove();
            if($(this).hasClass('show')==false)
            {
                return;
            }
            $('.detail_trx').not(this).removeClass('show');
            const dt_midtrans =window['detail_'+dt_id];
            var td_=``;
            var o=0;
            for(let lt of Object.keys(dt_midtrans))
            {
                console.log(lt);
                if(lt!='no_rekening'&&lt!='nama_pemilik_rek'&&lt!='bank')
                {

                     td_+=`<tr class="border-b border-b-gray-600"><td>`+lt+`</td><td>`+dt_midtrans[lt]+`</td></tr>`;
              o++;  
                }
            }
            var statsu_kon=dt_midtrans['status_konfirm']==undefined?`<a class="konfirmmodal px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">Konfirmasi ke Freelancer</a>`:`<i>Sudah melakukan Konfirmasi</i>`;
            $(this).closest('tbody').append(`
                <tr class="dtail_mid">
                    <td colspan="8"><h4>Respon Midtrans</h4>
                        <table class="w-full-color" >`+td_+`
                            <tr>
                                <td colspan="`+o+`">
                                    `+statsu_kon+` <a href="#" class="cekRekening btn btn-primary btn-sm">Cek Rekening</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>`);
         
        });
        $('body').delegate('.konfirmmodal','click',function(e)
        {
            e.preventDefault();
            $('#exampleModal').modal('show');
            window.btn_k=$(this);
        }); 
         $('body').delegate('#simpanKonfirmasi','submit',function(e)
        { 
            e.preventDefault();
            var tis_=$(this);
             tis_.find('button[type="submit"]').html('loading...'); 
            const popupjson = document.forms.namedItem('simpanKonfirmasi');
            const form_popup     = new FormData(popupjson); 
            form_popup.append('_token','{{csrf_token()}}');
            form_popup.append('id_order', window.id);  
            fetch('{{url('admin/simpan-konfirmasi')}}', { method: 'POST',body:form_popup}).then(res => res.json()).then(data => 
            {
             tis_.find('button[type="submit"]').html('Kirim'); 
                $('#exampleModal').modal('hide'); 
                    window.btn_k.closest('td').html('<i>Sudah melakukan Konfirmasi</i>');
            });  
        }); 
            $('body').delegate('.cekRekening','click',function(e)
            {
                e.preventDefault();

                $('#exampleModal2').modal('show'); 
            }); 
             $('#exampleModal2').on('shown.bs.modal',function(e)
                {
                    e.preventDefault();
                    


                    var dt_id=window.id;
                    var no_rekening         =window['detail_'+dt_id]['no_rekening']?window['detail_'+dt_id]['no_rekening']:'-';
                    var nama_pemilik_rek    =window['detail_'+dt_id]['nama_pemilik_rek']?window['detail_'+dt_id]['nama_pemilik_rek']:'-';
                    var bank                =window['detail_'+dt_id]['bank']?window['detail_'+dt_id]['bank']:'-';
                    var image_bnk='';
                    switch(bank)
                    {
                        case 'BNI':
                        image_bnk=`<img src="{{asset('assets')}}/bni.png" width="100px">`;
                        break;
                        case 'Mandiri':
                        image_bnk=`<img src="{{asset('assets')}}/mandiri.png" width="100px">`;

                        break;
                        case 'BCA':
                        image_bnk=`<img src="{{asset('assets')}}/bca.png" width="100px">`;

                        break;
                        case 'BRI':
                        image_bnk=`<img src="{{asset('assets')}}/bri.png" width="100px">`;

                        break;
                        case 'CIMBNIAGA':
                        image_bnk=`<img src="{{asset('assets')}}/cimbniaga.png" width="100px">`;

                        break;
                         
                        case 'Danamon':
                        image_bnk=`<img src="{{asset('assets')}}/danamon.png" width="100px">`;

                        break;
                    }
                    var lis_tb=`<table class="w-full" aria-label="Table">
                                <tr >
                                    <td>Nama Bank</td> 
                                    <td>:</td> 
                                    <td>`+bank+`</td>  
                                </tr>
                                <tr>
                                    <td>No Rekening</td> 
                                    <td>:</td> 
                                    <td>`+no_rekening+`</td>   
                                </tr>
                                <tr>
                                    <td>Nama Pemilik Rekening</td> 
                                    <td>:</td> 
                                    <td>`+nama_pemilik_rek+`</td>                                 
                                </tr>

                                <tr> 
                                <td colspan="3" style="text-align:center;" >`+image_bnk+`</td> 
                                </tr></table> 
                                `;

                     $('#rekeningList').html(lis_tb);
                });
     });
 </script>
@endsection