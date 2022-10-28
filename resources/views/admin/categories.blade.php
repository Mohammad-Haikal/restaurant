<x-template>
    <main class="row g-0">
        @include('partials._admin-sidebar')
        <div class="col p-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1 class="mb-0">Categories</h1>
                <!-- Button trigger modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal" type="button"><i class="bi me-1 bi-plus"></i>New Category</button>

            </div>
            <div class="justify-content-center">
                @if (count($categories) == 0)
                    <p>No categories found</p>
                @else
                    <ul class="list-group shadow-sm">
                        @foreach ($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a class="fs-5 link-dark text-decoration-none text-capitalize" href="/category/{{ $category['id'] }}">
                                    <span class="badge me-1 bg-danger rounded-1">{{ count($category->items) }}</span>
                                    {{ $category['name'] }}
                                </a>
                                <div class="d-flex">
                                    <form action="/deleteCategory/{{ $category['id'] }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this category, it will delete all included items and orders?')">Delete</button>
                                    </form>
                                    <a class="btn btn-sm btn-primary ms-1" href="/editCategory/{{ $category['id'] }}">Edit</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </main>

</x-template>

<!-- Create Modal -->
<div class="modal fade" id="modal" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">New Category</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <form action="/addCategory" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{--  --}}
                    <div class="mb-2">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label" for="img">Image</label>
                        <input class="form-control" id="img" name="img" type="file" accept="image/png, image/jpeg" required>
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

