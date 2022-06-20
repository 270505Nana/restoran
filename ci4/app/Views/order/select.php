<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <h3 style="text-align:center"><?= $judul ?></h3>
</div>

<div class="row">
    <div class="col">
    <?php 
    if(!empty(session()->getFlashdata('info'))) {

        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('info'); 
        echo '</div>';
    }
    ?>
    </div>
</div>


<?php
if (isset($_GET['page'])) {
   $page = $_GET['page'];
   $jumlah = 4;
   //sesuai dengan paginate
   $no = ($jumlah * $page) - $jumlah + 1;
}else{
    $no = 1;
}
?>

<div class="row mt-2">
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

            <?php foreach($order as $value):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['idorder'] ?></td>
                    <td><?= $value['pelanggan']?></td>
                    <td><?= $value['tglorder']?></td>
                    <td>Rp. <?= number_format($value['total'])?></td>
                    <td>Rp. <?= number_format($value['bayar'])?></td>
                    <td>Rp. <?= number_format($value['kembali'])?></td>
                    
                    <td>
                        <?php if ($value['status'] == 1) { $status = "LUNAS";?>

                            <a class="btn btn-primary"> <?= $status?></a>

                            <?php } else { $status = "BELUM LUNAS";?>
                            
                            <a href="<?= base_url()?>/admin/order/find/<?= $value['idorder']?>"class="btn btn-danger">
                            <?= $status?>
                            </a>
                    
                        <?php }?> 
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?= $pager->makeLinks(1, $perPage, $total, 'bootstrap') ?>
    </div>
</div>
<?= $this->endSection() ?>