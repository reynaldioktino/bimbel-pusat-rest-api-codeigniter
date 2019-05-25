<?php $this->load->view('menu/header'); ?>
	<div class="card" style="background-color: yellow;">
        <form class="form-horizontal" action="<?php echo base_url() ?>/index.php/C_daftar/add" method="POST">
            <div class="card-body">
                <h4 class="card-title" style="color: blue;">Form Pendaftaran</h4><br>
                <div class="form-group row">
                    <label for="fname" class="col-sm-1 text-right control-label col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-1 text-right control-label col-form-label">Alamat</label>
                    <div class="col-sm-6">
                    	<textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-1 text-right control-label col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-1 text-right control-label col-form-label">Nomor HP</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="no_hp" placeholder="Nomor Handphone Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-1 text-right control-label col-form-label">Sekolah</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="sekolah" placeholder="Asal Sekolah">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-1 text-right control-label col-form-label">Nama Ortu</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nama_ortu" placeholder="Nama Orang Tua / Wali">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-1 text-right control-label col-form-label">Nomor HP Ortu</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="no_hp_ortu" placeholder="Nomor Handphone Orang Tua / Wali Anda">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-1 text-right control-label col-form-label">Program</label>
                    <div class="col-sm-6">
                        <select name="id_program" id="" class="form-control">
                        	<option value="">Pilih Program</option>
                            <?php foreach ($program as $pg) : ?>
                        	<option value="<?php echo $pg->kode; ?>"><?php echo $pg->nama; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-1 text-right control-label col-form-label">Cabang</label>
                    <div class="col-sm-6">
                        <select name="id_cabang" id="" class="form-control">
                        	<option value="">Pilih Cabang</option>
                            <?php foreach ($cabang as $cbg) : ?>
                            <option value="<?php echo $cbg->kode; ?>"><?php echo $cbg->nama; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
<?php $this->load->view('menu/footer'); ?>