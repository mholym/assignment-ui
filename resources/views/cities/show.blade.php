@extends('layout.app')

@section('content')

<div class="row my-auto">
    <div class="mx-auto my-auto container-links">
        <h1 class="text-center mt-5 mb-5">Detail obce</h1>
        <div class="row detail-table mb-5">
            <div class="col-6 p-5 detail-text">
                <div class="row">
                    <div class="col-6 p-2">
                        <strong>Meno starostu:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->mayor_name}}
                    </div>
                    <div class="col-6 p-2">
                        <strong>Adresa obecného úradu:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->city_hall_address}}
                    </div>
                    <div class="col-6 p-2">
                        <strong>Telefón:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->phone}}
                    </div>
                    <div class="col-6 p-2">
                        <strong>Fax:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->fax}}
                    </div>
                    <div class="col-6 p-2">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->email}}
                    </div>
                    <div class="col-6 p-2">
                        <strong>Web:</strong>
                    </div>
                    <div class="col-6 p-2">
                        {{$city->web_address}}
                    </div>
                </div>
            </div>
            <div class="col-6 p-5 text-center">
                <h2>{{$city->name}}</h2>
            </div>
        </div>
    </div>
</div>

@endsection
