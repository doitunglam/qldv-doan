<div id="content-DoanVien">
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $doanvien['HoDV'] . ' ' . $doanvien['TenDV']; ?> <small> - <?php echo $doanvien['MaDV']; ?></small></h3>
            </div>
            <!-- Main content -->
            <div class="box-body">
                <form id="frmSuaDV" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Mã Đoàn viên (mã số sinh viên)</label>
                                <input type="text" class="form-control" name="MaDV"
                                    placeholder="Mã Đoàn viên (mã số sinh viên)" value="<?php echo $doanvien['MaDV']; ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Họ và tên đệm</label>
                                        <input type="text" class="form-control" name="HoDV"
                                            placeholder="Họ và tên đệm" value="<?php echo $doanvien['HoDV']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control" name="TenDV" placeholder="Tên"
                                            value="<?php echo $doanvien['TenDV']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="Email" placeholder="Email"
                                            value="<?php echo $doanvien['Email']; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="SDT"
                                            placeholder="Số điện thoại" value="<?php echo $doanvien['SDT']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="NgaySinh"
                                                id="datepicker2" value="<?php echo date('d/m/Y', strtotime($doanvien['NgaySinh'])); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <div class="radio-group">
                                            <label>
                                                <input type="radio" name="GioiTinh" class="minimal-blue icheck"
                                                    value="1" <?php echo $doanvien['GioiTinh'] == 1 ? 'checked' : ''; ?>>
                                                Nam
                                            </label>
                                            <label style="padding-left: 40px;">
                                                <input type="radio" name="GioiTinh" class="minimal-blue icheck"
                                                    value="0" <?php echo $doanvien['GioiTinh'] == 0 ? 'checked' : ''; ?>>
                                                Nữ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quê quán</label>
                                <input type="text" class="form-control" name="QueQuan" placeholder="Quê quán"
                                    value="<?php echo $doanvien['QueQuan']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Ngày vào Đoàn</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" name="NgayVaoDoan"
                                                id="datepicker" value="<?php echo date('d/m/Y', strtotime($doanvien['NgayVaoDoan'])); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chi đoàn</label>
                                <select name="MaCD" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($listcd as $cd): ?>
                                    <option value="<?php echo $cd->MaCD; ?>" <?php if ($doanvien['MaCD'] == $cd->MaCD) {
                                        echo 'selected';
                                    } ?>><?php echo $cd->TenCD; ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select name="MaChucVu" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($listcv as $cv): ?>
                                    <option value="<?php echo $cv->MaChucVu; ?>" <?php if ($doanvien['MaChucVu'] == $cv->MaChucVu) {
                                        echo 'selected';
                                    } ?>><?php echo $cv->TenChucVu; ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row" style="margin: 0px;">
                    <div id="errSuaDV" style="display: none;margin-bottom: 10px;"></div>
                    <div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
                </div>
                <div class="row" style="margin: 0px;">
                    <button type="button" class="btn btn-warning btn-flat"
                        onclick="App.DoanVien.SuaDV();return false;">Cập nhật</button>
                    <a href="<?php echo url('doanvien'); ?>" class="btn btn-default btn-flat">Hủy</a>
                </div>
            </div>
        </div>
    </section>
</div>
