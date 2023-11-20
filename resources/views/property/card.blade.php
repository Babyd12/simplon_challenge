<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h5><a href="http://">{{$property -> title}}</a></h5>
            <p class="card-text"> {{$property -> surface}}m² - {{ $property -> postal_code }} </p>
            <div class="text-primary bold " style="font-size:1.4em;" >
                {{ number_format($property-> price , thousands_separator) }}$
            </div>
        </div>
    </div>
</div>