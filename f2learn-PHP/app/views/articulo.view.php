    <div class="content-block">
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="recent-news blog-lg">
                            <div class="action-box blog-lg">
                                <img src="/<?= $articulo->getUrlArticulo() ?>" alt="<?= $articulo->getDescripcion() ?>" title="<?= $articulo->getNombre() ?>" style="max-width: 500px" />
                            </div>
                            <div class="info-bx">
                                <ul class="media-post">
                                    <li><a href="#"><i class="fa fa-calendar"></i><?= $articulo->getFechaCaducidad() ?></a></li>
                                    <li><a href="#"><i class="fa fa-user"></i><?= $usuario ?? '' ?></a></li>
                                </ul>
                                <h5 class="post-title"><a href="#"><?= $articulo->getNombre() ?></a></h5>
                                <a href="#" class="comments-bx"><?= $articulo->getPrecio() ?> €</a>
                                <p><?= $articulo->getDescripcion() ?></p>
                                <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <a href="/articulos"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a los artículos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>