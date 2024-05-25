<?= $this->extend('header'); ?>

<?= $this->section('konten'); ?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Tambah Akun</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('manajemenakun'); ?>">Tambahkan Akun</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
  <?php echo form_open_multipart('manajemenuser/add_user'); ?>
  <?php $validation = \Config\Services::validation() ?>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="mb-0">Tambah Akun</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="">Nama :</label>
                  <input type="text" name="nama" class="form-control">
                  <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('id_ruangan'); ?></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="">Username :</label>
                  <input type="text" name="username" class="form-control">
                  <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('id_ruangan'); ?></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="">Password :</label>
                  <input type="text" name="password" class="form-control">
                  <div class="form-error text-danger font-weight-bold"> <?= $validation->getError('id_ruangan'); ?></div>
                </div>
              </div>
            </div>
                      <div class="card-footer text-right">
            <input type="submit" value="Simpan" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
  </div>

  </form>

  <?= $this->include('footer') ?>
  <?= $this->endSection(); ?>