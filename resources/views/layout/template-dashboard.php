<?= $this->include('layout/header'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 d-none d-sm-block bg-dark">
            <!-- Sidenav -->
            <nav class="sticky-top" style="height: 100vh;">
                <div class="border-bottom border-3 border-light mb-2 py-1">
                    <img src="/aset/<?= $profile['logo']; ?>" alt="logo smk jompong" height="50px" class="mx-auto d-block py-1">
                </div>
                <div class="">
                    <?= $this->include('layout/nav-dashboard'); ?>
                </div>
            </nav>
        </div>
        <div class="col-sm-10">
            <div class="row">
                <nav class="col-12 bg-dark text-light py-2 sticky-top">
                    <div class="col d-sm-none d-flex justify-content-between">
                        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="navoffcanvas" aria-labelledby="navoffcanvas">
                            <div class="offcanvas-header bg-black">
                                <h5 class="offcanvas-title" id="offcanvastitle"><?= $title; ?></h5>
                                <button type="button" class="btn-close bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <?= $this->include('layout/nav-dashboard'); ?>
                            </div>
                        </div>
                        <img src="/aset/<?= $profile['logo']; ?>" alt="logo smk jompong" height="50px" class="">
                        <div>
                            <img src="/aset/<?= $akun['foto']; ?>" alt="logo smk jompong" height="50px" class="rounded-circle me-2">
                            <button class="btn btn-secondary my-1 py-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navoffcanvas" aria-controls="navoffcanvas">
                                <i class="bi bi-list fs-1"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col d-none d-sm-block">
                        <div class="d-flex justify-content-between">
                            <h1 class="m-0 p-0"><?= $title; ?></h1>
                            <div>
                                <img src="/aset/<?= $akun['foto']; ?>" alt="logo smk jompong" height="50px" class="rounded-circle me-2">
                                <a href="/logout" class="btn btn-secondary" onclick="return confirm('Yakin mau keluar?')">Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>
</div>


<?= $this->include('layout/footer-html'); ?>