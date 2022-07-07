<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
 

class Admincontroller extends Controller
{
    
    public function index(Request $req)
    {

            return view('admin.dashboard');
    }
}
