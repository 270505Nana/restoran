<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/admin/kategori/create')?>" role="button">Tambah Kategori</a>
    </div>

    <div class="col">
        <h3><?= $judul ?></h3>
    </div>
</div>


<div class="row mt-2">

    <table class="table">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Hapus</th>
            <th>Edit</th>
        </tr>

        <?php $no=1?>
        <?php foreach($kategori as $key => $value):?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['kategori'] ?></td>
            <td><?= $value['keterangan']?></td>
            <td><a href="<?= base_url()?>/admin/kategori/delete/<?= $value['idkategori']?>">Hapus</a></td>
            <td><a href="<?= base_url()?>/admin/kategori/find/<?= $value['idkategori']?>">Edit</a></td>
        </tr>
        <?php endforeach;?>
        <!-- $kategori object dari controller kategori -->
    </table>
    <?= $pager->links('group1','bootstrap') ?>
</div>
<?= $this->endSection() ?>