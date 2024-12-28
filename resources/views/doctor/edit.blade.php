@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('updatedoctor')}}" method="post" >
            @csrf
                <input type="hidden" name="old_id" class="form-control mb-4" value="{{$result->id}}">

                <label>{{__('language.DOCTORNAME')}}</label>
                <input type="text" name="name" class="form-control mb-4" value="{{$result->name}}">
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.EMAIL')}}</label>
                <input type="email" name="email" class="form-control mb-4" value="{{$result->email}}">
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.PASSWORD')}}</label>
                <input type="password" name="password" class="form-control mb-4" value="{{$result->password}}">
                @error('password')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.IMAGE')}}</label>
                <input type="file" name="doc_image" class="form-control mb-4" value="{{$result->doc_image}}">
                @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="hidden" name="gender" class="form-control mb-4" value="{{$result->gender}}">

                <label>{{__('language.ADDRESS')}}</label>
                <input type="text" name="address" class="form-control mb-4" value="{{$result->address}}">
                @error('address')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label>{{__('language.PHONE')}}</label>
                <input type="text" name="phone" class="form-control mb-4" value="{{$result->phone}}">
                @error('phone')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                
                <label>{{__('language.DEPARTMENT')}}</label>
                <input type="text" name="department" class="form-control mb-4" value="{{$result->department}}">
                @error('department')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.AGE')}}</label>
                <input type="text" name="age" class="form-control mb-4" value="{{$result->age}}">
                @error('age')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.DAYS')}}</label>
                <input type="text" name="days" class="form-control mb-4" value="{{$result->days}}">
                @error('days')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.TIME')}}</label>
                <input type="text" name="time" class="form-control mb-4" value="{{$result->time}}">
                @error('time')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.CONSULTANCYFEES')}}</label>
                <input type="text" name="Consultancyfees" class="form-control mb-4" value="{{$result->Consultancyfees}}">
                @error('Consultancyfees')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value='{{__('language.EDITDOCTORACCOUNT')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
