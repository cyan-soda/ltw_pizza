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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBranchModal">Create New
                        Branch</button>
                    <!-- Modal Add Branch -->
                    <!-- ... Add Branch Modal Content ... -->
                    <div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addBranchModalLabel">Add New Branch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-branch/add_branch.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="BranchName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="BranchName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="BranchProvince" class="form-label">Province</label>
                                            <input type="text" class="form-control" id="BranchProvince" name="province"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="BranchDistrict" class="form-label">Distric</label>
                                            <input type="text" class="form-control" id="BranchDistrict" name="district"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="BranchWard" class="form-label">Ward</label>
                                            <input type="text" class="form-control" id="BranchWard" name="ward"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="BranchStreet" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="BranchStreet" name="street"
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
                                                        data-bs-province='" . $row['Province'] . "'
                                                        data-bs-district='" . $row['District'] . "'
                                                        data-bs-ward='" . $row['Ward'] . "'
                                                        data-bs-street='" . $row['Street'] . "'>Edit</button>
                                                        <button type='button' class='btn-delete btn btn-danger m-1'
                                                            data-bs-toggle='modal'
                                                            data-bs-id='" . $row['Branch_ID'] . "'>Delete</button>
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
                    <!-- Edit Branch Modal -->
                    <!-- ... Edit Branch Modal Content ... -->
                    <div class="modal fade" id="editBranchModal" tabindex="-1" aria-labelledby="editBranchModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editBranchModalLabel">Edit Branch Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-branch/edit_branch.php" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" id="editBranchId" name="id">
                                        <div class="mb-3">
                                            <label for="editBranchName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editBranchName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editBranchProvince" class="form-label">Province</label>
                                            <input type="text" class="form-control" id="editBranchProvince"
                                                name="province" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editBranchDistrict" class="form-label">District</label>
                                            <input type="text" class="form-control" id="editBranchDistrict"
                                                name="district" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editBranchWard" class="form-label">Ward</label>
                                            <input type="text" class="form-control" id="editBranchWard" name="ward"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editBranchStreet" class="form-label">Street</label>
                                            <input type="text" class="form-control" id="editBranchStreet" name="street"
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
                    <!-- Delete Branch Modal -->
                    <!-- ... Delete Branch Modal Content ... -->
                    <div class="modal fade" id="deleteBranchModal" tabindex="-1"
                        aria-labelledby="deleteBranchModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteBranchModalLabel">Delete Branch</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="Modal/handle-branch/delete_branch.php" method="post">
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this branch?</p>
                                        <input type="hidden" id="deleteBranchId" name="id">
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
            var id = $(this).data('bs-id');
            var Name = $(this).data('bs-name');
            var Province = $(this).data('bs-province');
            var District = $(this).data('bs-district');
            var Ward = $(this).data('bs-ward');
            var Street = $(this).data('bs-street');

            $('#editBranchModal #editBranchId').val(id);
            $('#editBranchModal #editBranchName').val(Name);
            $('#editBranchModal #editBranchProvince').val(Province);
            $('#editBranchModal #editBranchDistrict').val(District);
            $('#editBranchModal #editBranchWard').val(Ward);
            $('#editBranchModal #editBranchStreet').val(Street);

            $('#editBranchModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('bs-id');

            $('#deleteBranchModal #deleteBranchId').val(id);

            // Show the modal
            $('#deleteBranchModal').modal('show');
        });
    });
    </script>
</body>

</html>