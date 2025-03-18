<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    <?= $user["username"] ?>
                </div>
                <h2 class="page-title">
                    Manajemen Siswa
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-siswa">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Siswa
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-siswa" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl position-relative">
        <!-- Flash message -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php elseif (session()->getFlashdata('error')) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        <?php endif; ?>
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div style="flex: 1;">
                            <h3 class="card-title">Data Siswa</h3>
                        </div>
                        <div style="float: right;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-angkatan" data-selected="" data-bs-toggle="dropdown" aria-expanded="false">
                                Sekolah
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-angkatan">
                                <?php foreach ($sekolah as $a) : ?>
                                    <li><a class="dropdown-item" href="#"><?= $a['nama'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                    <div class="card-body">

                        <table id="userTable" class="display">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Sekolah</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                    <th>Ijazah</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan diisi oleh DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah siswa -->
<div class="modal modal-blur fade" id="modal-siswa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?= site_url('/sekolah/add-siswa') ?>" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden name="id_sekolah" ">
                <!-- status masuk -->
                <div class=" mb-3">
                <label class="form-label w-100">Status Masuk</label>
                <select class="form-select" name="status_masuk" required>
                    <option value="ppdb" selected>PPDB</option>
                    <option value="pindahan">Pindahan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">NIS</label>
                <input type="number" class="form-control" name="nis" required placeholder="Nomor Induk Siswa">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required placeholder="Masukan nama lengkap">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jk" required>
                    <option value="L" selected>L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir">
                </div>
                <div class="col-lg-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" required name="tgl_lahir">
                </div>
            </div>
            <!-- default kode siswa masuk : 1 -->
            <input type="text" hidden name="status_masuk" value="1">
            <div class="mb-3">
                <label class="form-label">Orang Tua</label>
                <input type="text" class="form-control" name="ortu" required placeholder="Nama Ayah / Ibu">
            </div>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label">Tahun Masuk</label>
                    <input type="number" min="1900" max="2099" step="1" value="<?php echo date('Y'); ?>" name="masuk" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label w-100">Bukti</label>
                    <input type="file" class="form-control" name="bukti">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary ms-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
            </svg>
            Simpan
        </button>
    </div>
    </form>
</div>
</div>

<?php foreach ($siswa as $s) : ?>
    <div class="modal fade" id="modal-edit-<?= $s['id'] ?>" tabindex="-1" aria-labelledby="modal-edit-label-<?= $s['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-label-<?= $s['id'] ?>">Edit Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="tabs-<?= $s['id'] ?>" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tabs-home-tab-<?= $s['id'] ?>" data-bs-toggle="tab" data-bs-target="#tabs-home-<?= $s['id'] ?>" type="button" role="tab" aria-controls="tabs-home-<?= $s['id'] ?>" aria-selected="true">Profil Siswa</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tabs-profile-tab-<?= $s['id'] ?>" data-bs-toggle="tab" data-bs-target="#tabs-profile-<?= $s['id'] ?>" type="button" role="tab" aria-controls="tabs-profile-<?= $s['id'] ?>" aria-selected="false">Riwayat Akademis</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tabs-lulus-tab-<?= $s['id'] ?>" data-bs-toggle="tab" data-bs-target="#tabs-lulus-<?= $s['id'] ?>" type="button" role="tab" aria-controls="tabs-lulus-<?= $s['id'] ?>" aria-selected="false">Siswa Lulus</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tabs-pindah-tab-<?= $s['id'] ?>" data-bs-toggle="tab" data-bs-target="#tabs-pindah-<?= $s['id'] ?>" type="button" role="tab" aria-controls="tabs-pindah-<?= $s['id'] ?>" aria-selected="false">Siswa pindah</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabs-content-<?= $s['id'] ?>">
                        <div class="tab-pane fade show active" id="tabs-home-<?= $s['id'] ?>" role="tabpanel" aria-labelledby="tabs-home-tab-<?= $s['id'] ?>">
                            <form action="<?= site_url('/sekolah/edit-siswa') ?>" method="post" class="modal-content">
                                <!-- <div class="modal-header">
                                    <h5 class="modal-title">Edit Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> -->
                                <div class="modal-body">
                                    <input type="text" hidden name="id" value="<?= $s['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">NIS</label>
                                        <input type="number" class="form-control" name="nis" placeholder="Nomor Induk Siswa" value="<?= $s['nis'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan nama lengkap" value="<?= $s['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" name="jk">
                                            <option value="L" <?= $s['jk'] == 'L' ? 'selected' : '' ?>>L</option>
                                            <option value="P" <?= $s['jk'] == 'P' ? 'selected' : '' ?>>P</option>
                                        </select>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $s['tempat_lahir'] ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $s['tgl_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-select" name="status_masuk">
                                                <option value="ppdb" <?= $s['status_masuk'] == 'ppdb' ? 'selected' : '' ?>>PPDB</option>
                                                <option value="pindahan" <?= $s['status_masuk'] == 'pindahan' ? 'selected' : '' ?>>Pindahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Orang Tua</label>
                                        <input type="text" class="form-control" name="ortu" placeholder="Nama Ayah / Ibu" value="<?= $s['orang_tua'] ?>">
                                    </div>
                                </div>
                                <?php if ($s['keluar'] != null) : ?>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label"> Status Keluar</label>
                                                    <select class="form-select" name="status_keluar">
                                                        <option value="lulus" <?= $s['status_keluar'] == 'lulus' ? 'selected' : '' ?>>Lulus</option>
                                                        <option value="pindah" <?= $s['status_keluar'] == 'pindah' ? 'selected' : '' ?>>Pindah</option>
                                                        <option value="do" <?= $s['status_keluar'] == 'do' ? 'selected' : '' ?>>Putus Sekolah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Tahun Masuk</label>
                                                    <input type="number" step="1" name="masuk" class="form-control" value="<?= $s['masuk'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Keluar</label>
                                                    <input type="number" step="1" name="keluar" class="form-control" value="<?= $s['keluar'] ?>">
                                                </div>
                                            </div>
                                            <!-- preview image -->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label w-100">Bukti</label>
                                                    <!-- image/pdf -->
                                                    <?php if (pathinfo($s['bukti'], PATHINFO_EXTENSION) == 'pdf') : ?>
                                                        <embed src="<?= base_url(UPLOAD_PATH . '/' . $s['bukti']) ?>" type="application/pdf" width="100%" height="600px" />
                                                    <?php else : ?>
                                                        <img src="<?= base_url(UPLOAD_PATH . '/' . $s['bukti']) ?>" class="img-fluid" alt="bukti" />
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Ubah
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-profile-<?= $s['id'] ?>" role="tabpanel" aria-labelledby="tabs-profile-tab-<?= $s['id'] ?>">
                            <div class="mt-4" id="academic-history-<?= $s['id'] ?>">Memuat data...</div>
                        </div>
                        <div class="tab-pane fade" id="tabs-lulus-<?= $s['id'] ?>" role="tabpanel" aria-labelledby="tabs-lulus-tab-<?= $s['id'] ?>">
                            <form action="<?= site_url('/sekolah/upload-ijazah'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <!-- <div class="modal-header">
                                    <h5 class="modal-title">Edit Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> -->
                                <div class="modal-body">
                                    <input type="text" hidden name="id" value="<?= $s['id'] ?>">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100">Ijazah</label>
                                            <input type="file" class="form-control" name="bukti">
                                        </div>
                                    </div>
                                    <!-- submit -->
                                    <button type="submit" class="btn btn-primary ms-auto" <?= ($s['status_keluar'] != 'lulus' && $s['status_keluar'] != null) ? 'disabled' : '' ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Luluskan
                                    </button>
                                </div>
                                <!-- <div class="modal-footer">
                                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Ubah
                                    </button>
                                </div> -->
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-pindah-<?= $s['id'] ?>" role="tabpanel" aria-labelledby="tabs-pindah-tab-<?= $s['id'] ?>">
                            <form action="<?= site_url('/sekolah/upload-spindah'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <!-- <div class="modal-header">
                                    <h5 class="modal-title">Edit Siswa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> -->
                                <div class="modal-body">
                                    <input type="text" hidden name="id" value="<?= $s['id'] ?>">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label w-100">Surat Pindah</label>
                                            <input type="file" class="form-control" name="bukti">
                                        </div>
                                    </div>
                                    <!-- submit -->
                                    <button type="submit" class="btn btn-primary ms-auto" <?= ($s['status_keluar'] != 'pindah' && $s['status_keluar'] != null) ? 'disabled' : '' ?>>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Pindahkan
                                    </button>
                                </div>
                                <!-- <div class="modal-footer">
                                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary ms-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                        Ubah
                                    </button>
                                </div> -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Confirm Delete -->
<div class="modal fade" id="modal-confirm-delete" tabindex="-1" aria-labelledby="modal-confirm-delete-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteForm" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-confirm-delete-label">Hapus Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda akan menghapus data siswa <strong id="nisText"></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('show.bs.modal', function(event) {
            const siswaId = this.id.split('-')[2]; // Ambil ID siswa dari ID modal (e.g., 'modal-edit-2')

            fetch(`http://localhost:8080/siswa/get-kelas-siswa/${siswaId}`)
                .then(response => response.json())
                .then(result => {
                    const data = result.data;
                    const targetDiv = document.querySelector(`#tabs-profile-${siswaId}`);

                    console.log(data);
                    // console.log(data[data.length - 1].kelas);

                    const kelasPlus = parseInt(data[data.length - 1]['kelas']) + 1;
                    const kelasTerakhir = parseInt(data[data.length - 1]['kelas']) + 1;

                    const isLulus = data[data.length - 1]['bukti'] != null && data[data.length - 1]['status_keluar'] == 'lulus';
                    const isPindah = data[data.length - 1]['bukti'] != null && data[data.length - 1]['status_keluar'] == 'pindah';
                    const isDo = data[data.length - 1]['bukti'] != null && data[data.length - 1]['status_keluar'] == 'do';


                    if (Array.isArray(data) && data.length > 0) {
                        targetDiv.innerHTML = `
                        <div class="mt-4 row">
                            <form method="post" class="col-md-6" action="<?= site_url('/kelas/add') ?>" >
                                <input type="text" hidden class="form-control" name="id_siswa" required value="${siswaId}" placeholder="Tahun Ajaran">
                                <div class="row" hidden>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" required placeholder="Kelas" value="${kelasPlus}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <input type="text" class="form-control" name="ta" required placeholder="Tahun Ajaran" value="<?= date('Y') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-full" ${isLulus || isPindah ||isDo ? 'disabled' : ''}>
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-badge-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 11v6l-5 -4l-5 4v-6l5 -4z" /></svg>
                                        Naik Kelas
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <form method="post" class="col-md-6 mb-2" action="<?= site_url('/kelas/add') ?>" >
                                <input type="text" hidden class="form-control" name="id_siswa" required value="${siswaId}" placeholder="Tahun Ajaran">
                                <div class="row" hidden>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" required placeholder="Kelas" value="${kelasTerakhir}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tahun Ajaran</label>
                                            <input type="text" class="form-control" name="ta" required placeholder="Tahun Ajaran" value="<?= date('Y') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-full" ${isLulus || isPindah ||isDo ? 'disabled' : ''} >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-badge-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 13v-6l-5 4l-5 -4v6l5 4z" /></svg>
                                        Tinggal Kelas
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <hr/>
                            <h4>Riwayat Kelas</h4>
                            <table class="table table-bordered table-striped mt-2">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${data.map((item, index) => `
                                        <tr>
                                            <td>${item.kelas}</td>
                                            <td>${item.ta}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                        `;
                    } else {
                        targetDiv.innerHTML = '<p class="mt-4">Data tidak ditemukan.</p>';
                    }
                })
                .catch(error => {
                    const targetDiv = document.querySelector(`#tabs-profile-${siswaId}`);
                    targetDiv.innerHTML = `<p>Terjadi kesalahan: ${error.message}</p>`;
                });
        });
    });

    $(document).on('click', '[data-bs-target="#modal-confirm-delete"]', function() {
        const nis = $(this).data('nis');
        const id = $(this).data('id');
        const nama = $(this).data('nama');

        $('#nisText').text(nama);
        $('#deleteForm').attr('action', `<?= site_url('/siswa/del-siswa/') ?>${id}`);
    });

    $(document).on('click', '[data-bs-target^="#modal-edit-"]', function() {
        const id = $(this).data('id');
        const nis = $(this).data('nis');
        const nama = $(this).data('nama');
        const jk = $(this).data('jk');
        const ortu = $(this).data('ortu');

        // Update modal fields with data
        $(`#modal-edit-${id} #editNis`).val(nis);
        $(`#modal-edit-${id} #editNama`).val(nama);
        $(`#modal-edit-${id} #editJk`).val(jk);
        $(`#modal-edit-${id} #editOrtu`).val(ortu);
        $(`#modal-edit-${id} #editForm`).attr('action', `<?= site_url('/siswa/edit-siswa/') ?>${id}`);
    });


    // ajax for modal riwayat akademis
    $(document).ready(function() {
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var target = $(e.target).attr("data-bs-target");
            var id = target.split('-')[2];
            $.ajax({
                url: "<?= site_url('/siswa/get-kelas/siswa') ?>",
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#tabs-profile-' + id).html(response);
                }
            });
        });
    });

    $(document).ready(function() {
        let table = $('#userTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('/admin/get-siswa') ?>",
                "type": "GET",
                "data": function(d) {
                    d.nama_sekolah = $('#dropdown-angkatan').attr('data-selected'); // Tambahkan parameter angkatan
                }
            },
            "columns": [{
                    "data": "nis"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "jk"
                },
                {
                    "data": "nama_sekolah"
                },
                {
                    "data": "masuk"
                },
                {
                    "data": "keluar"
                },
                {
                    "data": "bukti",
                    "render": function(data) {
                        if (data == null) {
                            return "<div style='text-align:center;'>-</div>";
                        }
                        return `<a href="<?= base_url('uploads/ijazah') ?>/${data}" target="_blank">
                    <div style="text-align:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </div>
                </a>`;
                    }
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "updated_at"
                },
                {
                    "data": "id",
                    "render": function(data, type, row) {
                        return `
                    <a href="#" class="btn btn-sm btn-primary" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modal-edit-${data}" 
                        data-id="${data}" 
                        data-nis="${row.nis}" 
                        data-nama="${row.nama}" 
                        data-jk="${row.jk}" 
                        data-ortu="${row.orang_tua}">
                        Edit
                    </a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete" data-id="${data}" data-nis="${row.nis}" data-nama="${row.nama}">Hapus</a>`;
                    }
                },
            ],
            "order": [
                [0, 'asc']
            ]
        });

        // Event listener untuk dropdown
        $('.dropdown-menu a').on('click', function(e) {
            e.preventDefault();

            // Dapatkan nilai angkatan dari item yang diklik
            let selectedAngkatan = $(this).text();

            // Tampilkan angkatan yang dipilih di tombol dropdown
            $('#dropdown-angkatan').text(selectedAngkatan).attr('data-selected', selectedAngkatan);

            // Reload data DataTable dengan parameter baru
            table.ajax.reload();
        });

    });
</script>