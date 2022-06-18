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

<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>No.Telepon</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $no ?>
        <?php foreach($pelanggan as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['pelanggan'] ?></td>
            <td><?= $value['alamat']?></td>
            <td><?= $value['telp']?></td>
            <td><?= $value['email']?></td>
            <td>
                <a onclick="return confirm('Hapus Data?')" href="<?= base_url()?>/admin/pelanggan/delete/<?= $value['idpelanggan']?>"><img src="<?= base_url('/icon/trash.svg')?>"></a>
           </td>

           <td>
                <?php if ($value['aktif'] == 1) { $aktif = "AKTIF";?>

                <a onclick="return confirm('Ubah Status?')" href="<?= base_url()?>/admin/pelanggan/update/<?= $value['idpelanggan']?>/<?= $value['aktif']?>" class="btn btn-primary">
                <?= $aktif?>
                </a>

                <?php } else { $aktif = "TIDAK AKTIF";?>
                 
                <a onclick="return confirm('Ubah Status?')" href="<?= base_url()?>/admin/pelanggan/update/<?= $value['idpelanggan']?>/<?= $value['aktif']?>" class="btn btn-danger">
                <?= $aktif?>
                </a>
              
                <?php }?> 
           </td>
        </tr>
        <?php endforeach;?>
        <!-- $pelanggan object dari controller pelanggan -->
    </table>
    <?= $pager->links('page','bootstrap') ?>
</div>
<?= $this->endSection() ?>