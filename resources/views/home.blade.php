@extends('layouts.app')
@include('layouts.head')

{{-- @section('content') --}}
<div class="">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="wrapper" id="app">
        <app-component ruta="{{route('basepath')}}"></app-component>
        {{-- <index-component></index-component> --}}
      </div>
</div>
{{-- @endsection --}}
@include('layouts.script')
