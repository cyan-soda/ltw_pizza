<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
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
                    <h1 class="mt-3">Read Customers</h1>
                    <hr>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">Create New
                        Customer</button>
                    <button type='button' class='btn-edit btn btn-primary m-1' data-bs-id='<?php echo $row['id']; ?>'
                        data-bs-name='<?php echo $row['name']; ?>' data-bs-phone='<?php echo $row['phone']; ?>'
                        data-bs-email='<?php echo $row['email']; ?>' data-bs-toggle='modal'
                        data-bs-target='#editCustomerModal'>Sửa</button>

                    <button type='button' class='btn-delete btn btn-danger m-1' data-bs-id='<?php echo $row['id']; ?>'
                        data-bs-toggle='modal' data-bs-target='#deleteCustomerModal'>Xóa</button>
                    <!-- Modal Add Customer -->
                    <!-- ... Add Customer Modal Content ... -->
                    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCustomerModalLabel">Add New Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="add_customer.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="customerName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="customerName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerPhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="customerPhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="customerEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customerEmail" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Customer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            require_once('./Modal/handel-item/db_connection.php');
                            $conn = OpenCon();
                            $query = "SELECT * FROM `users`;";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='justify-content-center'>
                                        <th class='align-middle' scope='row'>" . $row['id'] . "</th>
                                        <td class='align-middle'>" . $row['name'] . "</td>
                                        <td class='align-middle'>" . $row['phone'] . "</td>
                                        <td class='align-middle'>" . $row['email'] . "</td>
                                        <td class='align-middle'>
                                            <div class='d-inline-flex'>
                                                <button class='btn btn-secondary m-1'>Read</button>
                                                <button type='button' class='btn-edit btn btn-primary m-1'
                                                    data-bs-toggle='modal'>Edit</button>
                                                <button type='button' class='btn-delete btn btn-danger m-1'
                                                    data-bs-toggle='modal'>Delete</button>
                                            </div>
                                        </td>
                                      </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No customers found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Edit Customer Modal -->
                    <!-- ... Edit Customer Modal Content ... -->
                    <div class="modal fade" id="editCustomerModal" tabindex="-1"
                        aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="edit_customer.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="editCustomerId" name="id">
                                        <div class="mb-3">
                                            <label for="editCustomerName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editCustomerName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCustomerPhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="editCustomerPhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCustomerEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="editCustomerEmail" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Customer</button>
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
                                    <h5 class="modal-title" id="deleteCustomerModalLabel">Delete Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="delete_customer.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this customer?</p>
                                        <input type="hidden" id="deleteCustomerId" name="id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Customer</button>
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
            var userId = $(this).data('bs-id');
            var userName = $(this).data('bs-name');
            var userPhone = $(this).data('bs-phone');
            var userEmail = $(this).data('bs-email');

            $('#editCustomerModal #editCustomerId').val(userId);
            $('#editCustomerModal #editCustomerName').val(userName);
            $('#editCustomerModal #editCustomerPhone').val(userPhone);
            $('#editCustomerModal #editCustomerEmail').val(userEmail);

            $('#editCustomerModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            // Get data attribute from the button clicked
            var userId = $(this).data('bs-id');

            // Set the value of the input in the modal
            $('#deleteCustomerModal #deleteCustomerId').val(userId);

            // Show the modal
            $('#deleteCustomerModal').modal('show');
        });
    });
    </script>
</body>

</html>