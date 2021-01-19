<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Cache;
use DB;
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
        //  $addresses =  Cache::rememberForever('addresses', function () {
        //      return Address::orderby('created_at','DESC')->paginate(2);   
        //  });
       // $addresses = Address::orderby('created_at','DESC')->paginate(10);
        $addresses = DB::table('addresses')
        ->join('cities','addresses.city','cities.id')
        ->paginate(10);
     
        return view('home',compact('addresses'));
    }
}
