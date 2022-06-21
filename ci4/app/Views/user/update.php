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
    <h3><?= $judul?></h3>
</div>

<form action="<?= base_url('/admin/user/update_user')?>" method="post">
    
    <div class="form-group">
        <label for="user">User</label>
        <input type="text" value="<?= $user['user']?>" name="iduser" class="form-control" readonly>
    </div>   

    <input type="hidden" value="<?= $user['iduser']?>" name="iduser" class="form-control" >

    <div class="form-group">
        <label for="email">Email</label>
       <input type="email" value="<?= $user['email']?>" name="email" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="">Posisi</label>
        <select class="form-control" name="level">
            <option value="">===Pilih Posisi===</option>
            <?php foreach($level as $key ):?>
            <option 
                <?php if ($user ['level'] == $key){
                    echo "selected";
                }?> 
                value="<?= $key ?>"><?= $key ?>
            </option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group mt-2">
        <button class="btn btn-success" style="width:100%" type="submit" name="simpan">Simpan</button>
        
    </div>
</form>
<?= $this->endSection() ?>