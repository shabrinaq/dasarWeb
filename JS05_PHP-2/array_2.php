<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Dosen</title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: yellowgreen; 
                margin: 0; 
                padding: 20px;
            }

            table {
                width: 50%; 
                border-collapse: collapse; 
                margin: 20px 0; 
                font-size: 18px;
                border-radius: 8px; 
                overflow: hidden; 
            }
            th, td {
                padding: 12px; 
                text-align: left;
                border-bottom: 1px solid; 
            }
            th {
                background-color: #3498db;
                color: white; 
            }
        </style>
    </head>
    <body>
        <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan'
        ];
        ?>

        <h2>Informasi Dosen</h2>
        <table>
            <thead>
                <tr>
                    <th>Informasi</th> 
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td><?php echo $Dosen['nama']; ?></td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td><?php echo $Dosen['domisili']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $Dosen['jenis_kelamin']; ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
