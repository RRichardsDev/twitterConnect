@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dark-card">

                <div class="card-body">
                    <div class=row>
                            <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form action='{{-- {{ route('twitter.tweet') }} --}}' method="post" >
                                @csrf
                                <div class="form-group mt-2">                     
                                    <div>
                                        <textarea class="form-control" rows="3" name="tweet" id="tweet" placeholder="Type a tweet......"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="minimal-gray">0 of out 280</p>
                        </div>
                    
                        <div class="col-6">
                            <button class="btn btn-orange float-r">   Send   </button>                       
                        </div>
                    </div>                                       
                    </form>                     
                </div>
            </div>
            <div class="card dark-card mt-2">
                <div class="card-body dark-card pt-0">
                    <h3 class=" p-2 text-Otitle">Tweets</h3>
                        @foreach($tweets as $tweet)
                            <div class="card dark-light-card m-2">
                                <div class="m-2">                           
                                    <div class="row">
                                        <div class="col-1 pr-0">
                                            <img class="tweet-icon" src="{{ $tweet['user']['profile_image_url'] }}" alt="">
                                        </div>
                                        <div class="col-11 pl-0">
                                            <h5 class= "text-Otitle">{!! $tweet['user']['name'] !!}
                                            <span style="color:gray; font-size: 10px;">{{$tweet['created_at']}}</span></h5>
                                            <p>{!!Twitter::linkify($tweet['text'])!!}</p>
                                        </div>                        
                                    </div>                            
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

