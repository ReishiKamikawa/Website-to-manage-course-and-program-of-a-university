<?php
require_once('../database.php');
require_once('ProgramRepository.php');
$programRepository = new ProgramRepository($db);
$programs = $programRepository->getAllPrograms();
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Programs</title>
</head>
<body>
<h1>List of Programs</h1>
<a href="add_program.php">Add a new program</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Duration</th>
        <th>Version</th>
        <th>Major ID</th>
        <th>Program Type ID</th>
        <th>Valid From</th>
        <th>Action</th>
    </tr>
    <?php foreach ($programs as $program): ?>
        <tr>
            <td><?php echo $program->id; ?></td>
            <td><?php echo $program->name; ?></td>
            <td><?php echo $program->duration; ?></td>
            <td><?php echo $program->version; ?></td>
            <td><?php echo $program->major_id; ?></td>
            <td><?php echo $program->program_type_id; ?></td>
            <td><?php echo $program->valid_from; ?></td>
            <td>
                <a href="update_program.php?id=<?php echo $program->id; ?>">Update</a> |
                <a href="delete_program.php?id=<?php echo $program->id; ?>">Delete</a> |
                <a href="../course_program/view_courses_program.php?id=<?php echo $program->id; ?>">View Courses</a> <!-- New column data -->

            </td>

        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
</html>