<x-template>
    <div class="min-vh-100 position-relative overflow-hidden">
        <div class="d-none d-sm-block bg-danger col-7 position-absolute start-100 top-0 vh-100 translate-middle-x" style=" z-index: 1;"></div>
        <div class="position-relative h-100 d-flex overflow-hidden">
            <img class="position-absolute top-0 start-0 h-100" style="opacity: 0.1" src="{{ asset('imgs/home-bg.jpg') }}" alt="">
            <div class="d-flex flex-column container flex-md-row justify-content-center">
                <div class="col-md-6 mb-md-0 d-flex flex-column justify-content-center align-items-center align-items-lg-start mb-5" style="z-index: 2" data-aos="fade-up">
                    <h1 class="mb-0 py-2 text-center text-lg-center " >Welcome to Alhanayen Restaurant!</h1>
                    <p class="mb-0 py-2 text-center" >{{__('words.home-title')}}</p>
                    @include('partials._search-bar')
                </div>
                <div class="col-md-6 d-flex align-items-center resMinVhHeight">
                    <img class="w-100 ms-auto p-3" data-aos="slide-up" data-aos-duration="700" ata-aos-easing="ease-out-cubic" src="{{ asset('imgs/home1.png') }}" style="z-index: 1;">
                </div>
            </div>
        </div>
        {{-- Red Bg (Mobile Screens) --}}
        <div class="d-sm-none bg-danger position-absolute start-0 top-100 w-100 h-50" style="transform: translateY(-75%); z-index: 0;"></div>
    </div>
    {{-- About Section --}}
    {{-- <section class="bg-white">
        <div class="row container mx-auto py-3">
            <div class="col-md-8 p-2" data-aos="fade-up">
                <h2>Our Story</h2>
                <p>In 1910, Grandfather Saber Al-Turk established Al-Kamal Restaurant for popular foods in Al-Ajami neighborhood in Jaffa. Thus, over the course of thirty-seven years, the restaurant expresses the ambitions of grandfather Saber and son Hashem to develop the restaurant and improve their conditions.</p>
            </div>

            <div class="col-md-4 py-3">
                <img class="img-fluid ms-auto rounded" data-aos="fade-up" src="{{ asset('imgs/story.jpg') }}">
            </div>
        </div>
    </section> --}}
    <section class="container mb-3 py-3">
        <h2 class="mb-3">Our Menu</h2>
        <div class="row g-2 justify-content-center">
            @if (count($categories) == 0)
                <p>No items found</p>
            @else
                @foreach ($categories as $category)
                    {{-- Category Card --}}
                    <x-cat-card :category="$category" />
                @endforeach
            @endif
        </div>
    </section>
</x-template>
