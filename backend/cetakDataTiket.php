
<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Tiket (.pdf)</title>

        <style type="text/css">
            body{
            font-family: sans-serif;
            }
            table{
            margin: 20px auto;
            border-collapse: collapse;
            }
            table th,
            table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

            }
            a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
            }
            .tengah{
                text-align: center;
            }
            .judul {
                border: none;
            }
        </style>
    </head>
    <body>
        <!-- Judul -->
        <table>
            <tr>
                <td class="judul"><img src="../frontend/images/logo_tirta.png" alt="logo" width="50px"></td>
                <td class="judul">
                <h3>Daftar Tiket</h3>
                <p>Diunduh pada: 
                    <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    echo date('d-m-Y, H:i:s'); 
                    ?>
                </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <th>No</th>
                <th>Nama Tiket</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Terakhir Diubah</th>
            </tr>
        <?php 
        // koneksi database
        include '../koneksi.php';

        $query = "SELECT * from tiket";
        $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
        $nomor = 1;
        
        while($data = mysqli_fetch_array($query_mysql)){ ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['tiket']; ?></td>
            <td><?php echo $data['harga']; ?></td>
            <td><?php echo $data['keterangan']; ?></td>
            <td><?php echo $data['updated']; ?></td>
        </tr>
        <?php } ?>
            </table>
        <script>
            window.print();
        </script>
    </body>
</html>