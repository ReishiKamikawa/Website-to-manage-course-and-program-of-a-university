<?php
require_once 'CourseProgram.php';

class CourseProgramRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function deleteCourse($program_id, $course_id) {
        $stmt = $this->db->prepare("DELETE FROM course_program WHERE program_id = ? AND course_id = ?");
        $stmt->execute([$program_id, $course_id]);
    }

    public function addCourse($program_id, $course_id, $course_code, $course_type_id) {
        $stmt = $this->db->prepare("INSERT INTO course_program (course_id, program_id, course_code, course_type_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$course_id, $program_id, $course_code, $course_type_id]);
    }

    public function getCoursesByProgramId($program_id) {
        $stmt = $this->db->prepare("SELECT cp.*, c.name as course_name FROM course_program cp JOIN course c ON cp.course_id = c.id WHERE cp.program_id = ?");
        $stmt->execute([$program_id]);
        $courses = $stmt->fetchAll(PDO::FETCH_CLASS, "CourseProgram");
        return $courses;
    }

}