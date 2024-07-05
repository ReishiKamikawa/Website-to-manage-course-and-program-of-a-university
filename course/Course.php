<?php

class Course {
    public $id;
    public $course_level_id;
    public $name;
    public $name_vn;
    public $credit_theory;
    public $credit_lab;
    public $description;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->course_level_id = $data['course_level_id'];
        $this->name = $data['name'];
        $this->name_vn = $data['name_vn'];
        $this->credit_theory = $data['credit_theory'];
        $this->credit_lab = $data['credit_lab'];
        $this->description = $data['description'];
    }
}