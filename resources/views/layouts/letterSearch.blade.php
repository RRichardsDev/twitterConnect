
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