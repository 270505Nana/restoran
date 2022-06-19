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

</div>
<?= $this->endSection() ?> 