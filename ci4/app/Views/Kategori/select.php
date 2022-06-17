<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

<a class="btn btn-primary" href="<?= base_url('/admin/kategori/create')?>" role="button">Tambah Kategori</a>

<h1><?= $judul ?></h1>

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
<?= $this->endSection() ?>