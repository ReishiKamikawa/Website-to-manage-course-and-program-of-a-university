<?php


class Program {
    public $id;
    public $name;
    public $duration;
    public $version;
    public $major_id;
    public $program_type_id;
    public $valid_from;

    public function __construct($data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->duration = $data['duration'];
        $this->version = $data['version'];
        $this->major_id = $data['major_id'];
        $this->program_type_id = $data['program_type_id'];
        $this->valid_from = $data['valid_from'];
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setVersion($version) {
        $this->version = $version;
    }

    public function setMajorId($major_id) {
        $this->major_id = $major_id;
    }

    public function setProgramTypeId($program_type_id) {
        $this->program_type_id = $program_type_id;
    }

    public function setValidFrom($valid_from) {
        $this->valid_from = $valid_from;
    }
}