@section('content')
    
    @include('index._location')

@stop

@section('script')

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBkUMm4kUSUp9KLRz5DRExh8ZlOuOM6uCc&sensor=false"></script>
<script src="/js/location-min.js"></script>

@stop