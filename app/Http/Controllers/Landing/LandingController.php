<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Order;
use App\Models\Service;
use App\Models\AdvantageUser;
use App\Models\Tagline;
use App\Models\AdvantageService;
use App\Models\ThumbnailService;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();

        return view('pages.landing.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }


    // custom

    public function explore()
    {
        $services = Service::orderBy('created_at', 'desc')->get();

        return view('pages.landing.explore', compact('services'));
    }

    public function detail($id)
    {
        $service = Service::where('id', $id)->first();

        $thumbnail = ThumbnailService::where('service_id', $id)->get();
        $advantage_user = AdvantageUser::where('service_id', $id)->get();
        $advantage_service = AdvantageService::where('service_id', $id)->get();
        $contact=DB::table('detail_user')->select('contact_number')->where('users_id',$service->users_id)->first();
$contact=@$contact->contact_number;
        $tagline = Tagline::where('service_id', $id)->get();

        return view('pages.landing.detail', compact('service', 'thumbnail', 'advantage_user', 'advantage_service', 'tagline','contact'));
    }

    public function booking($id)
    {
        $service = Service::where('id', $id)->first();
        $user_buyer = Auth::user()->id;

        // validation booking
        if($service->users_id == $user_buyer) {
            toast()->warning('Maaf, anggota tidak dapat memesan layanan mereka sendiri!');
            return back();
        }

        $order = new Order;
        $order->buyer_id = $user_buyer;
        $order->freelancer_id = $service->user->id;
        $order->service_id = $service->id;
        $order->file = NULL;
        $order->note = NULL;
        $order->expired = Carbon::now()->addDays(@$service->delivery_time);
        $order->order_status_id = 4;
        $order->save();

        $order_detail = Order::where('id', $order->id)->first();

        return redirect()->route('detail.booking.landing', $order->id);
    }
 
    public function detail_booking($id)
    {
        $order = Order::where('id', $id)->first();

        return view('pages.landing.booking', compact('order','id'));
    }
    public function tentang()
    {

        return view('pages.landing.tentang');
    }
    public function hubungi(Order $order)
    {
        
        return view('pages.landing.hubungi', compact('order'));
    }


}
