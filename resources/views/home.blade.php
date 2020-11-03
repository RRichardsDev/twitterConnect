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

                            <form action='{{ route('twitter.tweet') }}' method="post" >
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
                    <div class="card dark-light-card m-2">
                        <div class="m-2">
                            {{-- tweet content --}}
                            <div class="row">
                                <div class="col-1 pr-0">
                                    <img class="tweet-icon" src="https://www.dacbeachcroft.com/media/78343/richards-rhodri.jpg?center=0.3828125,0.50520833333333337&mode=crop&width=750&height=750&rnd=131793357480000000&quality=80" alt="">
                                </div>
                                <div class="col-11 pl-0">
                                    <h5 class= "text-Otitle">Rhodri Richards 
                                        <span class="minimal-gray">14h ago</span></h5>
                                <p>I think that arrow was really good, except for the fact that he is too rightjous some times. But appart from that the show is awsome! <span class="hashtag"> #arrow #loveIt </span></p>
                                </div>                        
                            </div>
                        </div>
                    </div>
                     {{-- additional testing --}}
                    <div class="card dark-light-card m-2">
                        <div class="m-2">                           
                            <div class="row">
                                <div class="col-1 pr-0">
                                    <img class="tweet-icon" src="https://i.pinimg.com/280x280_RS/e0/b1/ad/e0b1ad4945ef45e5567936b0914a56d6.jpg" alt="">
                                </div>
                                <div class="col-11 pl-0">
                                    <h5 class= "text-Otitle">David Richards
                                        <span style="color:gray; font-size: 10px;">10s ago</span></h5>
                                <p>No i dont agree with you <span class="hashtag">@Rhodri_Richards</span> i think the opposite! Although i do agree the program is great. <span class="hashtag"> #arrow #iDontAgree </span></p>
                                </div>                        
                            </div>
                            {{-- testing end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

