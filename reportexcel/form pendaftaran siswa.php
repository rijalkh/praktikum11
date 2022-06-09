<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
<body>
    <?php
        include('koneksi.php');

        if(isset($_POST['kirim'])){
            $Nama = $_POST['Nama'];
            $jk = $_POST['jk'];
            $Alamat = $_POST['Alamat'];
            $telp = $_POST['telp'];

            $sql = mysqli_query($koneksi,"INSERT INTO pendaftaransiswabaru(Nama, Jenis_kelamin, Alamat, Telepon) 
            VALUES ('$Nama','$jk','$Alamat', '$telp')");

            mysqli_query($koneksi, $sql);
        }else{

        }
    ?>

    <h1 align="center">FORMULIR PENDAFTARAN SISWA BARU</h1>
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body" >
                    <form method="post">
                        <div class="form-group row">
                            <label for="nis" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sl-5">
                                <input type="text" name="Nama" class="form-control" id="nis">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npu" class="col-sm-2 col-form-label">Jenis_kelamin</label>
                            <div class="col-sl-5">
                                <input type="text" name="jk" class="form-control"  >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="skhun" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sl-5">
                                <input type="text" name="Alamat" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="skhun" class="col-sm-2 col-form-label">Telepon</label>
                            <div class="col-sl-5">
                                <input type="text" name="telp" class="form-control">
                            </div>
                        </div><br><br>

                        <div class="form-group row">
                            <div class="col-sl-5">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="kirim">Kirim</button>
                                <a class="btn btn-primary btn-lg btn-block" href="reportDataSiswa.php">Export</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>