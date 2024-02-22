<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Rèn luyện</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>Chọn Chi đoàn</label>
                        <select id="selectChiDoan" class="form-control select2" style="width: 100%;">
                            <?php foreach ($listcd as $cd): ?>
                            <option value="<?php echo $cd['MaCD']; ?>"><?php echo $cd['TenCD']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
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
                        <label>Rèn luyện</label>
                        <button type="button" class="form-control btn btn-info btn-flat"
                            onclick="App.RenLuyen.XemRenLuyen(); return false;">Quản lý rèn luyện</button>
                    </div>
                </div>
            </div>
            <div id="tblRenLuyen" class="row" style="margin-top: 15px;"></div>
        </div>
    </div>
</section>
