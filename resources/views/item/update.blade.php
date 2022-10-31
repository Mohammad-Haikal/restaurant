<x-template>
    <main class="container mt-3">
        <h1>Update Item</h1>
        <img class="img-fluid col-md-4 mb-3 rounded shadow-sm" src="{{ asset( $item['img']) }}" alt="">
        <form action="/updateItem/{{ $item['id'] }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label class="form-label" for="img">Image</label>
                <input class="form-control" id="img" name="img" type="file" accept="image/png, image/jpeg">
            </div>

            <div class="mb-2">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" id="title" name="title" type="text" value="{{$item['title']}}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Category</label>
                <div>
                    @foreach ($categories as $category)
                        <input class="btn-check" id="{{ $category['id'] }}" name="category_id" type="radio" value="{{ $category['id'] }}" autocomplete="off" {{$item['category_id'] == $category['id'] ? 'checked' : ''}}>
                        <label class="btn btn-outline-secondary" for="{{ $category['id'] }}">{{ $category['name'] }}</label>
                    @endforeach
                </div>
            </div>

            <div class="mb-2">
                <label class="form-label" for="price">Price</label>
                <input class="form-control" id="price" name="price" type="number" step="0.01" value="{{$item['price']}}" required>
            </div>

            <div class="mb-2">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control form-control-sm mb-3" id="description" name="description" rows="3" required>{{$item['description']}}</textarea>
            </div>

            <div class="mb-2">
                <a class="btn btn-secondary my-3" href="/dashboard/items">&#8249; Back</a>
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </form>

    </main>
</x-template>
