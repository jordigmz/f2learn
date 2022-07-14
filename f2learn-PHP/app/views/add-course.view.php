			<div class="row">
				<!-- Add courses -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>New course</h4>
						</div>
						<div class="widget-inner">
                            <?php include __DIR__ . '/partials/show-error.part.php'; ?>
							<form class="edit-profile m-b30" action="/courses/new" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-12">
										<label class="col-form-label">Title *</label>
										<div>
											<input class="form-control" type="text" name="title" value="<?= $title ?? '' ?>" />
										</div>
									</div>
                                    <div class="form-group col-12">
                                        <label class="col-form-label">Image *</label>
                                        <div>
                                            <input type="file" class="form-control" name="image" />
                                        </div>
                                    </div>
									<div class="form-group col-3">
										<label class="col-form-label">Duration *</label>
										<div>
											<input class="form-control" type="text" name="duration" value="<?= $duration ?? '' ?>" />
										</div>
									</div>
                                    <div class="form-group col-3">
										<label class="col-form-label">Level *</label>
										<div>
                                            <select name="level">
                                                <?php foreach($levels ?? [] as $level) : ?>
                                                    <option value="<?= $level->getId() ?>" <?= ($levelSelected == $level->getId()) ? 'selected' : '' ?> ><?= $level->getName() ?></option>
                                                <?php endforeach; ?>
                                            </select>
										</div>
									</div>
                                    <div class="form-group col-3">
                                        <label class="col-form-label">Language *</label>
                                        <div>
                                            <select name="language">
                                                <?php foreach($languages ?? [] as $language) : ?>
                                                    <option value="<?= $language->getId() ?>" <?= ($languageSelected == $language->getId()) ? 'selected' : '' ?> ><?= $language->getName() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="col-form-label">Assessments *</label>
                                        <div>
                                            <select name="assessments">
                                                <?php foreach($assessments ?? [] as $assessment) : ?>
                                                    <option value="<?= $assessment->getId() ?>" <?= ($assessmentSelected == $assessment->getId()) ? 'selected' : '' ?> ><?= $assessment->getName() ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="col-form-label">Price *</label>
                                        <div>
                                            <input class="form-control" type="text" name="price" value="<?= $price ?? '' ?>" />
                                        </div>
                                    </div>
									<div class="seperator"></div>
									<div class="form-group col-12">
										<label class="col-form-label">Description *</label>
										<div>
											<textarea class="form-control" name="description"><?= $description ?? '' ?></textarea>
										</div>
									</div>
									<div class="col-12">
                                        <input type="submit" name="submit" class="btn button-md" value="Add Course" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Add courses END-->
                <?php include __DIR__ . '/partials/courses.part.php'; ?>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>