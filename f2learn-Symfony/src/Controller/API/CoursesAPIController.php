<?php

namespace App\Controller\API;

use App\BLL\CoursesBLL;
use App\Entity\Courses;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursesAPIController extends BaseAPIController
{
    /**
     * @Route("/courses.{_format}",
     *     name="get_courses",
     *     defaults={"_format": "json"},
     *     requirements={"_format": "json"},
     *     methods={"GET"}
     * )
     * @Route("/courses/ordered/{order}", name="get_courses_ordered")
     */
    public function getAll(Request $request, CoursesBLL $courseBLL, string $order='title'): JsonResponse
    {
        $courses = $courseBLL->getCourses($order);

        return $this->getResponse($courses);
    }

    /**
     * @Route("/courses/{id}.{_format}",
     *     name="get_course",
     *     defaults={"_format": "json"},
     *     requirements={"id": "\d+", "_format": "json"},
     *     methods={"GET"}
     * )
     */
    public function getOne(Courses $course, CoursesBLL $courseBLL): JsonResponse
    {
        $courseBLL->checkAccessToCourse($course);

        return $this->getResponse($courseBLL->toArray($course));
    }

    /**
     * @Route("/courses.{_format}",
     *     name="post_courses",
     *     defaults={"_format": "json"},
     *     requirements={"_format": "json"},
     *     methods={"POST"}
     * )
     */
    public function post(Request $request, CoursesBLL $coursesBLL): JsonResponse
    {
        $data = $this->getContent($request);

        $course = $coursesBLL->nuevo($data);

        return $this->getResponse($course, Response::HTTP_CREATED);
    }

    /**
     * @Route("/courses/{id}.{_format}",
     *     name="delete_course",
     *     requirements={"id": "\d+", "_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"DELETE"}
     * )
     */
    public function delete(Courses $course, CoursesBLL $courseBLL): JsonResponse
    {
        $courseBLL->delete($course);
        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/courses/{id}.{_format}",
     *     name="update_course",
     *     requirements={"id": "\d+", "_format": "json"},
     *     defaults={"_format": "json"},
     *     methods={"PUT"}
     * )
     */
    public function update(Request $request, Courses $course, CoursesBLL $coursesBLL): JsonResponse
    {
        $data = $this->getContent($request);
        $course = $coursesBLL->update($course, $data);
        return $this->getResponse($course, Response::HTTP_OK);
    }
}