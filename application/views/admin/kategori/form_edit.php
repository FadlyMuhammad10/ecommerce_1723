<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="">Bootstrap components</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="<?= site_url('kategori/edit'); ?>" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $kategori->idkat; ?>">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form EditKategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="inputEmail3" name="namaKategori" placeholder="Nama Kategori" value="<?= $kategori->namakat; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>