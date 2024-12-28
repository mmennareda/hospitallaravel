@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto ">
                <div class="card">
                    <div class="card-header">
                        {{ __('language.USERS') }}
                    </div>
                    <div class="card-body ">
                    <div class="d-flex align-items-center justify-content-between">
                        <form action={{ route('searchuser') }} method="get">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">{{ __('language.SEARCH') }}</button>
                                </span>
                            </div>
                        </form>
                    </div>
                        @if (session('message'))
                            <h4 class="alert alert-success">{{ session('message') }}</h4>
                        @endif
                        @if ($data->total() > 0)
                            <table class="table table-dark mt-3">
                                <thead>
                                    <tr>
                                        <td>{{ __('language.ID') }}</td>
                                        <td>{{ __('language.NAME') }}</td>
                                        <td>{{ __('language.EMAIL') }}</td>
                                        <td>{{ __('language.ROLE') }}</td>
                                        <td>{{ __('language.ACTION') }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <a href="{{ route('deleteuser', $item->id) }}" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->links() }}
                        @else
                            <p class="mt-3"> {{ __('language.USERNOTREGISTERD') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endsection