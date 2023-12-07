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
                    <h1 class="mt-3">Branch List</h1>
                    <hr>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Create New
                        Branch</button>
                    <!-- Modal Add Customer -->
                    <!-- ... Add Customer Modal Content ... -->
                    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Branch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-branch/add_branch.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="customerName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="customerName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerName" class="form-label">Distric</label>
                                            <input type="text" class="form-control" id="customerName" name="distric"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerPhone" class="form-label">Ward</label>
                                            <input type="text" class="form-control" id="customerPhone" name="ward"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerEmail" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="customerEmail" name="street"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Branch</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="scrollable-table">
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Distric</th>
                                    <th scope="col">Ward</th>
                                    <th scope="col">Street</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once('Modal/handle-branch/db_connection.php');
                                $conn = OpenCon();
                                $query = "SELECT * FROM `branch`;";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr class='justify-content-center'>
                                            <th class='align-middle' scope='row'>" . $row['Branch_ID'] . "</th>
                                            <td class='align-middle'>" . $row['Name'] . "</td>
                                            <td class='align-middle'>" . $row['District'] . "</td>
                                            <td class='align-middle'>" . $row['Ward'] . "</td>
                                            <td class='align-middle'>" . $row['Street'] . "</td>
                                            <td class='align-middle'>
                                                <div class='d-inline-flex'>
                                                    <button class='btn btn-secondary m-1'>Read</button>
                                                    <button type='button' class='btn-edit btn btn-primary m-1'
                                                        data-bs-id='" . $row['Branch_ID'] . "'
                                                        data-bs-name='" . $row['Name'] . "'
                                                        data-bs-phone='" . $row['District'] . "'
                                                        data-bs-email='" . $row['Ward'] . "'
                                                        data-bs-email='" . $row['Street'] . "'>Edit</button>
                                                    <button type='button' class='btn-delete btn btn-danger m-1'
                                                        data-bs-toggle='modal'>Delete</button>
                                                </div>
                                            </td>
                                          </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No branch found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Edit Customer Modal -->
                    <!-- ... Edit Customer Modal Content ... -->
                    <div class="modal fade" id="editCustomerModal" tabindex="-1"
                        aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Branch Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="edit_employee.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="editCustomerId" name="id">
                                        <div class="mb-3">
                                            <label for="editCustomerName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCustomerDistrict" class="form-label">Distric</label>
                                            <input type="text" class="form-control" id="editCustomerDistrict" name="district"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCustomerWard" class="form-label">Ward</label>
                                            <input type="text" class="form-control" id="editCustomerWard" name="ward"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCustomerStreet" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="editCustomerStreet" name="street"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Branch</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Customer Modal -->
                    <!-- ... Delete Customer Modal Content ... -->
                    <div class="modal fade" id="deleteCustomerModal" tabindex="-1"
                        aria-labelledby="deleteCustomerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCustomerModalLabel">Delete Branch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="delete_branch.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this branch?</p>
                                        <input type="hidden" id="deleteCustomerId" name="id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Branch</button>
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
            var Id = $(this).data('bs-id');
            var Name = $(this).data('bs-name');
            var District = $(this).data('bs-phone');
            var Ward = $(this).data('bs-ward');
            var Street = $(this).data('bs-street');

            $('#editCustomerModal #editCustomerId').val(Id);
            $('#editCustomerModal #editCustomerName').val(Name);
            $('#editCustomerModal #editCustomerDistrict').val(District);
            $('#editCustomerModal #editCustomerWard').val(Ward);
            $('#editCustomerModal #editCustomerStreet').val(Street);

            $('#editCustomerModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            // Get data attribute from the button clicked
            var Id = $(this).data('bs-id');

            // Set the value of the input in the modal
            $('#deleteCustomerModal #deleteCustomerId').val(Id);

            // Show the modal
            $('#deleteCustomerModal').modal('show');
        });
    });
    </script>
</body>

</html>