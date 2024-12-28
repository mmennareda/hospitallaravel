@extends("layouts.app")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form enctype="multipart/form-data" method="post" action="{{route('savedoctor')}}">
                @csrf
                <label>{{__('language.DOCTORNAME')}}</label>
                <input type="text" name="name" class="form-control mb-4">
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.EMAIL')}}</label>
                <input type="text" name="email" class="form-control mb-4">
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.PASSWORD')}}</label>
                <input type="password" name="password" class="form-control mb-4">
                @error('password')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.IMAGE')}}</label>
                <input type="file" name="doc_image" class="form-control mb-4">
                @error('doc_image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label class="block">
                        {{__('language.GENDER')}}
                    </label>
                    <div class="clip-radio radio-primary">
                    <input type="radio" id="rg-female" name="gender" value="female" >
                    <label for="rg-female">
                        {{__('language.FEMALE')}}
                    </label>
                    <input type="radio" id="rg-male" name="gender" value="male">
                    <label for="rg-male">
                        {{__('language.MALE')}}
                    </label>
                    </div>
                    </div>
                @error('gender')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.ADDRESS')}}</label>
                <input type="text" name="address" class="form-control mb-4">
                @error('address')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.PHONE')}}</label>
                <input type="text" name="phone" class="form-control mb-4">
                @error('phone')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.DEPARTMENT')}}</label>
                <input type="text" name="department" class="form-control mb-4">
                @error('department')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.AGE')}}</label>
                <input type="text" name="age" class="form-control mb-4">
                @error('age')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.DAYS')}}</label>
                <input type="text" name="days" class="form-control mb-4">
                @error('days')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.TIME')}}</label>
                <input type="string" name="time" class="form-control mb-4">
                @error('time')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label>{{__('language.CONSULTANCYFEES')}}</label>
                <input type="text" name="Consultancyfees" class="form-control mb-4">
                @error('Consultancyfees')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value='{{__('language.CREATEDOCTORACCOUNT')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
