
<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Obyek Wisata (.pdf)</title>

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
                <h3>Daftar Obyek Wisata</h3>
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
                <th>Gambar Utama</th>
                <th>Nama Obyek</th>
                <th>Id Kategori</th>
                <th>Info Tambahan</th>
            </tr>
        <?php 
        // koneksi database
        include '../koneksi.php';

        $query = "SELECT * from obyek_wisata";
        $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
        $nomor = 1;
        
        // Menghitung jumlah data
        $jumlah_obyek = mysqli_num_rows($query_mysql);
        
        while($data = mysqli_fetch_array($query_mysql)){ ?>
        <tr>
            <td rowspan="2"><?php echo $nomor++; ?></td>
            <td><img src="images/obyekwisata/<?php echo $data['gambar_utama']; ?>" alt="gambar" width="110px"></td>
            <td><?php echo $data['nama_obyek']; ?></td>
            <td><?php echo $data['id_kategori']; ?></td>
            <td><?php echo $data['info_tambahan']; ?></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td colspan="3"><?php echo $data['deskripsi']; ?></td>
        </tr>
        <?php 
        }
        ?>
            </table>
        <script>
            window.print();
        </script>
    </body>
</html>