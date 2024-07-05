<?php
require_once('../database.php');
require_once('CourseRepository.php');

$courseRepository = new CourseRepository($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => $_POST['id'],
        'course_level_id' => $_POST['course_level_id'],
        'name' => $_POST['name'],
        'name_vn' => $_POST['name_vn'],
        'credit_theory' => $_POST['credit_theory'],
        'credit_lab' => $_POST['credit_lab'],
        'description' => $_POST['description']
    ];
    $course = new Course($data);
    $courseRepository->addCourse($course);
    header('Location: courses.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>
<body>
<h1>Add a New Course</h1>
<form method="post">
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br>
    <label for="course_level_id">Course Level ID:</label><br>
    <input type="text" id="course_level_id" name="course_level_id"><br>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="name_vn">Name (VN):</label><br>
    <input type="text" id="name_vn" name="name_vn"><br>
    <label for="credit_theory">Credit Theory:</label><br>
    <input type="text" id="credit_theory" name="credit_theory"><br>
    <label for="credit_lab">Credit Lab:</label><br>
    <input type="text" id="credit_lab" name="credit_lab"><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <input type="submit" value="Add Course">
</form>
</body>
</html>