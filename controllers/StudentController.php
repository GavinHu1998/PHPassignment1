<?php
include "models/StudentModel.php";

class StudentController {
    private $studentModel;

    public function __construct($db) {
        $this->studentModel = new StudentModel($db);
    }

    public function showStudents() {
        return $this->studentModel->getAllStudents();
    }

    public function addStudent($name, $studentId, $email) {
        return $this->studentModel->addStudent($name, $studentId, $email);
        echo"Student added successfully";
    }

    public function deleteStudent($id) {
        return $this->studentModel->deleteStudent($id);
        echo"Student deleted successfully";
    }
}
?>
