<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $rolid=Auth::user()->role_id;
        if($rolid==1){
            $ilanListesi=Advertisement::all();
            return view("front.advertisementlist",compact("ilanListesi"));
        }
        else {
            return view('admin.createadvertisement');
        }
    }
}
