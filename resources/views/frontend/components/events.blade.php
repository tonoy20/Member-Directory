@extends('frontend.layouts.master')

@section('content')
    <!-- event Posts Section -->
    <section id="blog-posts" class="blog-posts section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h1>Events</h1>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row gy-4">
                @foreach ($events as $e)
                    <div class="col-lg-4 col-md-6 event_section">
                        <a href="{{ route('frontend.event_show', $e->id) }}">
                            <i class="fa-regular fa-pen-to-square"></i>

                            <div class="post-entry event_img" data-aos="fade-up" data-aos-delay="100">
                                <div class="thumb d-block ps-lg-4 pb-lg-3"> <img src="{{ asset($e->image) }}" alt="Image"
                                        class="img-fluid rounded"></div>
                                <div class="post-content">
                                    <h3>{{ $e->header }}</h3>
                                    <p id="event-paragraph">
                                        {{ $e->paragraph }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach



            </div>
        </div>
    </section><!-- /Blog Posts Section -->
    <script>
        function removePseudoElementBackground() {
            // Create a new style element
            const style = document.createElement('style');
            style.innerHTML = `
            .section-title::after {
                background: none !important;
            }
        `;
            // Append the style element to the document head
            document.head.appendChild(style);
        }

        // Call the function to remove the background
        removePseudoElementBackground();
        //tuncate text
        function truncateText(element, maxLength) {
            let text = element.textContent;
            if (element) {
                let text = element.textContent;
                if (text.length > maxLength) {
                    const truncatedText = text.substring(0, maxLength);
                    const fullText = text; // Store full text for future use

                    // Create the "see more" span with inline CSS
                    const seeMoreSpan = `<span style="color: #0dcaf0; cursor: pointer;">(see more)</span>`;

                    // Set the truncated text with the "see more" span
                    element.innerHTML = truncatedText + "..." + seeMoreSpan;
                }
            }
        }


        let events = document.querySelectorAll('#event-paragraph');
        console.log(events);
        events.forEach(function(e) {
            truncateText(e, 150);
        });
    </script>
@endsection
