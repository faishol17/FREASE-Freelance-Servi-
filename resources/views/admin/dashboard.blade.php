@extends('admin.layouts_admin') 
@section('title', ' Dashboard') 
@section('content')
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
                                        <th class="py-4" scope="">Transaksi Pembayaran</th>
                                        <th class="py-4" scope="">Nama Freelancer</th>
                                        <th class="py-4" scope="">Nama Buyer</th>
                                        <th class="py-4" scope="">Harga</th>
                                        <th class="py-4" scope="">Status pembayaran</th>
                                        <th class="py-4" scope="">Status order</th>
                                        <th class="py-4" scope="">Tanggal Transaksi</th> 
                                        <th class="py-4" scope="">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($tb_transaksi as $key)
                                	<tr>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->title}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->nama_pembayar}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->nama_frelance}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->detail_report['gross_amount']}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->detail_report['transaction_status']}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->status}}</td>
                                		<td class="px-1 py-5 text-sm w-2/8">{{@$key->created_at}}</td>  
                                		<td class="px-1 py-5 text-sm w-2/8">
                                			
                                			<a href="#" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">Details</a>
                                		</td>                     		



                                	</tr>
                                	@endforeach
                                </tbody>
                            </table>
                        </section>
                    </div>
                </main>
            </div>
        </section>
 </main>
@endsection