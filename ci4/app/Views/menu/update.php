<!-- form update -->

<?= $this->extend('template/admin') ?>
<!-- ambil file layout contentnya -->

<?= $this->section('content') ?>

<!-- memanggil session flashdata error -->
<?php 
if(!empty(session()->getFlashdata('info'))) {

    echo '<div class="alert alert-danger" role="alert">';
    $error = session()->getFlashdata('info'); 
    foreach ($error as $key =>$value){
        echo $key."=>".$value;
        echo "<br>";
    }
    echo '</div>';
}
?>

<div class="col">
    <h3>Form Update Menu</h3>
</div>


<form action="<?= base_url('/admin/menu/update')?>" method="post" enctype="multipart/form-data">
    
    <div class="form-group mt-3">
        <label for="">Kategori</label>
        <select class="form-control" name="idkategori" id="idkategori">
            <!-- <option value="">===Pilih Kategori===</option> -->
            <?php foreach($kategori as $key => $value):?>

            <option 
            <?php if ($value['idkategori'] == $menu['idkategori']) echo "selected" ?> 
            value="<?= $value['idkategori'] ?>"><?= $value['kategori']?>
            </option>

            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <label for="menu">Menu</label>
        <input type="text" name="menu" value="<?= $menu['menu']?>" class="form-control">
    </div>   

    <div class="form-group">
       <label for="gambar">Gambar</label>
       <input type="file" name="gambar" class="form-control" >
    </div>

    <div class="form-group">
       <label for="harga">Harga</label>
       <input type="text" name="harga" value="<?= $menu['harga']?>" class="form-control">
    </div>

    <input type="hidden" name="gambar" value="<?= $menu['gambar']?>" class="form-control">
    <input type="hidden" name="idmenu" value="<?= $menu['idmenu']?>" class="form-control">

    <div class="form-group mt-2">
        <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
        
    </div>
        
</form>

<?= $this->endSection() ?>