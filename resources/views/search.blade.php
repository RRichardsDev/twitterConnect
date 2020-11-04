@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

	            <div class="container">
	            	<div class="row pb-4">
	            		<h2>Showing search results for "<span class="text-Otitle">{{$searchQuery}}</span>"...</h2>
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
