@extends('layout.app')

@section('content')
    <div class="row wrapper my-auto text-center">
        <div class="mx-auto my-auto container-links">
            <div class="main-form-wrapper">
                <h1 class="text-white">Vyhľadať v databáze obcí</h1>
                <div class="main-form">
                    <form action="" method="GET">
                        <input class="form-control" id="autocompleteInput" type="text" placeholder="Zadajte názov|" value="">
                    </form>
                    <div id="autocompleter" class="bg-white">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
