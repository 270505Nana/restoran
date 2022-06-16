<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<h1><?= $judul ?></h1>

<?php foreach($kategori as $key => $value):?>
<h2><?= $value['kategori'] ?></h2>
<?php endforeach;?>

<!-- kalau mau ambil satu data aja -->
<!-- berdasarkan index -->
<?= $kategori[2]['kategori']?>

<?= $this->endSection() ?>