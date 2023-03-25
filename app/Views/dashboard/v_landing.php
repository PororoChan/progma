<?= $this->include('split/v_headless') ?>
<style>
    div#curve-line {
        width: 250px;
        height: 2px;
        background-color: #696CFF;
        position: absolute;
        margin-top: calc(50vh - 10%);
    }

    .splide__slide {
        display: flex;
        justify-content: center;
    }

    .splide__slide img {
        width: 400px;
        object-fit: contain;
        filter: drop-shadow(0 0 0.35rem #696CFF);
    }

    .blobs {
        width: 500px;
        height: 500px;
        position: absolute;
        top: 10%;
    }
</style>
<div class="content-wrapper" id="landing-content">
    <div class="container-xxl flex-grow-1 container-p-y">
        <section class="section h-100" id="section1">
            <div class="row h-100">
                <div class="blobs">
                    <img src="<?= base_url('public/assets/img/blob/animated.svg') ?>" alt="">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="splide w-100 h-100" aria-labelledby="carousel-heading">
                        <div class="splide__track py-2">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/reminder.svg') ?>" alt="gmbar">
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/join.svg') ?>" alt="gmbar">
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/file_manager.svg') ?>" alt="gmbar">
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/online_disscuss.svg') ?>" alt="gmbar">
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/multitasking.svg') ?>" alt="gmbar">
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('public/assets/img/home/social_sharing.svg') ?>" alt="gmbar">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex" style="padding-top: 150px; padding-bottom: 175px;">
                    <div>
                        <h2 class="text-primary">ProgMa</h2>
                        <span class="fw-normal fs-4">
                            adalah sebuah <span class="fw-semibold text-primary">Aplikasi Website</span> yang digunakan untuk membantu siswa dan guru pembimbing untuk melakukan <span class="text-primary fw-semibold">bimbingan</span> tugas atau project
                        </span>
                    </div>
                    <div id="curve-line"></div>
                </div>
            </div>
        </section>
    </div>
</div>
<?= $this->include('split/v_footer') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var splide = new Splide('.splide', {
            type: 'loop',
            autoplay: 'play',
            perPage: 1,
        });
        splide.mount();
    });

    $(document).ready(function() {
        setTimeout(() => {
            $("#landing-content").fadeIn(350)
        }, 500);

    })
</script>