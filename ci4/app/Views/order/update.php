<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<div class="row">
    <h3 style="text-align:center"><?= $judul ?></h3>
</div>

<div class="row">
    <div class="col">
        <p>Pelanggan : <?= $order [0]['pelanggan'] ?></p>
    </div>

    <div class="col">
        <p>Tanggal : <?= date("d-m-Y",strtotime( $order [0]['tglorder'] ))?></p>
    </div>

    <div class="col">
        <p>Total :  Rp.<?= number_format($order [0]['total']) ?></p>
    </div>
</div>

<div class="row">
    <div class="col">
    <?php 
    if(!empty(session()->getFlashdata('info'))) {

        echo '<div class="alert alert-danger" role="alert">';
        echo session()->getFlashdata('info'); 
        echo '</div>';
    }
    ?>
    </div>
</div>


<!-- Form update -->
<div class="row">
    <div class="col">
        <form action="<?= base_url('/admin/order/update')?>" method="post">
            
            <div class="form-group">
                <label for="kategori">BAYAR</label>
                <input type="number" name="bayar" class="form-control" required>
            </div>   
                <input type="hidden" name="total" value="<?= $order [0]['total'] ?>" class="form-control" required>
                <input type="hidden" name="idorder" value="<?= $order [0]['idorder'] ?>" class="form-control" required>
            
            <div class="form-group mt-2">
                <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
            </div>
    </div>
    </form>
</div>

<!-- Judul -->
<div class="row">
    <div class="col">
        <h2>Rincian Order</h2>
    </div>
</div>

<!-- table data -->
<div class="row">
    <div class="col">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga Jual</th>
                <th>Jumlah Beli</th>
                <th>Total</th>
            </tr>
            <?php 
            $no = 1;
            foreach($detail as $value):?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $value['menu']?></td>
                    <td><?= $value['hargajual']?></td>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['jumlah'] * $value['hargajual']; ?></td>
                </tr>
            <?php endforeach;?> 
        </table>
    </div>
</div>
<?= $this->endSection() ?> 