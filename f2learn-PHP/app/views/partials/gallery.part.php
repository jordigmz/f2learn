<table class="table table-hover" style="margin-top: 80px; margin-bottom: 80px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Category</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($images ?? [] as $image) : ?>
        <tr id="galleryTable">
            <th><?= $image->getId() ?></th>
            <td><img src="/<?= $image->getUrlGallery() ?>"
                     alt="<?= $image->getDescription() ?>"
                     title="<?= $image->getDescription() ?>" width="60px" />
            </td>
            <td><?= ucfirst($imgRepository->getCategoria($image)->getName()) ?></td>
            <td><?= $image->getDescription() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>