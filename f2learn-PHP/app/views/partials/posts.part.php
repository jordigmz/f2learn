<table class="table table-hover" style="margin-top: 80px; margin-bottom: 80px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Date</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($blog ?? [] as $post) : ?>
        <tr id="galleryTable">
            <th><?= $post->getId() ?></th>
            <td><img src="<?= $post->getUrlPost() ?>"
                     alt="<?= $post->getTitle() ?>"
                     title="<?= $post->getTitle() ?>" width="60px" />
            </td>
            <td><?= $post->getDateFormated() ?></td>
            <td><?= $post->getTitle() ?></td>
            <td style="max-width: 400px;"><p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $post->getDescription() ?></p></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>