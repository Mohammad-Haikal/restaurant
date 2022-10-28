<div data-aos="fade-up" class="col-sm-4 col-md-3 col-lg-2 m-1 bg-white shadow-sm">
    <a class="text-decoration-none text-reset h-100" href="/item/{{ $item['id'] }}">
        <div class="p-1">
            <div class="d-flex align-items-center mb-1 balanced-img overflow-hidden">
                <img class="img-fluid " src='{{ asset('storage/'.$item['img']) }}'>
            </div>
            <small class="text-muted">{{ $item->category['name'] }}</small>
            <h4 class="">{{ $item['title'] }}</h4>
            <p class="text-danger ">{{ $item['price'] }} JD</p>
        </div>
    </a>
</div>
