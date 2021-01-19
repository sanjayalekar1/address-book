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

        /*  code using mamcached while enableling this remove links() from home,blade.php */
        //  $addresses =  Cache::rememberForever('addresses', function () {
        //      return Address::orderby('created_at','DESC')->get();   
        //   });
      
        /* code for Pagination */
         $addresses = DB::table('addresses')
         ->join('cities','addresses.city','cities.id')
         ->paginate(3);
     
        return view('home',compact('addresses'));
    }
}
