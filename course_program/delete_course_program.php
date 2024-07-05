<?php
require_once('../database.php');
require_once('CourseProgramRepository.php');

if (!isset($_GET['program_id']) || !isset($_GET['delete_course_id'])) {
    header('Location: view_courses_program.php');
    exit;
}

$program_id = $_GET['program_id'];
$course_id = $_GET['delete_course_id'];
$courseProgramRepository = new CourseProgramRepository($db);
$courseProgramRepository->deleteCourse($program_id, $course_id); // Call deleteCourse method

header('Location: view_courses_program.php?id=' . $program_id); // Redirect back to the view_courses_program.php page
exit;