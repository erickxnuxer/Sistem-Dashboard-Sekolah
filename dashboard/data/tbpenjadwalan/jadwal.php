<?php
session_start();
require '../../koneksi.php';
?>
    
<form action="" method="post" class="form-data" id="form-data">  
    <input type="hidden" id="id" name="">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Mulai</label>
                <input type="time" name="mulai" id="mulai" class="form-control">
            </div>
        </div>


        <div class="col-sm-3">
            <div class="form-group">
                <label>Selesai</label>
                <input type="time" name="selesai" id="selesai" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Guru</label>
                <select name="kodeguru" id="kodeguru" class="form-control">
                    <?php $query = mysqli_query($conn, "SELECT * FROM tbguru"); ?>
                    <?php while ($row1 = mysqli_fetch_array($query)):; ?>
                        <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option>Pilih kelas</option>
                    <option>10 TKJ 1</option>
                    <option>10 TKJ 2</option>
                    <option>10 TKJ 3</option> 
                    <option>11 TKJ 1</option>
                    <option>11 TKJ 2</option>
                    <option>11 TKJ 3</option>
                    <option>12 TKJ 1</option>
                    <option>12 TKJ 2</option>
                    <option>12 TKJ 3</option>
                    <option>10 AK 1</option>  
                    <option>10 AK 2</option> 
                    <option>11 AK 1</option>  
                    <option>11 AK 2</option>
                    <option>12 AK 1</option>  
                    <option>12 AK 2</option>
                    <option>10 PM</option>
                    <option>11 PM</option>
                    <option>11 PM</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="savejadwal()" value="save">
            <i class="fa fa-save"></i> Save
        </button>
    
        <button type="button" name="clear" id="clear" class="btn btn-warning" onclick="clearjadwal()">
            <i class="fa fa-trash"></i> Clear
        </button>
    </div>

    <div id="insert">
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
    </div>
</form>

