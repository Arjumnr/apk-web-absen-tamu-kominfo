<?php
require_once '_layouts/header.php';
require_once '../controllers/config.php';
$data = many("SELECT * FROM tb_tamu WHERE tanggal ORDER BY id DESC");
?>



<div id="wrapper">

    <!-- Sidebar -->
    <?php include '_layouts/_sidebar.php'; ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include '_layouts/navbar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Tamu</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Tema</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (count($data) == 0) : ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    <?php else : ?>

                                        <?php foreach ($data as $id => $v) : ?>
                                            <tr>
                                                <td><?= $id + 1 ?></td>
                                                <td><?= $v['instansi'] ?></td>
                                                <td><?= $v['tema'] ?></td>
                                                <td><?= $v['nama'] ?></td>
                                                <td><?= $v['tanggal'] ?></td>
                                                <td><?= $v['status'] ?></td>
                                                <td class="text-center">
                                                    <button type="button" onclick="editForm(<?= $v['id'] ?>)" class="btn btn-warning btn-floating"><i class="fas fa-edit"></i></button>
                                                    <button type="button" id="deleteData" onclick="deleteData(<?= $v['id'] ?>)" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endif ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Instansi</th>
                                        <th>Tema</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <?php include 'modal.php'; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include '_layouts/footer.php'; ?>

        <script type="text/javascript">
            // $('#dataTable').DataTable();

            function deleteData(id){
                $.ajax({
                    type: "GET",
                    url: '../controllers/delete.php',
                    data: {
                        id: id
                    },
                }).then(function(response) {
                    console.log(response);
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: jsonData.message,
                        }).then(function() {
                            location.reload();
                        })
                    } else if (jsonData.status == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: jsonData.message,
                        })
                    } else {
                        Swal.fire(
                            'Invalid Credentials!',
                        )
                    }
                });
            }


            function editForm(id) {
                // console.log(id);
                $.ajax({
                    type: "POST",
                    url: '../controllers/update.php',
                    data: {
                        id: id
                    },
                }).then(function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "success") {
                        $('#ajaxModal').modal('show');
                        // $('#title').html('Update Data');
                        // $('#pertanyaan').val(jsonData.data.pertanyaan);
                        // $('#id').val(jsonData.data.id);
                        // $("#saveBtn").hide();
                        // $("#updateBtn").show();
                    } else if (jsonData.status == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: jsonData.message,
                        })
                    } else {
                        Swal.fire(
                            'Invalid Credentials!',
                        )
                    }
                });
            };
        </script>