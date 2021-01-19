<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Address;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AddressExport;

class AddressController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City;
        $cities = $city->all();
        return view('address/add-contact',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'firstname' => 'string | required',
            'lastname' => 'string |required',
            'email' => 'required|string| email| unique:addresses|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required | min:10 | max:10',
            'city' => 'required',
            'zipcode' => 'max:6 | min:6',
            'profilepic' => 'mimes:jpg, png, jpeg, gif, webp, svg|max:300 |dimensions:width=150,height=150',
        ]);


        if($request->hasFile('profilepic')){
            $profilepic = $request->file('profilepic');
            $file_name = time().'.'.$profilepic->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $profilepic->move($destinationPath,$file_name);
        }else{
            $file_name = "default.png"; 
        }
        
            $address = new Address;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->email = $request->email;
            $address->phone = $request->phone;
            $address->street = $request->street;
            $address->city = $request->city;
            $address->zip_code = $request->zipcode;
            $address->profile_pic = $file_name;
            $address->save();


            // $to = $request->email;
            // $subject = "Congratulation !! Contact Added to Address Book ";
            // $txt = "Dear Sir, Your cantact has been added to our address book Successfully.";
           

            // mail($to,$subject,$txt);

            echo '<script>alert("Contact Added Successfully.");</script>';

           $addresses = Address::orderby('created_at','DESC')->paginate(10);
           
            return view('home',compact('addresses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $address = Address::where('email',$email)->first();
        //print_R($address);die(); 
        $city = new City;
        $cities = $city->All(); 
        return view('address/edit-contact',compact('address','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required | max:10 | min:10',
            'city' => 'required',
            'zipcode' => 'max:6 | min:6',
            'profilepic' => 'mimes:jpg, png, jpeg, gif, webp, svg|max:300|dimensions:width=150,height=150',
        ]);

        $address = new Address;
        $address = $address->find($request->id);
        

        if($request->hasFile('profilepic')){
            $profilepic = $request->file('profilepic');
            $file_name = time().'.'.$profilepic->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $profilepic->move($destinationPath,$file_name);
        }else{
            $file_name = $request->profile_pic;
        }
    

        $address->first_name = $request->firstname;
        $address->last_name = $request->lastname;
        $address->phone = $request->phone;
        $address->street = $request->street;
        $address->city = $request->city;
        $address->zip_code = $request->zipcode;
        $address->profile_pic = $file_name;
        $address->update();
        return redirect()->back()->with('alert', 'Contact Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        $address = Address::where('email',$email)->first();
        $address->delete();
        return redirect()->back()->with('alert', 'Contact Deleted !');

    }

     /**
    * @return \Illuminate\Support\Collection
    */
  

    public function exporttoExcel() 
    {
        
        return Excel::download(new AddressExport, 'address.xlsx');
        
    }
    public function exporttoCSV() 
    {
        
        return Excel::download(new AddressExport, 'address.csv');
        
    }
}
