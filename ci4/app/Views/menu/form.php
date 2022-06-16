<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<h1>UPLOAD GAMBAR</h1>

<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
    Gambar : <input type="file" name="gambar" required>
    <br>
    <input type="submit" value="SIMPAN" name="simpan">
</form>

<?= $this->endSection() ?>