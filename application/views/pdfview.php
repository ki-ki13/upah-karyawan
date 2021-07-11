<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel-Upah-Minggu-ini</title>
    <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #0275d8;
        color: white;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <table id="customers">
            <tr>
                <th>Nama</th>
                <th>Upah / potong</th>
                <th style="width: 158px;">Jumlah potongan</th>
                <th style="width: 122.6px;">Total upah</th>
            </tr>
            <?php foreach ($data as $row){?>
            <tr>
                <td><?= $row['Nama']?></td>
                <td><?= $row['upah']?></td>
                <td><?= $row['potongan']?></td>
                <td><?= $row['total']?></td>
            </tr>
            <?php }?>
          </table>
    </div></body></html>