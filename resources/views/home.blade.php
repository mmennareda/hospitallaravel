@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @if (Auth::user() && Auth::user()->role == 'patient')
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                {{ __('language.MYBOOKINGS') }}
                                <i class="fa-solid fa-book-medical fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <form class="text-center" action={{ route('searchbook') }} method="get">
                                @if (session('message'))
                                <h4 class="alert alert-success mt-2">{{ session('message') }}</h4>
                                @endif
                                <div class="input-group">
                                    <input type="hidden" name="search" class="form-control"
                                    value="{{ Auth::user()->email }}">
                                    <span class="input-group-prepend ">
                                        <button type="submit" class="btn btn-primary">{{ __('language.VIEWMYBOOKING') }}</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('doctorlist') }}">
                                    {{ __('language.DOCTORS') }}
                                </a>
                                <i class="fa-solid fa-user-doctor fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endif
        @if (Auth::user() && Auth::user()->role == 'admin')
            <div class="row mt-5">
                <div class="col-md-4 m-auto ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('doctor') }}">
                                    {{ __('language.DOCTORS') }}
                                </a>
                                <i class="fa-solid fa-user-doctor fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countdoctors }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4 m-auto ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('department') }}">
                                    {{ __('language.DEPARTMENT') }}
                                </a>
                                <i class="fa-solid fa-list fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countdepart }}

                        </div>
                    </div>
                </div>

                <div class="col-md-4 m-auto ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('allbooking') }}">
                                    {{ __('language.ALLBOOKING') }}
                                </a>
                                <i class="fa-solid fa-book-medical fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countpatibook }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user() && Auth::user()->role == 'doctor')
            <div class="row mt-5">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header text-center">
                                {{ __('language.MYAPPOINTMENTS') }}
                            <i class="fa-regular fa-calendar-check fa-2xl"></i>
                        </div>
                        <div class="card-body text-center">
                            <form action={{ route('searchapp') }} method="get">
                                <div class="input-group">
                                    <input type="hidden" name="search" class="form-control"
                                        value="{{ Auth::user()->email }}">
                                    <span class="input-group-prepend">
                                        <button type="submit" class="btn btn-primary">{{ __('language.VIEWMYAPPOINTMENTS') }}</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('patient') }}">
                                    {{ __('language.PATIENTS') }}
                                </a>
                                <i class="fa-solid fa-hospital-user fa-2xl"></i>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countpatients }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
    </div>
@endsection
