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
        <a class="btn btn-primary my-4" style="width:100%" href="<?= base_url('/admin/kategori/create')?>" role="button">Tambah Kategori</a>
    </div>
</div>

<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        <?php $no ?>
        <?php foreach($kategori as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['kategori'] ?></td>
            <td><?= $value['keterangan']?></td>
            <td><a onclick="return confirm('Hapus Data?')" href="<?= base_url()?>/admin/kategori/delete/<?= $value['idkategori']?>"><img src="<?= base_url('/icon/trash.svg')?>"></a>
            <a href="<?= base_url()?>/admin/kategori/find/<?= $value['idkategori']?>"><img src="<?= base_url('/icon/pencil.svg')?>"></a></td>
        </tr>
        <?php endforeach;?>
        <!-- $kategori object dari controller kategori -->
    </table>
    <?= $pager->links('page','bootstrap') ?>
</div>
<?= $this->endSection() ?>