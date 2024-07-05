<?php
require_once('../database.php');
require_once('../course/CourseRepository.php');
require_once('../course_program/CourseProgramRepository.php'); // Add this line

$courseRepository = new CourseRepository($db);
$courseProgramRepository = new CourseProgramRepository($db); // Add this line
$program_id = isset($_GET['program_id']) ? $_GET['program_id'] : null;
$coursesNotInProgram = $courseRepository->getCoursesNotInProgram($program_id);

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $course_code = $_POST['course_code'];
    $course_type_id = $_POST['course_type_id'];

    // Call addCourse method on the CourseProgramRepository instance
    $courseProgramRepository->addCourse($program_id, $course_id, $course_code, $course_type_id); // Modify this line
    $message = "Course added successfully!";
    header('Location: view_courses_program.php?id=' . $program_id);
    exit;
}
// Rest of the code...
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course to Program</title>
</head>
<body>
<h1>Add Course to Program</h1>

<?php if (!empty($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form action="add_course_program.php?program_id=<?php echo $program_id; ?>" method="post">
    <label for="course_id">Course ID:</label><br>
    <select id="course_id" name="course_id">
        <?php foreach ($coursesNotInProgram as $course): ?>
            <option value="<?php echo $course->id; ?>"><?php echo $course->name; ?></option> <!-- Use id property instead of course_id -->
        <?php endforeach; ?>
    </select><br>
    <input type="hidden" name="program_id" value="<?php echo $program_id; ?>">
    <label for="course_code">Course Code:</label><br>
    <input type="text" id="course_code" name="course_code"><br>
    <label for="course_type_id">Course Type ID:</label><br>
    <input type="text" id="course_type_id" name="course_type_id"><br>
    <input type="submit" value="Add Course">
</form>

</body>
</html>