<?php include('../koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <title>Laporan Data Mutasi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="data_table">
                <table id="empTable" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Mutasi</th>
                            <th>Sebab</th>
                            <th>Alamat Mutasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getdatameninggal = mysqli_query($conn, "SELECT data_warga.id_warga, data_warga.nik, data_warga.nama, data_warga_mutasi.tanggal_mutasi, data_warga_mutasi.sebab, data_warga_mutasi.alamat_mutasi, data_warga_mutasi.id_warga_mutasi from data_warga_mutasi inner join data_warga on data_warga.id_warga=data_warga_mutasi.id_warga2");
                        $i = 1;
                        while ($data = mysqli_fetch_array($getdatameninggal)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['nik']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tanggal_mutasi']; ?></td>
                                <td><?php echo $data['sebab']; ?></td>
                                <td><?php echo $data['alamat_mutasi']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="../assets/demo/export-data.js"></script>
</body>

</html>