<?php

require_once('../database.php');
require_once('CourseRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $courseRepository = new CourseRepository($db);
    $courseRepository->deleteCourse($id);
    header('Location: courses.php');
}