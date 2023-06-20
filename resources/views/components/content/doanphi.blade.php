<!-- Trang home đoàn phí -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Đoàn phí</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class="form-group">
                        <label>Chọn Chi đoàn</label>
                        <select id="selectChiDoan" class="form-control select2" style="width: 100%;">
                            <?php foreach ($listcd as $cd): ?>
                            <option value="<?php echo $cd->MaCD; ?>"><?php echo $cd->TenCD; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <div class="form-group">
                        <label>Đoàn phí</label>
                        <button type="button" class="form-control btn btn-info btn-flat"
                            onclick="App.DoanPhi.XemDoanPhi(); return false;">Quản lý đoàn phí</button>
                    </div>
                </div>
            </div>

            <div id="tblDoanPhi" class="row" style="margin-top: 15px;"></div>

        </div>
    </div>
</section>
