<table class="table table-hover" style="margin-top: 80px; margin-bottom: 80px;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Image</th>
        <th scope="col">Description</th>
        <th scope="col">Duration</th>
        <th scope="col">Level</th>
        <th scope="col">Language</th>
        <th scope="col">Students</th>
        <th scope="col">Assessments</th>
        <th scope="col">Instructor</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($courses ?? [] as $course) : ?>
        <tr id="galleryTable">
            <th><?= $course->getId() ?></th>
            <td><?= $course->getTitle() ?></td>
            <td><img src="/<?= $course->getUrlCourse() ?>"
                     alt="<?= $course->getTitle() ?>"
                     title="<?= $course->getTitle() ?>" width="60px" />
            </td>
            <td style="max-width: 150px;"><p style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $course->getDescription() ?></p></td>
            <td><?= $course->getDuration() ?></td>
            <td><?= $cursoRepository->getLevel($course)->getName() ?></td>
            <td><?= $cursoRepository->getLanguage($course)->getName() ?></td>
            <td><?= $course->getStudents() ?></td>
            <td><?= $cursoRepository->getAssessment($course)->getName() ?></td>
            <td><?= $usuarioRepository->find($course->getInstructor())->getName() ?></td>
            <td><?= $course->getPrice() ?> €</td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>