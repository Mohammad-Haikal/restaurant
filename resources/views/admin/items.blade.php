<x-template>
    <main class="row g-0">
        @include('partials._admin-sidebar')
        <div class="col p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="mb-0">Items</h1>
                <!-- Button trigger modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" type="button"><i class="bi me-1 bi-plus"></i>New Item</button>
            </div>

            {{-- Search Form --}}
            <h4 class="mb-0">Search Items</h4>
            <form class="row g-0 mb-1 py-2" method="GET" action="/dashboard/items">
                <input class="form-control me-2 col w-auto" name="search" type="text" value="{{ request('search') }}" placeholder="Search">
                <button class="btn btn-outline-primary col-2 w-auto" type="submit">Search</button>
            </form>

            {{-- Filter Form --}}
            <div class="accordion" id="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#collapseOne" type="button" aria-expanded="false" aria-controls="collapseOne">
                            {{--  --}}
                            Filter By Category
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapseOne" data-bs-parent="#accordion" aria-labelledby="headingOne">
                        {{--  --}}
                        <div class="accordion-body">
                            <form class="row g-0 py-2" method="GET" action="/dashboard/items">
                                <div class="form-check">
                                    <input class="form-check-input" id="all" name="category" type="radio" value="" onchange='this.form.submit();' {{ request('category') == null ? 'checked' : '' }}>
                                    <label class="form-check-label" for="all">All</label>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" id="{{ $category['id'] }}" name="category" type="radio" value="{{ $category['id'] }}" onchange='this.form.submit();' {{ request('category') == $category['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $category['id'] }}">{{ $category['name'] }}</label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($items) == 0)
                <p>No items found</p>
            @else
                <div class="overflow-auto">
                    <table class="table-striped mb-3 table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <h4>Image</h4>
                                </th>
                                <th scope="col">
                                    <h4>Title</h4>
                                </th>
                                <th scope="col">
                                    <h4>Category</h4>
                                </th>
                                <th scope="col">
                                    <h4>Price</h4>
                                </th>
                                <th scope="col">
                                    <h4>Description</h4>
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr class="align-items-center">
                                    <td>
                                        <a href="/item/{{ $item['id'] }}"><img class="h-auto" src="{{ asset('storage/' . $item['img']) }}" alt="image" style="width: 50px"></a>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0">{{ $item['title'] }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0">{{ $item->category['name'] }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0">{{ $item['price'] }} JD</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-wrap mb-0">{{ $item['description'] }}</p>
                                    </td>
                                    <td class="pe-0 align-middle">
                                        <form action="/deleteItem/{{ $item['id'] }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item, it will be deleted in all orders?')">Delete</button>
                                        </form>
                                    </td>
                                    <td class="ps-1 align-middle">
                                        <a class="btn btn-sm btn-primary ms-1" href="/editItem/{{ $item['id'] }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $items->links() }}
            @endif
        </div>
    </main>

</x-template>

<!-- Create Modal -->
<div class="modal fade" id="modal" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">New Item</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <form action="/addItem" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{--  --}}
                    <div class="mb-2">
                        <label class="form-label" for="img">Image</label>
                        <input class="form-control" id="img" name="img" type="file" accept="image/png, image/jpeg, image/jpg, image/gif, image/webp" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="title">Title</label>
                        <input class="form-control" id="title" name="title" type="text" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Category</label>
                        <div>
                            @foreach ($categories as $category)
                                <input class="btn-check" id="cat{{ $category['id'] }}" name="category_id" type="radio" value="{{ $category['id'] }}" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="cat{{ $category['id'] }}">{{ $category['name'] }}</label>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="price">Price</label>
                        <input class="form-control" id="price" name="price" type="number" step="0.01" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control form-control-sm mb-3" id="description" name="description" rows="3" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal" type="button">Close</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
