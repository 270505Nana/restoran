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

    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/menu/create')?>" role="button">Tambah Menu</a>
    </div>

    <div class="col">
        <h3><?= $judul ?></h3>
    </div>
</div>


<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Foto</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        <?php $no ?>
        <?php foreach($menu as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['menu'] ?></td>
            <td>
                <img style="width:70px" src="<?= base_url('/upload/'.$value['gambar'].'') ?>">
            </td>
            <td>Rp.<?= number_format($value['harga'])?></td>
            <td>
                <!-- button trash & edit -->
                <a href="<?= base_url()?>/admin/Menu/delete/<?= $value['idmenu']?>">
                <img src="<?= base_url('/icon/trash.svg')?>"></a>
                
                <a href="<?= base_url()?>/admin/Menu/find/<?= $value['idmenu']?>">
                <img src="<?= base_url('/icon/pencil.svg')?>"></a>
            </td>
        </tr>
        <?php endforeach;?>
        <!-- $Menu object dari controller Menu -->
    </table>
    <?= $pager->links('page','bootstrap') ?>
</div>
<?= $this->endSection() ?>