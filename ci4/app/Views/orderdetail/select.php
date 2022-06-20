<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<?php
if (isset($_GET['page_page'])) {
   $page = $_GET['page_page'];
   $jumlah = 2;
   
   //sesuai dengan paginate
   $no = ($jumlah * $page) - $jumlah + 1;
}else{
    $no = 1;
}
?>

<div class="row">
        <h3 style="text-align:center"><?= $judul ?></h3>
</div>

<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Tanggal Order</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
        </tr>

        <?php $no ?>
        <?php foreach($orderdetail as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['tglorder'] ?></td>
            <td><?= $value['menu'] ?></td>
            <td><?= $value['harga']?></td>
            <td><?= $value['jumlah']?></td>
            <td><?= $value['jumlah'] * $value['harga']?></td>
        </tr>
        <?php endforeach;?>
        <!-- $orderdetail object dari controller orderdetail -->
    </table>
    <?= $pager->links('page','bootstrap') ?>
</div>
<?= $this->endSection() ?>