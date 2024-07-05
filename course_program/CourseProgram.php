<?php


class CourseProgram {
    public $course_id;
    public $program_id;
    public $course_code;
    public $course_type_id;
    public $course_name;

    public function __construct($data = null) {
        if (is_array($data)) {
            $this->course_id = $data['course_id'];
            $this->program_id = $data['program_id'];
            $this->course_code = $data['course_code'];
            $this->course_type_id = $data['course_type_id'];
            $this->course_name = $data['course_name'];
        }
    }
}