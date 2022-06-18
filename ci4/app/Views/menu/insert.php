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
    <h3>Form Insert Menu</h3>
</div>


<form action="<?= base_url('/admin/menu/insert')?>" method="post" enctype="multipart/form-data">
    
    <div class="form-group mt-3">
        <label for="">Kategori</label>
        <select class="form-control" name="idkategori" id="idkategori">
            <option value="">===Pilih Kategori===</option>
            <?php foreach($kategori as $key => $value):?>
            <option value="<?= $value['idkategori'] ?>"><?= $value['kategori']?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <label for="menu">Menu</label>
        <input type="text" name="menu" class="form-control" required>
    </div>   

    <div class="form-group">
       <label for="gambar">Gambar</label>
       <input type="file" name="gambar" class="form-control" required>
    </div>

    <div class="form-group">
       <label for="harga">Harga</label>
       <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
        
    </div>
        
</form>

<?= $this->endSection() ?>