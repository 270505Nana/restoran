<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h1><?= $judul ?></h1>

<?php foreach($kategori as $key => $value):?>
<h2><?= $value ?></h2>
<?php endforeach;?>

<!-- kalau mau ambil satu data aja -->
<!-- berdasarkan index -->
<?= $kategori[0]?>

<?= $this->endSection() ?>