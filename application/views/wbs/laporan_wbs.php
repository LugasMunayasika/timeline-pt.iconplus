<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <table>
        <tr>
            <th>No. </th>
            <th>Web Code</th>
            <th>PIC</th>
            <th>Tanggal Awal</th>
            <th>Tanggal Akhir</th>
            <th>Durasi</th>
            <th>Nama Pekerjaan</th>
            <th>Uraian Kegiatan</th>
        </tr>
        <?php $no=1;
        foreach($wbs as $pwbs): ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $pwbs->web_code?></td>
                <td><?= $pwbs->pic?></td>
                <td><?= $pwbs->tgl_awal?></td>
                <td><?= $pwbs->tgl_akhir?></td>
                <td><?= $pwbs->durasi?></td>
                <td><?= $pwbs->nama_pekerjaan?></td>
                <td><?= $pwbs->uraian_kegiatan?></td>
            </tr>
        <?php endforeach?>
    </table>
</body></html>