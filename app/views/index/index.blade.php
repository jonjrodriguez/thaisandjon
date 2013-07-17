@section('content')
    
    @include('index._top')

    <div class="divider"><span></span></div>

    @include('index._story')

    <div class="divider"><span></span></div>

    @include('index._location')
    
    <div class="divider"><span></span></div>

    @include('index._schedule')

    <div class="divider"><span></span></div>

    @include('index._rsvp')

@stop

@section('script')

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBkUMm4kUSUp9KLRz5DRExh8ZlOuOM6uCc&sensor=false"></script>
<script src="/js/main-min.js"></script>

@stop