@extends('frontend.layouts.master')

@section('content')
    <section id="blog-posts" class="blog-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h1>Notice</h1>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                @foreach ($notices as $e)
                    <div class="col-md-6 col-lg-4 event_section">
                        <a href="{{ route('frontend.notice_show', $e->id) }}">
                            <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
                                <div class="thumb d-block  ps-lg-4 pb-lg-3"> <img src="{{ asset($e->image) }}"
                                        alt="Image" class="img-fluid rounded"></div>

                                <div class="post-content">
                                    <h3>{{ $e->header }}</h3>
                                    <p>
                                        {{ $e->paragraph }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        function removePseudoElementBackground() {
            // Create a new style element
            const style = document.createElement('style');
            style.innerHTML = `
                .section-title::after {
                    background: none !important;
                }`;
            // Append the style element to the document head
            document.head.appendChild(style);
        }

        // Call the function to remove the background
        removePseudoElementBackground();
    </script>
@endsection
