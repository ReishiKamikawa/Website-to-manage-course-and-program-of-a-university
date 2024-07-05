<?php

require_once('Program.php');
class ProgramRepository {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllPrograms() {
        $query = 'SELECT * FROM program';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $programData = $statement->fetchAll(PDO::FETCH_ASSOC);

        $programs = [];
        foreach ($programData as $data) {
            $programs[] = new Program($data);
        }

        return $programs;
    }



    public function getProgramById($id) {
        $stmt = $this->db->prepare('SELECT * FROM program WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $programData = $stmt->fetch(PDO::FETCH_ASSOC);
//        var_dump($programData); // Add this line to check the values of the $programData variable
        if ($programData) {
            return new Program($programData);
        }
        return null;
    }

    public function addProgram($program) {
        $query = 'INSERT INTO program (id, name, duration, version, major_id, program_type_id, valid_from) VALUES (:id, :name, :duration, :version, :major_id, :program_type_id, :valid_from)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $program->id);
        $statement->bindValue(':name', $program->name);
        $statement->bindValue(':duration', $program->duration);
        $statement->bindValue(':version', $program->version);
        $statement->bindValue(':major_id', $program->major_id);
        $statement->bindValue(':program_type_id', $program->program_type_id);
        $statement->bindValue(':valid_from', $program->valid_from);
        $statement->execute();
    }


    public function updateProgram($program) {
        $query = 'UPDATE program SET name = :name, duration = :duration, version = :version, major_id = :major_id, program_type_id = :program_type_id, valid_from = :valid_from WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $program->id);
        $statement->bindValue(':name', $program->name);
        $statement->bindValue(':duration', $program->duration);
        $statement->bindValue(':version', $program->version);
        $statement->bindValue(':major_id', $program->major_id);
        $statement->bindValue(':program_type_id', $program->program_type_id);
        $statement->bindValue(':valid_from', $program->valid_from);
        $statement->execute();
    }

    public function deleteProgram($id) {
        $query = 'DELETE FROM program WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}