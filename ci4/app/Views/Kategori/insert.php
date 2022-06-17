<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<!-- memanggil session flashdata error -->
<?php echo session()->getFlashdata('info'); ?>

<div class="col">
    <h1>Form Insert Kategori</h1>
</div>


<form action="<?= base_url()?>/admin/kategori/insert" method="post">
    
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control" required>
    </div>   

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
       <input type="text" name="keterangan" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <input type="submit" value="SIMPAN" name="simpan">
    </div>
        
</form>

<?= $this->endSection() ?>