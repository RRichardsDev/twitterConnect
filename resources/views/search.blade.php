@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

	        

	            <div class="container">
	            	<div class="row pb-2">
	            		<h2>Showing search results for "<span class="text-Otitle">{{$searchQuery}}</span>"...</h2>
	            	</div>

		            <div style="background-color: #333;" class="card dark-card">
		                <div class="pb-4 card-body">
		                    <div class='row'>
		                        <div class="col pl-1 pr-1"><a class="text-Otitle" style="font-size: 22px;" href="{{route('searchTvShowAlpha', "A")}}">A</a></div>
		                        @foreach($alphabet as $letter)
		                            <div class="col pr-1"><a class="text-Otitle" style="font-size: 22px;" href="{{route('searchTvShowAlpha', $letter)}}">{{$letter}}</a></div>
		                        @endforeach
		                    </div>
		                </div>
		            </div>
	            	
	                <div class="row">
	                    @foreach($tvShows as $tvShow)
	                        <div class="col">
	                            <div class="overlay">
	                                <a href="{{ route('summary', $tvShow['id']) }}"><img class="video-thumb-img" ref="route('summary', $tvShow['id'])" 
	                                    src="{{$tvShow['image_thumbnail_path']}}"></a>
	                            </div>
	                            <a href="{{ route('summary', $tvShow['id']) }}"><h5 class="text-Otitle pt-1 pl-1">{{$tvShow['name']}}</h5></a>
	                        </div>
	                    @endforeach                 
	                </div>
	            </div>    
	        
        </div>
    </div>
</div>
@endsection
