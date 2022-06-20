<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<?php
if (isset($_GET['page_page'])) {
   $page = $_GET['page_page'];
   $jumlah = 2;
   //sesuai dengan paginate
   $no = ($jumlah * $page) - $jumlah + 1;
}else{
    $no = 1;
}
?>

<div class="row">
        <h3 style="text-align:center"><?= $judul ?></h3>
</div>

<div class="row">
    <div class="col">
        <a class="btn btn-primary my-4" style="width:100%" href="<?= base_url('/admin/user/create')?>" role="button">Tambah user</a>
    </div>
</div>

<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Posisi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $no ?>
        <?php foreach($user as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['user'] ?></td>
            <td><?= $value['email']?></td>
            <td><?= $value['level']?></td>
            
            <td>
                <?php if ($value['aktif'] == 1) { $aktif = "AKTIF";?>

                    <a class="btn btn-primary"> <?= $aktif?></a>

                    <?php } else { $aktif = "BANNED";?>
                    
                    <a class="btn btn-danger">
                    <?= $aktif?>
                    </a>
            
                <?php }?> 
            </td>

            <td><a onclick="return confirm('Hapus Data?')" href="<?= base_url()?>/admin/user/delete/<?= $value['iduser']?>"><img src="<?= base_url('/icon/trash.svg')?>"></a>
            <a href="<?= base_url()?>/admin/user/find/<?= $value['iduser']?>"><img src="<?= base_url('/icon/pencil.svg')?>"></a></td>
        </tr>
        <?php endforeach;?>
        <!-- $user object dari controller user -->
    </table>
    <?= $pager->links('page','bootstrap') ?>
</div>
<?= $this->endSection() ?>