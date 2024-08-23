<x-navbar/>
<section class="carosel h-25">
    <x-carousel/>
</section>
<section class="blog mt-5">
    <div class="container">
        <div class="row">
            @forelse($blogs as $blog)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $blog->photo) }}" class="card-img-top" alt="Blog Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->excerpt }}</p>
                            <a href="" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No approved blogs found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<div class="footersection">
    <x-footer/>
</div>