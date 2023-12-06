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

            <div class="content col-md-10 bg-success-subtle p-0">
                <div class="container">
                    <h1 class="mt-3">Read Customers</h1>
                    <hr>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Create New Customer</button>
                    <!-- Modal Add Customer -->
                    <!-- ... Add Customer Modal ... -->
                    <!-- Place Add Customer Modal Here -->
                        
                    <!-- Table to display Customers -->
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
                    <!-- Place Edit Customer Modal Here -->
                    <!-- Place Delete Customer Modal Here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Add Customer Modal -->
    <!-- Edit Customer Modal -->
    <!-- Delete Customer Modal -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your JavaScript for modals -->
    <script>
        // JavaScript to handle opening modals and filling in the current data
    </script>

</body>

</html>
