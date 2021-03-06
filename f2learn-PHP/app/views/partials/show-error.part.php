<?php if(!empty($checkMessage) || !empty($errors)) : ?>
    <div class="alert alert-<?= empty($errors) ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php if(empty($errors)) : ?>
            <p class="validateMsg"><?= $checkMessage ?? '' ?></p>
        <?php else : ?>
            <ul class="validateMsg">
                <?php foreach($errors ?? [] as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <br />
<?php endif; ?>