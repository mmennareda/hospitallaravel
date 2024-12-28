@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-10 m-auto">
            <div class="card">
                <div class="card-header">
                    {{ __('language.MYBOOKING') }}
                    {{$data->total()}}
                </div>
                <div class="card-body">
                    @if ($data->total() > 0)
                   
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td>{{ __('language.DOCTORNAME') }}</td>
                                <td>{{ __('language.DEPARTMENT') }}</td>
                                <td>{{ __('language.DAYS') }}</td>
                                <td>{{ __('language.TIME') }}</td>
                                <td>{{ __('language.CONSULTANCYFEES') }}</td>
                                <td>{{ __('language.ACTION') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                               @foreach ($data as $item)
                               <tr>
                                   <td>{{ $item->doctor }}</td>
                                   <td>{{ $item->department }}</td>
                                   <td>{{ $item->days }}</td>
                                   <td>{{ $item->time }}</td>
                                   <td>{{ $item->consultancyfees }}</td>
                                   <td>
                                       <a href="{{ route('editbook', $item->id) }}" class="btn btn-primary"><i
                                               class="fa-solid fa-pen-to-square"></i></a>
                                       <a href="{{ route('deletebook', $item->id) }}" class="btn btn-danger"><i
                                               class="fa-solid fa-trash"></i></a>
                                   </td>
                               </tr>
                               @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                    @else
                        <p class="mt-3"> {{ __('language.NOBOOKING') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection