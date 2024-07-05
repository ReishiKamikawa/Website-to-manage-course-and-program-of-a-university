<?php
require_once('../database.php');
require_once('ProgramRepository.php');

$programRepository = new ProgramRepository($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $program = new Program($_POST);
    $programRepository->updateProgram($program);
    header('Location: programs.php');
} else {
    $id = $_GET['id'];
    $program = $programRepository->getProgramById($id);
//    var_dump($program); // Add this line to check the values of the Program object
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Program</title>
</head>
<body>
<h1>Update Program</h1>
<form method="post" action="update_program.php">
    ID: <input type="text" name="id" value="<?php echo $program->id; ?>"><br>
    Name: <input type="text" name="name" value="<?php echo $program->name; ?>"><br>
    Duration: <input type="text" name="duration" value="<?php echo $program->duration; ?>"><br>
    Version: <input type="text" name="version" value="<?php echo $program->version; ?>"><br>
    Major ID: <input type="text" name="major_id" value="<?php echo $program->major_id; ?>"><br>
    Program Type ID: <input type="text" name="program_type_id" value="<?php echo $program->program_type_id; ?>"><br>
    Valid From: <input type="text" name="valid_from" value="<?php echo $program->valid_from; ?>"><br>
    <input type="submit" value="Update Program">
</form>
</body>
</html>