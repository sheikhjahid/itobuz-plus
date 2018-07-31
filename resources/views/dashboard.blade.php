@include('layouts.header')
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
   @include('layouts.panel-right')
  <!-- aside -->
  <div class="container">
    @yield('content')
  </div>
<!-- ############ LAYOUT END-->

@include('layouts.footer')