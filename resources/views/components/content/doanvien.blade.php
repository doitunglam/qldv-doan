<div id="content-DoanVien">
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Quản lý Đoàn viên <small> - Trang chính</small></h3>
            </div>
            <!-- Main content -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-success btn-flat" data-toggle="modal"
                            data-target="#modalThemDV"><i class="fa fa-plus"></i> Thêm mới</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px;">
                    <form method="get" accept-charset="utf-8">
                        <div class="col-md-8 col-xs-12">
                            <div class="form-group">
                                <label>Tìm kiếm theo: Họ tên hoặc mã đoàn viên</label>
                                <div class="row">
                                    <div class="col-xs-10">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Nhập từ khóa tìm kiếm..." value="<?php echo $search; ?>">
                                    </div>
                                    <div class="col-xs-2">
                                        <button type="submit" class="btn btn-success btn-flat">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row" style="margin-top: 15px;">

                    <div class="col-xs-12">
                        <?php if (!empty($search)): ?>
                        <p>Tìm thấy <strong><?php echo count($doanvien); ?></strong> kết quả!</p>
                        <?php endif ?>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr class="bg-green">
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Chi đoàn</th>
                                    <th class="text-center">Mã Đoàn viên</th>
                                    <th class="text-center">Họ và tên Đoàn viên</th>
                                    <th class="text-center">Ngày sinh</th>
                                    <th class="text-center">Giới tính</th>
                                    <th class="text-center">Ngày vào Đoàn</th>
                                    <th class="text-center">Quê quán</th>
                                    <th class="text-center">Chức vụ</th>
                                    <th class="text-center">Chức năng</th>
                                </tr>
                                <?php if (isset($doanvien) && !empty($doanvien)): ?>
                                <?php foreach ($doanvien as $i => $itemR) { ?>
                                <tr>
                                    <?php
                                    $item = [];
                                    foreach ($itemR as $key => $value) {
                                        if (isset($itemR[$key])) {
                                            $item[$key] = $itemR[$key];
                                        } else {
                                            $item[$key] = '';
                                        }
                                    }
                                    ?>
                                    <td class="text-center"><?php echo $i+1; ?></td>
                                    <td class="text-center"><?php echo $item['TenCD']; ?></td>
                                    <td class="text-center"><?php echo $item['MaDV']; ?></td>
                                    <td class="text-center"><?php echo $item['HoDV']; ?> <?php echo $item['TenDV']; ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($item['NgaySinh'])); ?></td>
                                    <td class="text-center"><?php
                                        if ($item['GioiTinh'] == 1) {
                                            echo 'Nam';
                                        } else {
                                            echo 'Nữ';
                                        }
                                        ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y', strtotime($item['NgayVaoDoan'])); ?></td>
                                    <td class="text-center"><?php echo $item['QueQuan']; ?></td>
                                    <td class="text-center"><?php echo $item['TenChucVu']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo url('doanvien/sua/?MaDV=' . $item['MaDV']); ?>" class="btn btn-warning btn-sm btn-flat"><i
                                                class="fa fa-pencil"></i> Sửa</a>
                                        <a href="<?php echo url('doanvien/xoa/?MaDV=' . $item['MaDV']); ?>" class="btn btn-danger btn-sm btn-flat"><i
                                                class="fa fa-trash"></i> Xóa</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php endif ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div id="modalThemDV" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm Đoàn viên</h4>
            </div>
            <div class="modal-body" style="padding: 15px;">
                <form id="frmThemDV" enctype="multipart/form-data" action="none">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Mã Đoàn viên (mã số sinh viên)</label>
                                <input type="text" class="form-control" name="MaDV"
                                    placeholder="Mã Đoàn viên (mã số sinh viên)">
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Họ và tên đệm</label>
                                        <input type="text" class="form-control" name="HoDV"
                                            placeholder="Họ và tên đệm">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control" name="TenDV" placeholder="Tên">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="Email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="SDT" placeholder="Số điện thoại">
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
                                                id="datepicker2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <div class="radio-group">
                                            <label>
                                                <input type="radio" name="GioiTinh" class="minimal-blue icheck"
                                                    value="1" checked>
                                                Nam
                                            </label>
                                            <label style="padding-left: 40px;">
                                                <input type="radio" name="GioiTinh" class="minimal-blue icheck"
                                                    value="0">
                                                Nữ
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quê quán</label>
                                <input type="text" class="form-control" name="QueQuan" placeholder="Quê quán">
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
                                                id="datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chi đoàn</label>
                                <select name="MaCD" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($listcd as $cd): ?>
                                    <option value="<?php echo $cd->MaCD; ?>"><?php echo $cd->TenCD; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select name="MaChucVu" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($listcv as $cv): ?>
                                    <option value="<?php echo $cv->MaChucVu; ?>"><?php echo $cv->TenChucVu; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin: 0px;">
                    <div id="errThemDV" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
                    <div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
                </div>
                <div class="row" style="margin: 0px;">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success btn-flat"
                        onclick="App.DoanVien.ThemDV();return false;">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
