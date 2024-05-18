<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">THỐNG KÊ</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <label>Chọn Thống kê</label>
                        <select id="selectThongKe" class="form-control select2" style="width: 100%;">
                            <option value="DOANPHI">Đoàn phí</option>
                            <option value="RENLUYEN">Rèn luyện</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>Chọn Chi đoàn</label>
                        <select id="selectChiDoan" class="form-control select2" style="width: 100%;">
                            <?php foreach ($listcd as $cd): ?>
                            <option value="<?php echo $cd->MaCD; ?>"><?php echo $cd->TenCD; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="form-group">
                        <label>Chọn học kỳ</label>
                        <select id="selectHocKy" class="form-control select2" style="width: 100%;">
                            <?php for ($i = 1; $i <= 8; $i++) {
                                echo '<option value="' . $i . '">HK' . $i . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="form-group">
                        <label>Thống kê</label>
                        <button type="button" class="form-control btn btn-info btn-flat"
                            onclick="App.ThongKe.XemThongKe(); return false;">Xem thống kê</button>
                    </div>
                </div>
            </div>

            <div id="tblThongKe" class="row" style="margin-top: 15px;"></div>

        </div>
    </div>
</section>
