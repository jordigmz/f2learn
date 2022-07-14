    <div class="content-block">
        <!-- Gallery Images  -->
        <div class="section-area section-sp1 gallery-bx">
            <div class="container">
                <img src="/<?= $image->getUrlGallery() ?>" alt="<?= $image->getDescription() ?>" title="<?= $image->getDescription() ?>" />
            </div>
        </div>
    </div>

    <?php include 'partials/externalJS-admin.part.php'; ?>

</body>
</html>