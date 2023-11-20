<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h5> <a href=" {{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property,  ] ) }} "> {{ $property->title }}</a></h5>
        <p class="card-text"> {{ $property->surface }}m² - {{ $property->postal_code }} </p>
        <div class="text-primary fw-bold " style="font-size:1.4em;">
            {{ number_format($property->price, thousands_separator: '') }}$
        </div>
    </div>
</div>

