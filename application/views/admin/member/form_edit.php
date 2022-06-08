
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Member</a></div>
              <div class="breadcrumb-item">Form</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Forms</h2>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?php echo site_url('member/update'); ?>">
                <input type="hidden" name="idKonsumen" value="<?php echo $member->idKonsumen; ?>">
                  <div class="card">
                      <div class="card-header">
                        <h4>Form Edit Member</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="username" value="<?php echo $member->username; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Konsumen</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="namaKonsumen" placeholder="namaKonsumen" value="<?php echo $member->namaKonsumen; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="alamat" placeholder="alamat" value="<?php echo $member->alamat; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="email" placeholder="email" value="<?php echo $member->email; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Telepon</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="tlpn" placeholder="telepon" value="<?php echo $member->tlpn; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="statusAktif" placeholder="statusAktif" value="<?php echo $member->statusAktif; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                        
                </form>
            </div>
          </div>
        </section>
      </div>

                