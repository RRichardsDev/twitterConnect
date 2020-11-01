@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tweets') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <form action='{{ route('twitter.tweet') }}' method="post" >
                        @csrf
                        <div class="form-group m-4"> 
                            <div>                       
                                <label for="tweet">Tweet</label>
                            </div>
                            <div>
                                <textarea class="form-control" rows="3" name="tweet" id="tweet" placeholder="Type a tweet......"></textarea>
                            </div>
                        </div>    
                        <button class="btn btn-primary">Tweet</button>                                                            
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
