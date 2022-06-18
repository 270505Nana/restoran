<!-- untuk pencarian data -->

<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>


<?php
if (isset($_GET['page'])) {
   $page = $_GET['page'];
   $jumlah = 3;
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
        <a class="btn btn-primary my-4" style="width:100%" href="<?= base_url('/admin/menu/create')?>" role="button">Tambah Menu</a>
    </div>
</div>

<!-- Untuk menampilkan kategori, menggunakan view cells -->
<div class="row">
    <div class="col">
        
        <form action="<?= base_url('/admin/menu/read')?>" method="get">
        <!-- diisi  pengambilan view cells -->
        <?= view_cell('\App\Controllers\Admin\Menu::option')?>

        </form>
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
    <?= $pager->makeLinks(1, $tampil, $total, 'bootstrap') ?>
    <!-- bootstrap : untuk css nya -->
    <!-- $total : total datanya -->
    <!-- $tampil : ditampilkannya 2 -->
    <!-- berarti jadinya 5 data jadi 2 halaman, memanggil var yang udah dibuat
    di dalam controller menu/read -->
    <!-- makeLink : function dari code igniter, supaya kita bisa buat custome -->
</div>
<?= $this->endSection() ?>