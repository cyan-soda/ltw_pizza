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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <?php include_once 'Components/header.php' ;?>

            <!-- side bar -->
            <?php include_once 'Components/sidebar.php' ?>

            <!-- content -->
            <div class="content col-md-10 p-0">
                <div class="container user-info">
                    <!-- User Info template  -->
                    <h1 class="mt-3">Products List</h1>
                    <hr>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Create New
                        Product</button>
                    <!-- Modal Add Product -->
                    <!-- ... Add Product Modal Content ... -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-user/add_product.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="ProductName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="ProductName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ProductPhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="ProductPhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ProductEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="ProductEmail" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Product</button>
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
                            require_once('Modal/handle-user/db_connection.php');
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
                                                    data-bs-id='" . $row['id'] . "'
                                                    data-bs-name='" . $row['name'] . "'
                                                    data-bs-phone='" . $row['phone'] . "'
                                                    data-bs-email='" . $row['email'] . "'>Edit</button>
                                                <button type='button' class='btn-delete btn btn-danger m-1'
                                                    data-bs-toggle='modal'>Delete</button>
                                            </div>
                                        </td>
                                      </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No Products found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Edit Product Modal -->
                    <!-- ... Edit Product Modal Content ... -->
                    <div class="modal fade" id="editProductModal" tabindex="-1"
                        aria-labelledby="editProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel">Edit Product Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="edit_product.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="editProductId" name="id">
                                        <div class="mb-3">
                                            <label for="editProductName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editProductName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editProductPhone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="editProductPhone" name="phone"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editProductEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="editProductEmail" name="email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Product Modal -->
                    <!-- ... Delete Product Modal Content ... -->
                    <div class="modal fade" id="deleteProductModal" tabindex="-1"
                        aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="delete_product.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Product?</p>
                                        <input type="hidden" id="deleteProductId" name="id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete Product</button>
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

            $('#editProductModal #editProductId').val(userId);
            $('#editProductModal #editProductName').val(userName);
            $('#editProductModal #editProductPhone').val(userPhone);
            $('#editProductModal #editProductEmail').val(userEmail);

            $('#editProductModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            // Get data attribute from the button clicked
            var userId = $(this).data('bs-id');

            // Set the value of the input in the modal
            $('#deleteProductModal #deleteProductId').val(userId);

            // Show the modal
            $('#deleteProductModal').modal('show');
        });
    });
    </script>
</body>

</html>