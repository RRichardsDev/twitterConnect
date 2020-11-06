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
	            		<div class="container"><h2 class="pull-left mb-3 text-Otitle"> Episodes </h2></div>

	            		<div class="container">
						  	<ul class="nav nav-tabs">
						  		<li class="nav-item">
								    <a class="nav-link active" href="#menu1" data-toggle="tab"><span class="text-Otitle">Season 1</span></a>
								  </li>
						  		@for($i=2; $i <= count($tvShow['seasons']); $i++)
						  			<li class="nav-item">
								    	<a class="nav-link" href="#menu{{$i}}" data-toggle="tab"><span class="text-Otitle">Season {{$i}}</span></a>
								  	</li>
							  	@endfor								
							</ul>							
  	<div class="tab-content">
  			<div id="menu1" class="tab-pane fade in active show">
		      	<table class="table table-hover table-dark">
				  <thead class="dark-light-card">
				    <tr>
				    	<th class="text-Otitle" scope="col">Episode</th>
				     	<th class="text-Otitle" scope="col">Date</th>					     	
				     	<th class="text-Otitle" scope="col">Name</th>
				     	<th></th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tvShow['seasons'][1] as $episode)
					    <tr>	    
					    	<a><td class="align-middle">
					     		{{'S'.(strlen($episode['season']) == 1 ? '0'.$episode['season'] : $episode['season']).
					     		'E'.(strlen($episode['episode'])==1 ? '0'.$episode['episode'] : $episode['episode'])}}</td></a>
					     	<td class="align-middle">{{$episode['air_date']}}</td>
					     	<td class="align-middle">

					     	<form action="{{ route('twitter.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="episode" value="{{'S'.(strlen($episode['season']) == 1 ? '0'.$episode['season'] : $episode['season']).
					     		'E'.(strlen($episode['episode'])==1 ? '0'.$episode['episode'] : $episode['episode'])}}">
                                <input type="hidden" name="search" value="{{$tvShow['name']}}">
                                <input type="hidden" name="link" value="{{$tvShow['id']}}">
                                <input type="hidden" value="{{$episode['air_date']}}" name="from">
                                                           						                         
					     		<a onclick="this.closest('form').submit();return false;" class="text-Otitle">{{$episode['name']}}
					     		</a>
					     	</form>
					     </td>
					     	<td><a href=""><img style="height: 25px; width: 25px" src="../img/twitter_logo.png"></a></td>
					    </tr>
				   	@endforeach
				  </tbody>
				</table>
		    </div>
  		@for($i=2; $i <= count($tvShow['seasons']); $i++)
  			<div id="menu{{$i}}" class="tab-pane fade in active">
		      	<table class="table table-hover table-dark">
				  <thead class="dark-light-card">
				    <tr>
				    	<th class="text-Otitle" scope="col">Episode</th>
				     	<th class="text-Otitle" scope="col">Date</th>					     	
				     	<th class="text-Otitle" scope="col">Name</th>
				     	<th></th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tvShow['seasons'][$i] as $episode)
					    <tr>	    
					    	<a><td class="align-middle">
					     		{{'S'.(strlen($episode['season']) == 1 ? '0'.$episode['season'] : $episode['season']).
					     		'E'.(strlen($episode['episode'])==1 ? '0'.$episode['episode'] : $episode['episode'])}}</td></a>
					     	<td class="align-middle">{{$episode['air_date']}}</td>
					     	<td class="align-middle">

					     	<form action="{{ route('twitter.search')}}" method="post">
                                @csrf
                                <input type="hidden" name="episode" value="{{'S'.(strlen($episode['season']) == 1 ? '0'.$episode['season'] : $episode['season']).
					     		'E'.(strlen($episode['episode'])==1 ? '0'.$episode['episode'] : $episode['episode'])}}">
                                <input type="hidden" name="search" value="{{$tvShow['name']}}">
                                <input type="hidden" name="link" value="{{$tvShow['id']}}">
                                <input type="hidden" value="{{$episode['air_date']}}" name="from">
                                                           						                         
					     		<a onclick="this.closest('form').submit();return false;" class="text-Otitle">{{$episode['name']}}
					     		</a>
					     	</form>
					     </td>
					     	<td><a href=""><img style="height: 25px; width: 25px" src="../img/twitter_logo.png"></a></td>
					    </tr>
				   	@endforeach
				  </tbody>
				</table>
		    </div>
		@endfor
	</div>
						</div>
	            	</div>
	            </div>
            </div>

        </div>
    </div>
</div>
@endsection
