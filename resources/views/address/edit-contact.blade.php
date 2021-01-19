@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Contact') }}  <a href="/home" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to List </a></div>

                <div class="card-body">
                <div class="container">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert') }}
                    </div>
                @endif
                              
                                <div class="row">
                                     <div class="col-md-6">
                                        <form action="/update-contact" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="id" value="{{$address->id}}">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="firstname">First Name <span class="star">*</span></label>
                                                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{$address->first_name}}"> 
                                                        @error('firstname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="lastname">Last Name <span class="star">*</span></label>
                                                        <input type="text" class="form-control  @error('lastname') is-invalid @enderror" name="lastname" value="{{$address->last_name}}">
                                                        @error('lastname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>                             
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Email <span class="star">*</span></label>
                                                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$address->email}}" disabled>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone <span class="star">*</span></label>
                                                        <input type="integer" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{$address->phone}}">
                                                        @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="street">Street</label>
                                                        <input type="text" class="form-control" name="street" value="{{$address->street}}">
                                                    </div>
                                                </div>  
    
                                        </div>
                                        
                                        <br><br>
                                        <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="city">City <span class="star">*</span></label>
                                                        <select name="city" class="form-control  @error('city') is-invalid @enderror">
                                                            <option>Select City</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}" @if($city->id == $address->city) selected @endif>{{$city->city_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                       
                                                    </div>
                                                </div>  
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="zipcode">Zip Code </label>
                                                        <input type="number" class="form-control  @error('zipcode') is-invalid @enderror"  name="zipcode" value="{{$address->zip_code}}">
                                                        @error('zipcode')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>  
                                             <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="profiepic">Profile Pic</label>
                                                        <input type="file" class="form-control  @error('profilepic') is-invalid @enderror" name="profilepic" onchange="readURL(this);" >
                                                        (Prefered Dimention: 150 X 150)
                                                        @error('profilepic')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <img src="{{asset('uploads')}}/{{$address->profile_pic}}" width="150px" height="150px" id="img" alt="Profile" />
                                            </div> 
                                               
                                        </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                        <div class="col-md-12">
                                        
                                                <center> <input type="submit"  class="btn btn-info " value="Save"></center>
                                        </div>
                                        </div>
                                        
                                        
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                                </div>
                            </div>    
                   
                </div>
            </div>
        </div>
    </div>

   
</div>
             
@endsection


        <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#img').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
        </script>



