<?php
require_once('../database.php');
require_once('CourseProgramRepository.php');
require_once('../program/ProgramRepository.php'); // Include the ProgramRepository class

if (!isset($_GET['id'])) {
    header('Location: ../program/programs.php');
    exit;
}

$program_id = $_GET['id'];
$courseProgramRepository = new CourseProgramRepository($db);
$courses = $courseProgramRepository->getCoursesByProgramId($program_id);

$programRepository = new ProgramRepository($db); // Create a new instance of ProgramRepository
$program = $programRepository->getProgramById($program_id); // Fetch the program using the program ID
// Check if a delete request has been made
if (isset($_GET['delete_course_id'])) {
    $courseProgramRepository->deleteCourse($_GET['delete_course_id']); // Call deleteCourse method
    header('Location: view_courses_program.php?id=' . $program_id); // Redirect back to the same page
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses of Program</title>
</head>
<body>
<h1>Courses of Program: <?php echo $program->name; ?> (ID: <?php echo $program_id; ?>) </h1> <!-- Print the program name along with the ID -->
<a href="../program/programs.php">Back to Programs</a><br>
<a href="add_course_program.php?program_id=<?php echo $program_id; ?>">Add Course</a>

<table border="1">
    <tr>
        <th>Course ID</th>
        <th>Course Code</th>
        <th>Course Type ID</th>
        <th>Course Name</th> <!-- Add this line -->
        <th>Action</th>
    </tr>
    <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo $course->course_id; ?></td>
            <td><?php echo $course->course_code; ?></td>
            <td><?php echo $course->course_type_id; ?></td>
            <td><?php echo $course->course_name; ?></td> <!-- Add this line -->
            <td><a href="delete_course_program.php?program_id=<?php echo $program_id; ?>&delete_course_id=<?php echo $course->course_id; ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>