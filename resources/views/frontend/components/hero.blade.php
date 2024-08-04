<style>
    body{
        overflow-x: hidden !important;
    }
    .hero-img{
        width: 100% !important;
        height: 30rem !important;
    
    }
        
</style>

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
            <div class="swiper-slide">
                <img src="{{asset('image')}}/member/430465408_3455208367958099_1359621116120225725_n.webp" alt="Image" class="hero-img">
            </div>
            <div class="swiper-slide">
              <img src="{{asset('image')}}/member/429566273_3455208294624773_8048377934120357519_n.webp" alt="Image" class="hero-img">
            </div>
            <div class="swiper-slide">
                <img src="{{asset('image')}}/member/429480237_3455208421291427_5914572328710027105_n.webp" alt="Image" class="hero-img">
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
     
    </div>
