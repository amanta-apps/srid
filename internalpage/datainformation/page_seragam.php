<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .swiper {
        width: 100%;
        max-width: 1000px;
        height: 400px;
        /* tinggi slider */
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 250px;
        /* penting: kasih width! */
        height: 300px;
        /* biar tidak gepeng */
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        overflow: hidden;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover !important;
    }

    .swiper-button-next,
    .swiper-button-prev {
        width: 30px;
        height: 30px;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 18px;
    }
</style>
<section>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $sql = mysqli_query($conn, "SELECT drtext FROM table_datadirections WHERE directionsid=14");
            if (mysqli_num_rows($sql) <> 0) {
                $r = mysqli_fetch_array($sql);
                $dir = $r['drtext'];
            }
            $temp = $dir;

            $r = mysqli_fetch_array(mysqli_query($conn, "SELECT srgmid FROM table_datasrgm_h ORDER BY createdon DESC"));
            $srgmid = $r['srgmid'];
            $query = mysqli_query($conn, "SELECT imgseragam FROM table_datasrgm_d WHERE srgmid='$srgmid'");
            while ($r = mysqli_fetch_array($query)) { ?>
                <div class="swiper-slide"><img src="<?= $temp . $r['imgseragam'] ?>"></div>' ;
            <?php
            }
            ?>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        slidesPerView: "auto", // auto, tapi butuh width di .swiper-slide
        coverflowEffect: {
            rotate: 40,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>