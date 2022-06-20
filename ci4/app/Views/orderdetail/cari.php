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
    <!-- <div class="col-12"> -->
        <form action="<?= base_url('/admin/orderdetail/cari')?>" method="post">
        
            <div class="form-group">
                <label for="kategori">Awal</label>
                <input type="date" name="awal" class="form-control" required>
            </div>   

            <div class="form-group">
                <label for="keterangan">Sampai</label>
            <input type="date" name="sampai" class="form-control" required>
            </div>

            <div class="form-group mt-2">
                <button class="btn btn-primary" style="width:100%" type="submit" name="cari">Cari</button>
                
            </div>
                
        </form>
    <!-- </div> -->
    
</div>

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
        <?php foreach($orderdetail as $value):?>
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
</div>
<?= $this->endSection() ?>