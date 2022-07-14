			<div class="row">
				<!-- Add courses -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Nuevo artículo</h4>
						</div>
						<div class="widget-inner">
                            <?php include __DIR__ . '/partials/show-error.part.php'; ?>
							<form class="edit-profile m-b30" action="/articulos/nuevo" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-12">
										<label class="col-form-label">Nombre *</label>
										<div>
											<input class="form-control" type="text" name="nombre" value="<?= $nombre ?? '' ?>" />
										</div>
									</div>
                                    <div class="form-group col-4">
                                        <label class="col-form-label">Precio *</label>
                                        <div>
                                            <input class="form-control" type="text" name="precio" value="<?= $precio ?? '' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="col-form-label">Fecha de caducidad *</label>
                                        <div>
                                            <input class="form-control" type="date" name="fecha_caducidad" value="<?= $fecha_caducidad ?? '' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label class="col-form-label">Image *</label>
                                        <div>
                                            <input type="file" class="form-control" name="image" />
                                        </div>
                                    </div>
									<div class="seperator"></div>
									<div class="form-group col-12">
										<label class="col-form-label">Descripcion *</label>
										<div>
											<textarea class="form-control" name="descripcion"><?= $descripcion ?? '' ?></textarea>
										</div>
									</div>
									<div class="col-12">
                                        <input type="submit" name="submit" class="btn button-md" value="Añadir artículo" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Add courses END-->
			</div>
		</div>
        <?php include __DIR__ . '/partials/articulos.part.php'; ?>
	</main>
	<div class="ttr-overlay"></div>

<?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>