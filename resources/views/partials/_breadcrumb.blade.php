<nav aria-label="breadcrumb py-1">
    <ol class="breadcrumb">
        @foreach ($pages as $page)
            <li class="breadcrumb-item"><a class="{{$page['style']}} text-decoration-none" href="{{$page['link']}}">{{$page['name']}}</a></li>
        @endforeach
    </ol>
</nav>
