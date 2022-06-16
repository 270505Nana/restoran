<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<h1>Form Insert Kategori</h1>

<form action="<?= base_url()?>/admin/kategori/insert" method="post">
    kategori : <input type="text" name="kategori" required>
    <br>
    keterangan : <input type="text" name="keterangan" required>
    <br>
    <input type="submit" value="SIMPAN" name="simpan">
</form>

<?= $this->endSection() ?>