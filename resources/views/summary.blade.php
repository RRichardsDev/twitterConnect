@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card dark-card">                
                <div class="card dark-card pt-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
	                <div class="card-body min-height-3">
	                	
	                	<div class="row">
		                	<div class="col-md-3 video-summary-img-container" ><img class="video-summary-img" 
		                		src="{{$tvShow['image_thumbnail_path']}}"></div>
		                	<div class="col-md-8" >
		                		<h2 class="pull-left mb-3 text-Otitle"> {{$tvShow['name']}} </h2>
		                		<h5>Description</h5>
		                		<div class="summary-description">
		                		<p>{!!$tvShow['description']!!}</p>		                		
		                	</div>
		                	</div>
			                	<div class="col-md-3 pl-0"> 
		                			<div class="thumb-carosel-container">
		                				<img class="video-thumb-sm" src="{{$tvShow['image_thumbnail_path']}}">
		                				@foreach($tvShow['pictures'] as $thumbnail)		                			
		                					<img class="video-thumb-sm" src="{{$thumbnail}}">
		                				@endforeach
		                			</div> 
		                		</div>		         		                		
	                	
	                		<div class="col-md-8"> <hr class="break-line"> </div>
	                	</div>

	                	<div class="row">
	                		<div class="col-md-3"> </div>
	                		<div class="col-md-4 align-self-end"><p><span class="font-weight-bold">Genres: </span>
	                			@foreach($tvShow['genres'] as $genre)
		                			@if($genre == end($tvShow['genres']) )
		                				<span class="text-links">{{$genre}} </span> 
		                			@else
		                				<span class="text-links">{{$genre}} </span> |   
	                				@endif
	                			@endforeach
		                	</div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Status:</span>
	                			{{$tvShow['status']}}</p>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-3"></div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Channel: </span>
	                		{{$tvShow['network'].' ('.$tvShow['country'].')'}} </p></div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Start Date: </span>
	                		{{$tvShow['start_date']}}</p></div>
	                		
	                	</div>
	                	<div class="row">
	                		<div class="col-md-3"></div>	                		
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">End Date:</span>
	                		@if(!$tvShow['end_date']) 
	                			Unknown
	                		@else
	                			{{$tvShow['end_date']}}
	                		@endif
	                		</p></div>
	                		<div class="col-md-4"></div>
	                		
	                	</div>

	                </div>
                </div>
            </div>

            <div class="card dark-card mt-4">
            	<div class="card dark-card">
            		<div class="card-body min-height-3">
	            		<h2 class="pull-left mb-3 text-Otitle"> Episodes </h2>
	            		<table class="table table-hover table-dark">
					  <thead>
					    <tr>
					    	<th class="text-Otitle col-2" scope="col">Episode</th>
					     	<th class="text-Otitle col-2" scope="col">Date</th>					     	
					     	<th class="text-Otitle col-8" scope="col">Name</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($tvShow['episodes'] as $episode)
						    <tr>
						    	<td>
						     		{{'S'.(strlen($episode['season']) == 1 ? '0'.$episode['season'] : $episode['season']).
						     		'E'.(strlen($episode['episode'])==1 ? '0'.$episode['episode'] : $episode['episode'])}}</td>
						     	<td>{{$episode['air_date']}}</td>
						     	<td><a href="" class="text-Otitle">{{$episode['name']}}</a></td>
						    </tr>
					   	@endforeach
					  </tbody>
					</table>
	            	</div>
	            	
	            </div>
            </div>

        </div>
    </div>
</div>
@endsection
