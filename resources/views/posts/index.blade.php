@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Posts</div>
	                <div class="card-body pt-0">
	                    @if (session('status'))
	                        <div class="alert alert-success" role="alert">
	                            {{ session('status') }}
	                        </div>
	                    @endif
	                    <a href ="https://twitter.com/marbzin">b - the album ✨</a>
	                     <a href="https://twitter.com/AMagicWriter" target="_blank">@AMagicWriter</a> I went off the guy who plays Flash after he throttled one his own fans in Iceland.                 
	                </div>

            </div>
        </div>
    </div>
</div>
@endsection
