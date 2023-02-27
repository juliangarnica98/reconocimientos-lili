@include('layouts.head')
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  {{-- <app-component ruta="{{route('basepath')}}"></app-component> --}}

      <div class="content" mmm>
        {{-- <router-view></router-view> --}}
        <index-component/>

      </div>


</div>
<!-- ./wrapper -->
@include('layouts.script')
</body>
</html>
