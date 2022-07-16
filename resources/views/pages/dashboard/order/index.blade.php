@extends('layouts.app')

@section('title', ' My Order')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-8">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        My Orders
                    </h2>
                    <p class="text-sm text-gray-400">
                        {{ auth()->user()->order_freelancer()->count() }} Total Orders
                    </p>
                </div>
                <div class="col-span-4 lg:text-right">

                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                        <table class="w-full" aria-label="Table">
                            <thead>
                                <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                    <th class="py-4" scope=""> Nama Pembeli</th>
                                    <th class="py-4" scope="">Detail Service</th>
                                    <th class="py-4" scope="">Dedline</th>
                                    <th class="py-4" scope="">Action</th>
                                    <th class="py-4" scope="">Konfirmasi</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @php
                                $data_komfirm=array();
                                @endphp
                                @forelse ($orders as $key => $order)
                                @php
                                    $data_komfirm[$order->id]=DB::table('tb_konfirmasi')->where('id_order',@$order->id)->first();
                                @endphp
                                    <tr class="text-gray-700 border-b">
                                        <td class="px-1 py-5 text-sm w-2/8">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                    @if ($order->user_buyer->detail_user->photo != NULL)
                                                        <img class="object-cover w-full h-full rounded-full" src="{{ url(Storage::url($order->user_buyer->detail_user->photo)) }}" alt="photo freelancer" loading="lazy" />
                                                    @else
                                                        <svg class="object-cover w-full h-full rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                    @endif

                                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-black">{{ $order->user_buyer->name ?? ''}}</p>
                                                    <p class="text-sm text-gray-400">{{ $order->user_buyer->detail_user->role ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-2/6 px-1 py-5">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                    @if (count($order->service->thumbnail_service))
                                                        @if ($order->service->thumbnail_service[0]->thumbnail != NULL)
                                                            <img class="object-cover w-full h-full rounded" src="{{ url(Storage::url($order->service->thumbnail_service[0]->thumbnail)) }}" alt="photo freelancer" loading="lazy" />
                                                        @else
                                                            <svg class="object-cover w-full h-full rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                        @endif
                                                    @else
                                                        <svg class="object-cover w-full h-full rounded text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                    @endif

                                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-black">
                                                        {{ $order->service->title ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-1 py-5 text-xs text-red-500">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mb-1">
                                                <path d="M7.0002 12.8332C10.2219 12.8332 12.8335 10.2215 12.8335 6.99984C12.8335 3.77818 10.2219 1.1665 7.0002 1.1665C3.77854 1.1665 1.16687 3.77818 1.16687 6.99984C1.16687 10.2215 3.77854 12.8332 7.0002 12.8332Z" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7 3.5V7L9.33333 8.16667" stroke="#F26E6E" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            {{ (strtotime($order->expired) - strtotime(date('Y-m-d'))) / 86400 ?? '' }} days left
                                        </td>
                                        <td class="px-1 py-5 text-sm">
                                            @if($order->order_status_id == '1')
                                                <a href="{{ route('member.order.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">Details</a>

                                                <p class="px-4 py-2 mt-2 inline text-left text-green-500">
                                                    Approved
                                                </p>
                                            @elseif($order->order_status_id == '2')
                                                <a href="{{ route('member.order.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">Details</a>

                                                <a href="{{ route('member.order.edit', $order->id) }}" class="px-4 py-2 mt-2 text-center text-white rounded-xl bg-serv-email">Submit</a>
                                            @elseif($order->order_status_id == '3')
                                                <a href="{{ route('member.order.show', $order->id) }}" class="px-4 py-2 mt-1 mr-2 text-center text-white rounded-xl bg-serv-email">Details</a>

                                                <p class="px-4 py-2 mt-2 inline text-left text-red-500">
                                                    Rejected
                                                </p>
                                            @elseif($order->order_status_id == '4')
                                                <a href="{{ route('member.accept.order', $order->id) }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                                    Accept
                                                </a>

                                                <a href="{{ route('member.reject.order', $order->id) }}" class="px-4 py-2 mt-2 text-left bg-white rounded-xl">
                                                    Reject
                                                </a>
                                            @else
                                                {{ 'N/A' }}
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if(@$data_komfirm[$order->id])
                                            <a class="cekkonfirm btn btn-success" href="#" data-id="{{@$order->id}}" >Sudah Bayar</a>
                                            @else
                                            <a class="btn btn-warning" href="#" data-id="{{@$order->id}}" >Belum ada Pembayaran</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    {{-- empty --}}
                                @endforelse

                            </tbody>
                        </table>
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
                 <div class="form-control" id="TanggalTransfer"></div>
            </div>
            <div class="form-group">
                <label>Unggah Bukti</label> 
                <div id="imagekon"></div>
            </div>
            <div class="form-group">
                <label>Note</label>
                <p id="notekon"></p>
            </div>
            
        </form>
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
        var dta_kon={!!json_encode($data_komfirm)!!}
        $('body').delegate('.cekkonfirm','click',function(e)
        {
            e.preventDefault();
            var id_order=$(this).data('id');
            window.data_konfirm=dta_kon[id_order];
            $('#exampleModal').modal('show');

        });
        $('#exampleModal').on('shown.bs.modal',function(e)
        {
            e.preventDefault();
            $('#TanggalTransfer').html(window.data_konfirm.tgl_transfer);
            $('#imagekon').html('<img src="{{asset('assets')}}/'+window.data_konfirm.unggah+'" width="100%">');
            $('#notekon').html(window.data_konfirm.note); 
        });
    })
</script>
@endsection
