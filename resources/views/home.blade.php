@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}

{{--                        You are normal user.--}}

{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                    --}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>


    <div class="row">

        <div class="col-md-12" id="app">

            <div class="flex bg-gray-100 border-b border-gray-300 py-4">
                <div class="container mx-auto">
                    <h3>
                        <router-link :to ="'/Home'">Home</router-link>
                        <router-link :to ="'/category'">Categories</router-link>
                    </h3>
                </div>
            </div>
            <div class="container mx-auto">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
@endsection

