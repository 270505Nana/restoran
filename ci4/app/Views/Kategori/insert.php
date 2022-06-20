<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<!-- memanggil session flashdata error -->
<?php 
if(!empty(session()->getFlashdata('info'))) {

    echo '<div class="alert alert-danger" role="alert">';
    echo session()->getFlashdata('info'); 
    echo '</div>';
}
?>

<div class="col">
    <h3>Form Insert Kategori</h3>
</div>

<form action="<?= base_url('/admin/kategori/insert')?>" method="post">
    
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control" required>
    </div>   

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
       <input type="text" name="keterangan" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
        
    </div>
</form>
<?= $this->endSection() ?>