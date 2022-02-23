@include('components.head')
@include('components.nav')
@if(!session()->has('user'))
    @include('components.carusel')
@endif
@yield('content')
@include('components.footer')

