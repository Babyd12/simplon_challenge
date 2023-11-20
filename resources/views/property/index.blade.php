@extends('base')

@section('title', 'Tous nos bien')

@section('content')
{{-- {{  dd($input['price'])}} --}}
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">   
            <input type="text" name="price" placeholder="Buget max" class="form-control"  value=" {{ $input['price'] ?? '' }} " >
        </form>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-3 my-4">
                    @include('property.card')
                </div>
            @endforeach
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>


@stop
