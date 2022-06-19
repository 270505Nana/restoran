<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <h3 style="text-align:center"><?= $judul ?></h3>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>ID Order</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Status</th>
            </tr>

            <?php $no=1 ?>
            <?php foreach($order as $value):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['idorder'] ?></td>
                    <td><?= $value['pelanggan']?></td>
                    <td><?= $value['tglorder']?></td>
                    <td><?= $value['total']?></td>
                    <td><?= $value['bayar']?></td>
                    <td><?= $value['kembali']?></td>
                    
                    <td>
                        <?php if ($value['status'] == 1) { $status = "LUNAS";?>

                            <a onclick="return confirm('Ubah Status?')"  class="btn btn-primary">
                            <?= $status?>
                            </a>

                            <?php } else { $status = "BELUM LUNAS";?>
                            
                            <a onclick="return confirm('Ubah Status?')"  class="btn btn-danger">
                            <?= $status?>
                            </a>
                    
                        <?php }?> 
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>

<?= $this->endSection() ?>