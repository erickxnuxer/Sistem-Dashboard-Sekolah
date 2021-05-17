<?php
session_start();
require '../../koneksi.php';
?>

<div class="card shadow mb-4">
    <div class="row" style="margin:0 !important">
        <div class="card-header py-3" style="margin-top: 1%;border-bottom: 0;background-color: #fff">
            <h6 class="m-0 font-weight-bold text-primary">Data Penjadwalan</h6>
        </div>
        <div class="card-header py-3" style="margin-inline-start:auto;border-bottom: 0;background-color: #fff">
           <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="width: 300px">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead style="text-align: center;">
                     <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Kode Guru</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody style="text-align: center;">
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM tbpenjadwalan");
                        $x=1;
                    ?>

                    <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                        <?php 
                            $id = $result['id'];
                            $kodeguru = $result['kodeguru'];
                            $tanggal = $result['tanggal'];
                            $mulai = $result['mulai'];
                            $selesai = $result['selesai'];
                            $kelas = $result['kelas'];
                        ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $tanggal ?></td>
                            <td><?= $mulai ?></td>
                            <td><?= $selesai?></td>
                            <td><?= $kodeguru?></td>
                            <td><?= $kelas?></td>
                            <td>
                               <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editJadwal(<?= "'$id','$tanggal','$mulai','$selesai','$kodeguru','$kelas'"; ?>)"><i class="fa fa-edit"></i> Edit </button>

                                <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deletejadwal('<?= $id ?>')"> <i class="fa fa-trash"></i> Hapus </button>
                            </td>
                        </tr>
                    <?php $x++; endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>