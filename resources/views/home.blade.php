@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tweets') }}</div>

                <div class="card-body pt-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action='{{ route('twitter.tweet') }}' method="post" >
                        @csrf
                        <div class="form-group m-4">                     
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
