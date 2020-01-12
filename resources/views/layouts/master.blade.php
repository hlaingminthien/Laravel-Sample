<!DOCTYPE html>
<html ng-app="myApp" ng-controller="myCtrl" lang = "{{app()->getLocale()}}">
  @include('layouts.partials.header')
<body>
	
   <header id="home" class="hero-area">

      @include('layouts.partials.navbar')
      
   </header>

    @yield('content')

    @include('layouts.partials.footer')      

</body>
</html>