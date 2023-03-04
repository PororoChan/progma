<?= $this->include('split/v_headless') ?>
<div class="content-wrapper" id="landing-content">
    <div class="container-xxl flex-grow-1 container-p-y">
        <section class="section h-100" id="section1">
            <div class="row h-100">
                <div class="col-6 d-flex align-items-center">
                    <div id="carouselExampleIndicators" class="carousel slide shadow">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-6 d-flex" style="padding-top: 150px; padding-bottom: 175px;">
                    <div class="border-none border-bottom border-primary">
                        <h2 class="text-primary">ProgMa</h2>
                        <span class="fw-normal fs-4">
                            adalah sebuah <span class="fw-semibold text-primary">Aplikasi Website</span> yang digunakan untuk membantu siswa dan guru pembimbing untuk melakukan <span class="text-primary fw-semibold">bimbingan</span> tugas atau project
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?= $this->include('split/v_footer') ?>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $("#landing-content").fadeIn(350)
        }, 500);
    })
</script>