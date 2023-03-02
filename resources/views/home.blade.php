{{-- @extends('layouts.app') --}}
@include('layouts.head')

{{-- @section('content') --}}
<div class="">

    <div class="wrapper" id="app">
        <app-component ruta="{{route('basepath')}}"></app-component>
        {{-- <index-component></index-component> --}}
      </div>
</div>
{{-- @endsection --}}
@include('layouts.script')
