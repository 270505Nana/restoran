<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<h1>Form Update Kategori</h1>

<form action="<?= base_url()?>/admin/kategori/update" method="post">

    kategori : <input type="text" name="kategori" value="<?= $kategori['kategori']?>" required>
    <br>
    keterangan : <input type="text" name="keterangan" value="<?= $kategori['keterangan']?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">
    <!-- button update -->
    <input type="submit" value="SIMPAN" name="simpan">
    <!-- keterangan sesuai dengan column di database -->
    <!-- kategori sesuai dengan column di database -->
</form>

<?= $this->endSection() ?> 