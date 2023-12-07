<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/admin.css">
    <link rel="stylesheet" href="Public/header.css">
    <link rel="stylesheet" href="Public/sidebar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include_once 'Components/header.php'; ?>
            <?php include_once 'Components/sidebar.php'; ?>

            <div class="content col-md-10 p-0">
                <div class="container">
                    <h1 class="mt-3">Employee List</h1>
                    <hr>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Create New
                        Employee</button>
                    <!-- Modal Add Employee -->
                    <!-- ... Add Employee Modal Content ... -->
                    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-employee/add_employee.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="EmployeeName" class="form-label">User Name</label>
                                            <input type="text" class="form-control" id="EmployeeName" name="user_name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="EmployeeName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeePhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="EmployeePhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="EmployeeEmail" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeEmail" class="form-label">Dob</label>
                                            <input type="text" class="form-control" id="EmployeeEmail" name="dob"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeEmail" class="form-label">Sex</label>
                                            <input type="text" class="form-control" id="EmployeeEmail" name="sex"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeEmail" class="form-label">Salary</label>
                                            <input type="text" class="form-control" id="EmployeeEmail" name="salary"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="EmployeeEmail" class="form-label">Job Type</label>
                                            <input type="text" class="form-control" id="EmployeeEmail" name="jobtype"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Employee</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- phan hien thi -->
                    <div class="scrollable-table">
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('Modal/handle-employee/db_connection.php');
                                $conn = OpenCon();
                                $query = "SELECT * FROM `employee`;";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='justify-content-center'>
                                            <th class='align-middle' scope='row'>" . $row['Employee_ID'] . "</th>
                                            <td class='align-middle'>" . $row['Name'] . "</td>
                                            <td class='align-middle'>" . $row['Phone_Number'] . "</td>
                                            <td class='align-middle'>" . $row['Email'] . "</td>
                                            <td class='align-middle'>
                                                <div class='d-inline-flex'>
                                                    <button class='btn btn-secondary m-1'>Read</button>
                                                    <button type='button' class='btn-edit btn btn-primary m-1'
                                                        data-bs-id='" . $row['Employee_ID'] . "'
                                                        data-bs-user_name='" . $row['UserName'] . "'
                                                        data-bs-name='" . $row['Name'] . "'
                                                        data-bs-phone='" . $row['Phone_Number'] . "'
                                                        data-bs-email='" . $row['Email'] . "'
                                                        data-bs-dob='" . $row['DoB'] . "'
                                                        data-bs-sex='" . $row['Sex'] . "'
                                                        data-bs-salary='" . $row['Salary'] . "'
                                                        data-bs-jobtype='" . $row['Job_Type'] . "'>Edit</button>
                                                        <button type='button' class='btn-delete btn btn-danger m-1'
                                                            data-bs-toggle='modal'
                                                            data-bs-id='" . $row['Employee_ID'] . "'>Delete</button>
                                                </div>
                                            </td>
                                          </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No employee found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Edit Employee Modal -->
                    <!-- ... Edit Employee Modal Content ... -->
                    <div class="modal fade" id="editEmployeeModal" tabindex="-1"
                        aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-employee/edit_employee.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="editEmployeeId" name="id">
                                        <div class="mb-3">
                                            <label for="editEmployeeUserName" class="form-label">User Name</label>
                                            <input type="text" class="form-control" id="editEmployeeUserName"
                                                name="user_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editEmployeeName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeePhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="editEmployeePhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="editEmployeeEmail" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeDoB" class="form-label">Dob</label>
                                            <input type="text" class="form-control" id="editEmployeeDoB" name="dob"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeSex" class="form-label">Sex</label>
                                            <input type="text" class="form-control" id="editEmployeeSex" name="sex"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeSalary" class="form-label">Salary</label>
                                            <input type="text" class="form-control" id="editEmployeeSalary"
                                                name="salary" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editEmployeeJobType" class="form-label">Job type</label>
                                            <input type="text" class="form-control" id="editEmployeeJobType"
                                                name="jobtype" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Employee</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Employee Modal -->
                    <!-- ... Delete Employee Modal Content ... -->
                    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1"
                        aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete Employee</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-employee/delete_employee.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this employee?</p>
                                        <input type="hidden" id="deleteEmployeeId" name="id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Employee</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // Wait for the entire document to load
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('bs-id');
            var name = $(this).data('bs-name');
            var userName = $(this).data('bs-user_name');
            var phone = $(this).data('bs-phone');
            var email = $(this).data('bs-email');
            var dob = $(this).data('bs-dob');
            var sex = $(this).data('bs-sex');
            var salary = $(this).data('bs-salary');
            var jobtype = $(this).data('bs-jobtype');

            $('#editEmployeeModal #editEmployeeId').val(id);
            $('#editEmployeeModal #editEmployeeName').val(name);
            $('#editEmployeeModal #editEmployeeUserName').val(userName);
            $('#editEmployeeModal #editEmployeePhone').val(phone);
            $('#editEmployeeModal #editEmployeeEmail').val(email);
            $('#editEmployeeModal #editEmployeeDoB').val(dob);
            $('#editEmployeeModal #editEmployeeSex').val(sex);
            $('#editEmployeeModal #editEmployeeSalary').val(salary);
            $('#editEmployeeModal #editEmployeeJobType').val(jobtype);

            $('#editEmployeeModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            // Get data attribute from the button clicked
            var userId = $(this).data('bs-id');

            // Set the value of the input in the modal
            $('#deleteEmployeeModal #deleteEmployeeId').val(userId);

            // Show the modal
            $('#deleteEmployeeModal').modal('show');
        });
    });
    </script>
</body>

</html>