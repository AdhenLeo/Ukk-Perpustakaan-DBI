{{-- <section class="home section" id="home">
    <div class="home__container container grid">
        <div class="home__data">
            <h1 class="home__title">
                Deciding
                what <br> to read next?

            </h1>
            <p class="home__description">
                Find the best e-books from your favorites writers, explore hundreds of books with all possible categories
            </p>
            <a href="" class="button">
                explore now
            </a>
        </div>
       <div class="home__images container">
        <div class="home__swiper swiper">
            <div class="swiper-wrapper">
                @foreach ($buku as $item)
                    <article class="home__article swiper-slide">
                        <img src="{{ asset('storage/buku/' . $item->sampul) }}" alt="" class="home__img">
                    </article>
                @endforeach
            </div>
        </div>
</div>

    </div>
 </section> --}}

 <div class="banner_section layout_padding">
    <div class="container" style="display: flex;">
       <div class="row">
          <div class="col-md-10">
             <div class="banner_taital">Enjoy <br>The Books Read And Feel It</div>
             <p class="banner_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
             <div class="see_bt"><a href="#">See More</a></div>
          </div>
       </div>
        <div class="home__images container">
            <div class="home__swiper swiper">
                <div class="swiper-wrapper">
                    @foreach ($buku as $item)
                        <article class="home__article swiper-slide">
                            <img src="{{ asset('storage/buku/' . $item->sampul) }}" alt="" class="home__img">
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 </div>
