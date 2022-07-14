<div class="row">
    <!-- left part start -->
    <div class="col-lg-12 col-xl-12 col-md-12">
        <!-- blog grid -->
        <div id="masonry" class="ttr-blog-grid-3 row">
            <?php foreach ($articulos ?? [] as $articulo) : ?>
                <div class="post action-card col-xl-6 col-lg-6 col-md-12 col-xs-12 m-b40">
                    <div class="recent-news">
                        <div class="action-box">
                            <img src="/<?= $articulo->getUrlArticulo() ?>" alt="<?= $articulo->getDescripcion() ?>" title="<?= $articulo->getNombre() ?>" style="max-width: 400px;" />
                        </div>
                        <div class="info-bx">
                            <h5 class="post-title"><a href="/articulos/<?= $articulo->getId() ?>"> <?= $articulo->getNombre() ?></a></h5>
                            <p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $articulo->getDescripcion() ?></p>
                            <div class="post-extra">
                                <a href="/articulos/<?= $articulo->getId() ?>" class="btn-link">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>