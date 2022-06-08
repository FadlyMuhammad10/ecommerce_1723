<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kategori</h1>
            <div class="section-header-breadcrumb">

                <div class="breadcrumb-item"><a href="#">Kategori</a></div>

            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Kategori</h2>

            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kategori</h4>
                            <a href="<?= site_url('kategori/add'); ?>" class="btn btn-primary">Tambah Kategori</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $no = 0; ?>
                                    <?php foreach ($kategori as $item) : {
                                            $no++ ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $item->namakat; ?></td>
                                                <td>
                                                    <a href="<?= site_url('kategori/getid/' . $item->idkat); ?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?= site_url('kategori/delete/' . $item->idkat); ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                    <?php }
                                    endforeach; ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>