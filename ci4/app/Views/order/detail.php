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
    if(!empty(session()->getFlashdata('pesan'))) {

        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan'); 
        echo '</div>';
    }
    ?>
    </div>
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