<div data-aos="fade-up" class="col-sm-4 col-lg-3">
    <a class="text-decoration-none text-reset" href="/category/{{ $category['id'] }}">
        <div class="position-relative overflow-hidden d-flex bg-img mb-2 rounded p-2 justify-content-center align-items-center text-white shadow" style="background-image: url('{{ asset($category['img']) }}');">
            <div class="bg-filter-layer"></div>
            <h3 class="text-capitalize" style="z-index: 1;">{{ $category['name'] }} <small class="fs-6" style="z-index: 1;">({{count($category->items)}})</small></h3>

        </div>
    </a>
</div>
