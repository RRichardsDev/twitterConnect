@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        </div>
        <div id="container mt-2">
        <img src="img/arrow-left.png" alt="Prev" id="prev">

        <div id="slider">
            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">Slider one</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>         
                </div>
                <img src="img/slide1.jpg">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">Slider Two</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur aLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.dipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>         
                </div>
                <img src="img/slide2.jpg">
            </div>

            <div class="slide ">
                <div class="slide-copy">
                    <h2 class="text-Otitle">Slider Three</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisiciLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>         
                </div>
                <img src="img/slide3.jpg">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">Slider Four</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>         
                </div>
                <img src="img/slide4.jpg">
            </div>

            <div class="slide">
                <div class="slide-copy">
                    <h2 class="text-Otitle">Slide Five</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisiLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.cing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>         
                </div>
                <img src="img/slide5.jpg">
            </div>
        </div>
        <img src="img/arrow-right.png" alt="Next" id="next">
    </div>
        {{-- CONTENT --}}
        
        <div class="col-md-10 mt-5">
            <div class="container">
              <div class="row">
                
                @for($i=1; $i<=12; $i++) 
                    <div class="col">
                        <div class="overlay">
                            <img class="video-thumb-img" src="https://static.episodate.com/images/tv-show/full/29560.jpg">
                        </div>
                        <a href="#"><h5 class="text-Otitle pt-1 pl-1">Video {{$i}}</h5></a>
                    </div>
                @endfor



                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
