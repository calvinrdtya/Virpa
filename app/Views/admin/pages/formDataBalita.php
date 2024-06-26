<?= $this->extend('admin/layouts/newTemplates'); ?>

<?= $this->section('content'); ?>

<?php $role = session()->get('level'); ?>
<?php if ($role != 'admin') : ?>
    <?php return redirect()->to('/forbidden'); ?>
<?php endif; ?>

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= isset($bayi) ? 'Edit' : 'Tambah' ?> Data Bayi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?= form_open(isset($bayi) ? 'admin/proses-edit-bayi' : 'admin/proses-tambah-bayi', ['class' => 'form form-vertical']) ?>

                        <?php if (isset($bayi)) : ?>
                            <!-- Additional fields for editing -->
                            <div class="form-group">
                                <label>Ibu</label>
                                <input type="text" name="ibu" class="form-control" value="<?= $ibu['id_user'] ?>" readonly>
                                <input type="hidden" name="id_bayi" value="<?= $bayi['id_bayi'] ?>">
                            </div>
                        <?php else : ?>
                            <!-- Fields for creating -->
                            <div class="form-group">
                                <label for="ibu">Ibu</label>
                                <select id="ibu" class="form-control select2" style="width: 100%;" name="ibu">
                                    <option selected="selected" disabled>Pilih Ibu</option>
                                    <?php foreach ($ibu as $i) : ?>
                                        <option value="<?= $i['id_user'] ?>"><?= $i['nama_user'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Bayi</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_bayi" value="<?= isset($bayi) ? $bayi['nama_bayi'] : '' ?>">
                        </div>

                        <?php if (isset($bayi)) : ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Umur Bayi (bulan)</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="umur" value="<?= isset($bayi) ? $bayi['umur'] : '' ?>" readonly>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_lahir" value="<?= isset($bayi) ? $bayi['tgl_lahir'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="berat_badan" name="berat_badan" value="<?= isset($bayi) ? $bayi['berat_badan'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="tinggi_badan">Tinggi Badan (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="tinggi_badan" name="tinggi_badan" value="<?= isset($bayi) ? $bayi['tinggi_badan'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="lingkar_kepala">Lingkar Kepala (cm)</label>
                            <input type="number" step="0.01" class="form-control" id="lingkar_kepala" name="lingkar_kepala" value="<?= isset($bayi) ? $bayi['lingkar_kepala'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="umur">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="L" <?= isset($bayi) && $bayi['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= isset($bayi) && $bayi['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>