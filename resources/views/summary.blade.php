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
		                	<div class="col-md-3 video-summary-img-container" ><img class="video-summary-img" src="https://static.episodate.com/images/tv-show/thumbnail/29560.jpg"></div>
		                	<div class="col-md-8" >
		                		<h2 class="pull-left mb-3 text-Otitle"> Arrow </h2>
		                		<h5>Description</h5>
		                		<div class="summary-description">
		                		<p>Arrow is an American television series developed by writer/producers Greg Berlanti, Marc Guggenheim, and Andrew Kreisberg. It is based on the DC Comics character Green Arrow, a costumed crime-fighter created by Mort Weisinger and George Papp. It premiered in North America on The CW on October 10, 2012, with international broadcasting taking place in late 2012. Primarily filmed in Vancouver, British Columbia, Canada, the series follows billionaire playboy Oliver Queen, portrayed by Stephen Amell, who, five years after being stranded on a hostile island, returns home to fight crime and corruption as a secret vigilante whose weapon of choice is a bow and arrow. Unlike in the comic books, Queen does not go by the alias \"Green Arrow\". The series takes a realistic look at the Green Arrow character, as well as other characters from the DC Comics universe. Although Oliver Queen/Green Arrow had been featured in the television series Smallville from 2006 to 2011, the producers decided to start clean and find a new actor (Amell) to portray the character. Arrow focuses on the humanity of Oliver Queen, and how he was changed by time spent shipwrecked on an island. Most episodes have flashback scenes to the five years in which Oliver was missing.",
    </p>		                		
		                	</div>
		                	</div>
		                
			                	<div class="col-md-3"> 
		                			<div class="thumb-carosel-container">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/tv-show/thumbnail/29560.jpg">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/episode/29560-242.jpg">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/episode/29560-804.jpg">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/episode/29560-664.jpg">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/episode/29560-120.jpg">
		                				<img class="video-thumb-sm" src="https://static.episodate.com/images/episode/29560-764.jpg">
		                			</div> 
		                		</div>		         		                		
	                	
	                		<div class="col-md-8"> <hr class="break-line"> </div>
	                	</div>

	                	<div class="row">
	                		<div class="col-md-3"> </div>
	                		<div class="col-md-4 align-self-end"><p><span class="font-weight-bold">Genres: </span>
	                			{{-- @foreach($tvshow.genres as $genre)
		                			@if($genre == end($tvshow.genres) )
		                				<p> $genre </p>
		                			@else
		                				<p> $genre |  </p>
	                				@endif
	                			@endforeach --}}
	                			<span class="text-links">Drama</span> | <span class="text-links">Action</span> | <span class="text-links">Si-Fi</p></span>
		                		</p>
		                	</div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Status:</span>
	                			Ended</p>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-3"></div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Channel: </span>
	                		HBO (US)</p></div>
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">Start Date: </span>
	                		2012-10-10</p></div>
	                		
	                	</div>
	                	<div class="row">
	                		<div class="col-md-3"></div>	                		
	                		<div class="col-md-4 align-self-end font-weight-light font-italic"><p><span class="font-weight-bold">End Date:</span> 
	                		Unknown </p></div>
	                		<div class="col-md-4"></div>
	                		
	                	</div>

	                </div>
                </div>
            </div>

            <div class="card dark-card mt-4">
            	<div class="card dark-card">
            		<div class="card-body min-height-3">
	            		<h2 class="pull-left mb-3 text-Otitle"> Episodes </h2>
	            	</div>
	            </div>
            </div>

        </div>
    </div>
</div>
@endsection
