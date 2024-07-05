<?php

require_once('Course.php');

class CourseRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getCoursesNotInProgram($program_id) {
        $stmt = $this->db->prepare("SELECT * FROM course WHERE id NOT IN (SELECT course_id FROM course_program WHERE program_id = ?)");
        $stmt->execute([$program_id]);
        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $courses[] = new Course($row);
        }
        return $courses;
    }
    public function getCourseById($id) {
        $query = 'SELECT * FROM course WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Course($data); // Pass the entire $data array to the Course constructor
        } else {
            return null;
        }
    }

    public function getAllCourses() {
        $query = 'SELECT * FROM course';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $courseData = $statement->fetchAll(PDO::FETCH_ASSOC);

        $courses = [];
        foreach ($courseData as $data) {
            $courses[] = new Course($data); // Pass the entire $data array to the Course constructor
        }

        return $courses;
    }

    public function addCourse($course) {
        $query = 'INSERT INTO course (id, course_level_id, name, name_vn, credit_theory, credit_lab, description) VALUES (:id, :course_level_id, :name, :name_vn, :credit_theory, :credit_lab, :description)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $course->id);
        $statement->bindValue(':course_level_id', $course->course_level_id);
        $statement->bindValue(':name', $course->name);
        $statement->bindValue(':name_vn', $course->name_vn);
        $statement->bindValue(':credit_theory', $course->credit_theory);
        $statement->bindValue(':credit_lab', $course->credit_lab);
        $statement->bindValue(':description', $course->description);
        $statement->execute();
    }


    public function deleteCourse($id) {
        $query = 'DELETE FROM course WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function updateCourse($course) {
        $query = 'UPDATE course SET course_level_id = :course_level_id, name = :name, name_vn = :name_vn, credit_theory = :credit_theory, credit_lab = :credit_lab, description = :description WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':course_level_id', $course->course_level_id);
        $statement->bindValue(':name', $course->name);
        $statement->bindValue(':name_vn', $course->name_vn);
        $statement->bindValue(':credit_theory', $course->credit_theory);
        $statement->bindValue(':credit_lab', $course->credit_lab);
        $statement->bindValue(':description', $course->description);
        $statement->bindValue(':id', $course->id);
        $statement->execute();
    }
}