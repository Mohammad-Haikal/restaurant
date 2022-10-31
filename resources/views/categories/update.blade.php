<x-template>
    <main class="container mt-3">
        <h1>Update Category</h1>
        <img class="img-fluid shadow-sm rounded col-md-4 mb-3" src="{{ asset( $category['img']) }}" alt="">
        <form action="/updateCategory/{{ $category['id'] }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" name="name" type="text" value="{{ $category['name'] }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label" for="img">Image</label>
                <input class="form-control" id="img" name="img" type="file" accept="image/png, image/jpeg">
            </div>
            <div class="mb-2">
                <a class="btn btn-secondary my-3" href="/dashboard/categories">&#8249; Back</a>
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>

    </main>
</x-template>
