<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>
<div class="row">
<?= view_cell('\App\Controllers\Admin\Menu::option') ?>
</div>

<div class="row">

    <h1>UPLOAD GAMBAR</h1>

    <form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
        Gambar : <input type="file" name="gambar" required>
        <br>
        <input type="submit" value="SIMPAN" name="simpan">
    </form>
</div>
<?= $this->endSection() ?>