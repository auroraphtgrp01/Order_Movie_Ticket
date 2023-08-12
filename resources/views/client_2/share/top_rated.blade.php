<section class="top-rated-movie tr-movie-bg2" data-background="/client_assets/img/bg/tr_movies_bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title title-style-three text-center mb-70">
                    <span class="sub-title">top rated movies</span>
                    <h2 class="title">Top Online Shows Watch</h2>
                </div>
            </div>
        </div>
        <div class="row movie-item-row">
            @foreach ($phimSapChieu as $key => $value)
                <div class="custom-col-">
                    <div class="movie-item movie-item-two">
                        <div class="movie-poster">
                            <img src="/client_assets/img/poster/s_ucm_poster01.jpg" alt="">
                            <ul class="overlay-btn">
                                <li><a href="/client_assets/https://www.youtube.com/watch?v=R2gbPxeNk2E"
                                        class="popup-video btn">Watch Now</a></li>
                                <li><a href="/client_assets/movie-details.html" class="btn">Details</a></li>
                            </ul>
                        </div>
                        <div class="movie-content">
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h5 class="title"><a href="/client_assets/movie-details.html">Message in a Bottle</a>
                            </h5>
                            <span class="rel">Adventure</span>
                            <div class="movie-content-bottom">
                                <ul>
                                    <li class="tag">
                                        <a href="/client_assets/#">HD</a>
                                        <a href="/client_assets/#">English</a>
                                    </li>
                                    <li>
                                        <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="tr-movie-btn text-center mt-25">
            <a href="/client_assets/#" class="btn">BROWSE ALL MOVIES</a>
        </div>
    </div>
</section>
