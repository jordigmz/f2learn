<table class="table table-hover" style="margin-top: 80px; margin-bottom: 80px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Nombre</th>
        <th scope="col">Logo</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($partners ?? [] as $partner) : ?>
        <tr id="partnersTable">
            <th><?= $partner->getId() ?></th>
            <td><img src="<?= $partner->getUrlAsociados() ?>" alt="<?= $partner->getDescription() ?>" title="<?= $partner->getDescription() ?>" width="50px" /></td>
            <td><?= $partner->getName() ?></td>
            <td><?= $partner->getLogo() ?></td>
            <td><?= $partner->getDescription() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>