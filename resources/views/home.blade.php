@php
    if(Auth::id() == 2){
        $extend = 'layouts.adminBar';
    }else {
        $extend = 'layouts.app';
    }
@endphp

@extends($extend)

{{-- @if(Auth::id() == 1)

@endif --}}

{{-- <h1>{{Auth::id()}}</h1> --}}
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Dashboard') }} {{Auth::user()->role->name}}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection