 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1> Users
		<small>Pengguna</small>
	</h1>
    <ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">  
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="fullname">Name *</label>
                            <input type="text" name="fullname" id="fullname" value="<?=set_value('fullname')?>" class="form-control">
                            <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Username *</label>
                            <input type="text" name="username" id="username" class="form-control">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password *</label>
                            <input type="password" name="pass" id="pass" class="form-control">
                            <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="passconf">Password Confirmation *</label>
                            <input type="password" name="passconf" id="passconf" class="form-control">
                            <?= form_error('passconf', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="textarea" name="address" id="address" class="form-control">
                            <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="level">Level *</label>
                            <select name="level" id="level" class="form-control">
                                <option value="">- Pilih</option>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                            </select>
                            <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="Reset" class="btn btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->