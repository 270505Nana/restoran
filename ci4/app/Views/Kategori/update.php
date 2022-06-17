<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<?php echo session()->getFlashdata('info'); ?>

<div class="col">
    <h1>Form Update Kategori</h1>
</div>

<form action="<?= base_url()?>/admin/kategori/update" method="post">

    <div class="form-group">
        <label for="Kategori">Kategori</label>
        <input type="text" name="kategori" value="<?= $kategori['kategori']?>" class="form-control" required>
    </div>   
      
    <div class="form-group">
        <label for="Keterangan">Keterangan</label>
        <input type="text" name="keterangan" value="<?= $kategori['keterangan']?>" class="form-control" required>
    </div>   
    <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']?>">

    
    <!-- button update -->
    <div class="form-group mt-2">
        <input type="submit" value="SIMPAN" name="simpan">
    </div>
        
    <!-- keterangan sesuai dengan column di database -->
    <!-- kategori sesuai dengan column di database -->
</form>

<?= $this->endSection() ?> 