<?php
include "partials/header.php";
include "partials/navigation.php";
include "controllers/StudentController.php";

if (!is_user_logged_in()) {
    redirect("login.php");
}

$studentController = new StudentController($conn);


// add student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_student"])) {
    $name = $_POST["username"];
    $studentId = $_POST["studentId"];
    $email = $_POST["email"];
    $studentController->addStudent($name, $studentId, $email);
    redirect("dashboard.php"); 
}

// delete student
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_student"])) {
    $id = $_POST["id"];
    $studentController->deleteStudent($id);
    redirect("dashboard.php");  
}

$students = $studentController->showStudents();
?>

<h1 style="text-align:center">Student Management</h1>


 <h4>Please enter the following information to add a student:</h4>
<form method="POST">
    <input type="text" name="username" placeholder="Name" required>
    <input type="text" name="studentId" placeholder="Student ID" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="add_student" class = "btn">Add Student</button>
</form>


<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student["id"]; ?></td>
                <td><?php echo $student["username"]; ?></td>
                <td><?php echo $student["studentId"]; ?></td>
                <td><?php echo $student["email"]; ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $student["id"]; ?>">
                        <button type="submit" name="delete_student">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include "partials/footer.php"; ?>
