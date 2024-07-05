<?php
require_once('../database.php');
require_once('CourseRepository.php');

$courseRepository = new CourseRepository($db);
$courses = $courseRepository->getAllCourses();
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Courses</title>
</head>
<body>
<h1>List of Courses</h1>
<a href="add_course.php">Add a new course</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Course Level ID</th>
        <th>Name</th>
        <th>Name (VN)</th>
        <th>Credit Theory</th>
        <th>Credit Lab</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo $course->id; ?></td>
            <td><?php echo $course->course_level_id; ?></td>
            <td><?php echo $course->name; ?></td>
            <td><?php echo $course->name_vn; ?></td>
            <td><?php echo $course->credit_theory; ?></td>
            <td><?php echo $course->credit_lab; ?></td>
            <td><?php echo $course->description; ?></td>
            <td><a href="update_course.php?id=<?php echo $course->id; ?>">Update</a> |
                <a href="delete_course.php?id=<?php echo $course->id; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>