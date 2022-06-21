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
    <h3>Form Insert User</h3>
</div>

<form action="<?= base_url('/admin/user/insert')?>" method="post">
    
    <div class="form-group">
        <label for="user">User</label>
        <input type="text" name="user" class="form-control" required>
    </div>   

    <div class="form-group">
        <label for="email">Email</label>
       <input type="email" name="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
       <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group mt-3">
        <label for="">Posisi</label>
        <select class="form-control" name="level" id="idkategori">
            <option value="">===Pilih Posisi===</option>
            <?php foreach($level as $key ):?>
            <option value="<?= $key ?>"><?= $key ?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group mt-2">
        <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
        
    </div>
</form>
<?= $this->endSection() ?>