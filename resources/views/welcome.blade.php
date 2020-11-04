@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="container mt-2">
        <img src="img/arrow-left-v2.png" alt="Prev" id="prev">

        <div id="slider">
            <div class="slide">
                {{-- <div class="slide-copy">
                    <a href="{{ route('summary', $tvShows['0']['id']) }}"><h2 class="text-Otitle">{{$tvShows['0']['name']}}</h2></a>
                </div> --}}
                    <a href="{{ route('summary', $tvShows['0']['id']) }}"><img src="https://cartermatt-bgmyzuarasgpknxgxbrs.netdna-ssl.com/wp-content/uploads/2015/08/Flash-Logo-2-e1447915889386.jpg"></a>
                
            </div>

            <div class="slide">
                {{-- <div class="slide-copy">
                     <a href="{{ route('summary', $tvShows['1']['id']) }}"><h2 class="text-Otitle">{{$tvShows['1']['name']}}</h2></a>
                </div> --}}
                 <a href="{{ route('summary', $tvShows['1']['id']) }}"><img src="https://www.artofthetitle.com/assets/resized/sm/upload/2m/bq/8x/bi/got_logo-0-1080-0-0.jpg?k=a9a79a2f30"></a>
            </div>

            <div class="slide ">
                {{-- <div class="slide-copy">
                     <a href="{{ route('summary', $tvShows['2']['id']) }}"><h2 class="text-Otitle">{{$tvShows['2']['name']}}</h2></a>   
                </div> --}}
                 <a href="{{ route('summary', $tvShows['2']['id']) }}"><img src="https://silvaworld.org/wp-content/uploads/2020/03/Fadeout_title_card.png"></a>
            </div>

            <div class="slide">
                {{-- <div class="slide-copy">
                     <a href="{{ route('summary', $tvShows['3']['id']) }}"><h2 class="text-Otitle">{{$tvShows['3']['name']}}</h2></a>   
                </div> --}}
                 <a href="{{ route('summary', $tvShows['3']['id']) }}"><img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4bb4b741702225.5e8305494f6f4.jpg"></a>
            </div>

            <div class="slide">
                {{-- <div class="slide-copy">
                     <a href="{{ route('summary', $tvShows['4']['id']) }}"><h2 class="text-Otitle">{{$tvShows['4']['name']}}</h2></a>   
                </div> --}}
                 <a href="{{ route('summary', $tvShows['4']['id']) }}"><img src="http://www.kryptonsite.com/wp-content/uploads/2017/09/S020X-O09-SPG-110-23-640x300.jpg"></a>
            </div>
        </div>
        <img src="img/arrow-right-v2.png" alt="Next" id="next">
    </div>
        {{-- CONTENT --}}
        <div class="col-md-10 pt-2">
            <div style="background-color: #333;" class="card dark-card">
                <div class="card-body">
                    <div class=row>
                        <div class="col pl-1 pr-1"><a class="text-Otitle" style="font-size: 23px;" href="{{route('searchTvShowAlpha', "A")}}">A</a></div>
                        @foreach($alphabet as $letter)
                            <div class="col pr-1"><a class="text-Otitle" style="font-size: 23px;" href="{{route('searchTvShowAlpha', $letter)}}">{{$letter}}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-10 mt-2">
            <div class="container">
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
