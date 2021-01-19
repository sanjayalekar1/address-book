@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Address Book') }}  
                <a href="/add-contact" class="btn btn-info"><i class="fa fa-plus"></i> Create New </a>
                <a href="/exporttoexcel" class="btn btn-info"><i class="fa fa-download"></i> Excel</a>
                <a href="/exporttocsv" class="btn btn-info"><i class="fa fa-download"></i> CSV</a></div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Profile Pic</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Street</th>
                                                <th>Zip Code</th>
                                                <th>City</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($addresses as $address)
                                            <tr>
                                                <td><img src="{{asset('uploads')}}/{{$address->profile_pic}}" height="100px" width="100px"></td>
                                                <td>{{$address->first_name}}</td>
                                                <td>{{$address->last_name}}</td>
                                                <td>{{$address->email}}</td>
                                                <td>{{$address->phone}}</td>
                                                <td>{{$address->street}}</td>
                                                <td>{{$address->zip_code}}</td>
                                                <td>{{$address->city_name}}</td>
                                                <td>
                                               
                                                <a href="/edit-contact/{{$address->email}}" ><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="/delete-contact/{{$address->email}}" onclick="return confirm('Are you sure to delete Contact?please confirm.');"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                       
                                        </tbody>
                                        
                                    </table>

                                    
                                </div>
                </div>
            </div>
        </div>
    </div>
  
    {{$addresses->links('address.paginate')}}
</div>
@endsection
