<?php
require_once('../database.php');
require_once('ProgramRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $program = new Program($_POST);
    $programRepository = new ProgramRepository($db);
    $programRepository->addProgram($program);
    header('Location: programs.php');
}?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Program</title>
</head>
<body>
<h1>Add Program</h1>
<form method="post" action="add_program.php">
    ID: <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Duration: <input type="text" name="duration"><br>
    Version: <input type="text" name="version"><br>
    Major ID: <input type="text" name="major_id"><br>
    Program Type ID: <input type="text" name="program_type_id"><br>
    Valid From: <input type="text" name="valid_from"><br>
    <input type="submit" value="Add Program">
</form>
</body>
</html>