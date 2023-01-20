<?php session_start();

if (!$_SESSION['user_role']) {
    header("Location: login.php");
} else {
?>
    <!--DB_conection -->
    <?php include 'empDB.php'; ?>

    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- End of Header -->

    <!-- Main Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employees</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="row card-header justify-content-between">
                <h6 class="font-weight-bold text-primary">All Employees</h6>
                <!-- <button type="button" class="btn btn-success btn-sm">Add New Employee</button> -->
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: auto;">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Phone Number</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: auto;">Email Address</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Address</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Primary Skills</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Active</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Freezed</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: auto;">User Role</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width:auto;">Action</th>
                        </tr>
                    </thead>

                    <!-- Select Query For Showing Data in Tabel -->
                    <tbody>
                        <?php
                        $selectList = "SELECT * FROM users WHERE isDeleted != 1 ";
                        $data = mysqli_query($connections, $selectList);
                        while ($rows = mysqli_fetch_array($data)) { ?>

                            <tr>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['phone'] ?></td>
                                <td><?php echo $rows['emails'] ?></td>
                                <td><?php echo $rows['premanent_address'] ?></td>
                                <td><?php echo $rows['primary_skill'] ?></td>
                                <td><?php if($rows['isEnabled']== 1) { echo "YES"; } else { echo "NO"; } ?></td>
                                <td><button class="btn btn-sm btn-primary">Yes / No</button><?php if($rows['is_freezed']== 0) { echo "No"; } else { echo "Yes"; } ?></td>
                                <td><?php if($rows['user_role']== 1) { echo "Admin"; } else { echo "Employee"; } ?></td>
                                <div class="row col-8">
                                    <td class="text-center">
                                        <a type="button" class="btn btn-success btn-sm" href="view_page.php?id=<?php echo $rows['id'] ?>"><i class="fa-solid fa-eye"></i> View</a>

                                        <?php if ($_SESSION['user_role'] == 1) { ?>
                                            <a href="edit.php?id=<?php echo $rows['id'] ?>" type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-user-pen"></i> Edit</a>
                                        <?php } ?>

                                        <?php if ($_SESSION['user_role'] == 1) { ?>
                                            <a href="delete.php?id=<?php echo $rows['id'] ?>" type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</a>
                                        <?php } ?>
                                    </td>
                                </div>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="targetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Employee Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <table class="table">
                    <tbody id='modal-body'>

                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>
    <!-- End of Footer -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function viewRecord(id) {
            $.ajax({
                url: 'view.php',
                method: 'GET',
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function(response) {
                    $("#modal-body").html(

                        '<tr><td>Name</td><td>' + response.name + '</td></tr>' +
                        '<tr><td>Email Address</td><td>' + response.emails + '</td></tr>' +
                        '<tr><td>Mobile No</td><td>' + response.phone + '</td></tr>' +
                        '<tr><td>user role</td><td>' + response.userRole + '</td></tr>'
                    );

                    $('#targetModal').show();
                }
            });
        }
    </script>
<?php } ?>