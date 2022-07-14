			<div class="row">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Privileges</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users ?? [] as $user) : ?>
                        <tr id="galleryTable">
                            <th><?= $user->getId() ?></th>
                            <td><img src="/<?= $user->getUrlUsuario() ?>" alt="" width="60px" /></td>
                            <td><?= $user->getName() ?></td>
                            <td><?= $user->getUsername() ?></td>
                            <td><?= $user->getEmail() ?></td>
                            <td><?= ucfirst(strtolower(substr($user->getRole(), 5))) ?></td>
                            <td>
                                <?php if ($user->getRole() === 'ROLE_ADMIN') : ?>
                                    <a href="/users/<?= $user->getId() ?>/ungrant" class="btn btn-outline-secondary" style="font-size: 24px;"><i class="fa fa-user-times" aria-hidden="true"></i></a>
                                <?php else : ?>
                                    <a href="/users/<?= $user->getId() ?>/grant" class="btn btn-outline-success" style="font-size: 24px;"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </td>
                            <td><a href="/users/<?= $user->getId() ?>/delete" class="btn btn-outline-danger" style="font-size: 24px;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>

<?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>