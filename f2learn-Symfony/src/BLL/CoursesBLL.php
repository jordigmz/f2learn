<?php

namespace App\BLL;

use App\Entity\Assessments;
use App\Entity\Courses;
use App\Entity\Languages;
use App\Entity\Levels;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CoursesBLL extends BaseBLL
{
    private RequestStack $requestStack;

    public function setRequestStack(RequestStack $requestStack): void
    {
        $this->requestStack = $requestStack;
    }

    public function getCoursesOrdered(?string $order): array
    {
        if(!is_null($order)) {
            $direction = 'asc';
            $session = $this->requestStack->getSession();
            $coursesOrder = $session->get('coursesOrder');
            if (!is_null($coursesOrder)) {
                if($coursesOrder['order'] === $order) {
                    if ($coursesOrder['direction'] === 'asc') {
                        $direction = 'desc';
                    }
                }
            }
            $session->set('coursesOrder', [
                'order' => $order,
                'direction' => $direction
            ]);
        } else {
            $order = 'id';
            $direction = 'asc';
        }

        return $this->em->getRepository(Courses::class)->findCoursesOrdered($order, $direction);
    }

    public function update(Courses $course, array $data): array
    {
        $level = $this->em->getRepository(Levels::class)->find($data['level']);
        $language = $this->em->getRepository(Languages::class)->find($data['language']);
        $assessments = $this->em->getRepository(Assessments::class)->find($data['assessments']);

        $instructor = $this->getUser();

        $urlImage = $this->getImageCourse($data);

        $course->setTitle($data['title']);
        $course->setImage($urlImage);
        $course->setDescription($data['description']);
        $course->setDuration($data['duration']);
        $course->setStudents($data['students']);
        $course->setPrice($data['price']);
        $course->setLanguage($language);
        $course->setInstructor($instructor);
        $course->setLevel($level);
        $course->setAssessments($assessments);

        return $this->guardaValidando($course);
    }

    public function getImageCourse(array $data): string
    {
        $arr_image = explode(',', $data['image']);
        if (count($arr_image) < 2)
            throw new BadRequestHttpException('The image format is not valid');

        $image = base64_decode($arr_image[1]);
        if(is_null($image))
            throw new BadRequestHttpException('Image not received');

        $fileName = 'pic'. rand() . '.jpg';
        $filePath = 'assets/images/courses/' . $fileName;
        $ifp = fopen($filePath, "wb");
        if(!$ifp)
            throw new BadRequestHttpException('Unable to save image');

        $ok = fwrite($ifp, $image);
        if($ok === false)
            throw new BadRequestHttpException('Unable to save image');

        fclose($ifp);

        return $fileName;
    }

    public function nuevo(array $data): array
    {
        return $this->update(new Courses(), $data);
    }

    public function getCourses(string $order): ?array
    {
        $courses = $this->em->getRepository(Courses::class)->findBy([], [$order => 'ASC']);
        return $this->entitiesToArray($courses);
    }

    public function delete($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }

    public function toArray($course): array
    {
        if (is_null($course))
            throw new Exception("Course does not exist");
        if (!($course instanceof Courses))
            throw new Exception("The entity is not a Courses");

        return [
            'id' => $course->getId(),
            'title' => $course->getTitle(),
            'image' => $course->getImage(),
            'description' => $course->getDescription(),
            'duration' => $course->getDuration(),
            'students' => $course->getStudents(),
            'price' => $course->getPrice(),
            'language' => $course->getLanguage()->getName(),
            'instructor' => $course->getInstructor()->getName(),
            'level' => $course->getLevel()->getName(),
            'assessments' => $course->getAssessments()->getName()
        ];
    }

    public function checkAccessToCourse(Courses $course)
    {
        if ($this->checkRoleAdmin() === false) {
            $user = $this->getUser();
            if ($user->getId() !== $course->getInstructor()->getId()) {
                throw new AccessDeniedHttpException();
            }
        }
    }
}