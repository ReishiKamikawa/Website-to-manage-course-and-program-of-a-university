<?php
require_once('../database.php');
require_once('ProgramRepository.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $programRepository = new ProgramRepository($db);
    $programRepository->deleteProgram($id);
    header('Location: programs.php');
}