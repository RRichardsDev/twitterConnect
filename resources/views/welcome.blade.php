@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        </div>
        <div id="container mt-2">
        <img src="img/arrow-left-v2.png" alt="Prev" id="prev">

        <div id="slider">
            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">{{$tvShows['0']['name']}}</h2>       
                </div>
                <img src="https://cartermatt-bgmyzuarasgpknxgxbrs.netdna-ssl.com/wp-content/uploads/2015/08/Flash-Logo-2-e1447915889386.jpg">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">{{$tvShows['1']['name']}}</h2>  
                </div>
                <img src="https://www.denofgeek.com/wp-content/uploads/2020/02/thrones_last.png">
            </div>

            <div class="slide ">
                <div class="slide-copy">
                    <h2 class="text-Otitle">{{$tvShows['2']['name']}}</h2>      
                </div>
                <img src="https://silvaworld.org/wp-content/uploads/2020/03/Fadeout_title_card.png">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">{{$tvShows['3']['name']}}</h2>      
                </div>
                <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4bb4b741702225.5e8305494f6f4.jpg">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">{{$tvShows['4']['name']}}</h2>      
                </div>
                <img src="http://www.kryptonsite.com/wp-content/uploads/2017/09/S020X-O09-SPG-110-23-640x300.jpg">
            </div>
        </div>
        <img src="img/arrow-right-v2.png" alt="Next" id="next">
    </div>
        {{-- CONTENT --}}
        
        <div class="col-md-10 mt-5">
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
