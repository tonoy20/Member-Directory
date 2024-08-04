@extends('frontend.layouts.master')

@section('content')
    <?php
    /* echo $about; */
    /* echo $events;
       echo $notices; */
    ?>


    <?php
    /*  echo $about;  */
    /*  echo $events;  */
    /*  echo $notices;    */
    /*  echo $carosel->image2; */
    ?>

    <style>
        body {
            overflow-x: hidden !important;
        }

        .hero-img {
            width: 100% !important;
            height: 45rem !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

        }
    </style>

    {{-- hero --}}

    <div class="row align-items-center justify-content-between">
        <div class="" data-aos="fade-up" data-aos-delay="400">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 1,
                  "spaceBetween": 1
                }
              }
            }
          </script>
                <div class="swiper-wrapper">
                    @if ($carosel)
                        <div class="swiper-slide">
                            <div class="hero-img" style="background-image: url('{{ asset($carosel->image1) }}')"></div>
                        </div>

                        <div class="swiper-slide">
                            <div class="hero-img" style="background-image: url('{{ asset($carosel->image2) }}')"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-img" style="background-image: url('{{ asset($carosel->image3) }}')"></div>
                        </div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    </div>


    {{-- about --}}


    @if ($about)
        <section id="blog-posts" class="blog-posts section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" data-aos-delay="200">
                <h1>About</h1>
            </div><!-- End Section Title -->


            <div class="container about_section" data-aos="fade-up">
                <div class="row">
                    <div class="col about-content">
                        <h4 class="pb-lg-3">{{ $about->header }}</h4>
                        <p id="about-paragraph" class="col-11">{{ $about->about }}</p>
                    </div>
                    <div class="col about-image">
                        <img class="img-fluid" src="{{ asset($about->image) }}" style="height: 390px" alt="">
                        {{-- <img class="img-fluid" src="{{ asset('uploads/about/1721890450.png') }}" alt=""
                            style="height: 390px"> --}}
                    </div>
                </div>


            </div>

        </section>
    @endif

    @if ($events)
        <!-- event Posts Section -->
        <section id="blog-posts" class="blog-posts section event_all">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up" data-aos-delay="200">
                <h1>Events</h1>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row gy-4" id="event">
                    @foreach ($events as $e)
                        <div class="col-md-6 col-lg-4 event_section">
                            <a href="{{ route('frontend.event_show', $e->id) }}">
                                <div class="post-entry event_img" data-aos="fade-up">
                                    <div class="thumb d-block ps-lg-4 pb-lg-3"> <img src="{{ asset($e->image) }}"
                                            alt="Image" class="img-fluid rounded"></div>
                                    <div class="post-content">
                                        <h3>{{ $e->header }}</h3>
                                        <p>{{ $e->formatted_date }}</p>

                                        <p id="event-paragraph">{{ $e->paragraph }}</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach



                </div>
            </div>
        </section><!-- /Blog Posts Section -->
    @endif



    <div class="text-center" style="
    padding-left: 11%;
">
        <a href="{{ route('frontend.events') }}" type="button" class="btn btn-dark">See More Events</a>
    </div>

    @if ($notices)
        <section id="blog-posts" class="blog-posts section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h1>Notice</h1>
            </div><!-- End Section Title -->
            <div class="post-entry" data-aos="fade-up" data-aos-delay="200">
                <div class="container">
                    <div class="table-responsive bg-white shadow rounded p-lg-5 notice_section">
                        <table class="table mb-0 table-center">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-bottom" style="min-width: 300px;"></th>
                                    <th scope="col" class="border-bottom text-center" style="max-width: 150px;">Published
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $e)
                                    <tr>
                                        <td>
                                            <a href="{{ route('frontend.notice_show', $e->id) }}">
                                                <div class="d-flex">
                                                    <i class="bi bi-chat"></i>
                                                    <div class="flex-1 content ms-3">
                                                        <div class="forum-title fw-bold">{{ $e->header }}</div>
                                                        <p class="text-muted small mb-0 mt-2">
                                                        <div style="color:black">Read More</div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="text-center small h6">
                                            <a href="{{ route('frontend.notice_show', $e->id) }}">
                                                {{ $e->formatted_date }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{--  --}}
            {{-- <div class="container">
        <div class="row gy-4">
            @foreach ($notices as $e)
                <div class="col-md-6 col-lg-4 event_section">
                    <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" class="thumb d-block  ps-lg-4 pb-lg-3"> <img src="{{ asset($e->image) }}"
                                alt="Image" class="img-fluid rounded"></a>

                        <div class="post-content">
                            <h3><a href="#">{{ $e->header }}</a></h3>
                            <p id="notice-paragraph">
                                {{ $e->paragraph }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

            {{--  --}}

        </section><!-- /Blog Posts Section -->
    @endif
    <!-- notice Posts Section -->


    <div class="text-center" style="
    padding-left: 11%;
">
        <a href="{{ route('frontend.notices') }}" type="button" class="btn btn-dark">See More Notices</a>
    </div> <br> <br><br> <br><br> <br>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

            //about section 
            function toggleColClass() {
                const content = document.querySelector('.about-content');
                const image = document.querySelector('.about-image');
                if (window.innerWidth <= 768) {
                    content.classList.remove('col');
                    image.classList.remove('col');
                } else {
                    content.classList.add('col');
                    image.classList.add('col');
                }
            }

            // Initial check
            toggleColClass();

            // Check on window resize
            window.addEventListener('resize', toggleColClass);

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


            let notices = document.querySelectorAll('#notice-paragraph');
            console.log(notices);
            notices.forEach(function(e) {
                truncateText(e, 150);
            });

            let about = document.querySelector('#about-paragraph');
            truncateText(about, 300);


        });
    </script>
@endsection



@section('script')
    <script></script>
@endsection
