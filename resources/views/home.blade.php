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


{{--            <div class="flex bg-gray-100 border-b border-gray-300 py-4">--}}
{{--                <div class="container mx-auto">--}}
{{--                    <h3>--}}
{{--                        <router-link :to ="'/Home'">Home</router-link>--}}
{{--                        <router-link :to ="'/sliderhome'">Slider</router-link>--}}
{{--                        <router-link :to ="'/category'">Categories</router-link>--}}
{{--                        <router-link :to ="'/pages'" >About Us</router-link>--}}
{{--                        <router-link :to ="'/contactus'" >Contact Us</router-link>--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            </div>--}}


            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navbar-nav">
                            <router-link :to ="'/Home'" class="nav-link" aria-current="page" >Home</router-link>
                            <router-link :to="'/category'" class="nav-link" >Category</router-link>
                            <a href="#"  class="nav-link" >Products</a>
                            <router-link :to ="'/pages'" class="nav-link">About Us</router-link>
                            <router-link :to ="'/contactus'" class="nav-link">Contact Us</router-link>
                        </div>
                    </div>
                </div>
            </nav>


            <div class="container mx-auto">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
@endsection

