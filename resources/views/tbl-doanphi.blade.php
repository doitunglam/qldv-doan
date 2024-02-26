<!-- Bảng dữ liệu đoàn phí -->
@php($listDP = json_decode($listDP))
<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <h4>
                Tạo mail nhắc nộp đoàn phí
            </h4>
        </div>
        <div class="col-xs-4">
            <label for="thoigian">Thời gian gửi mail: </label>
        </div>
        <div class="col-xs-4">
            <label for="hocky">Mã học kỳ: </label>
        </div>
    </div>
</div>

<div class="col-xs-12" style="margin-bottom: 20px">
    <div class="row">
        <div class="col-xs-4">
            <input type="text" class="form-control pull-right" name="thoigian" id="datepicker2">
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="hocky">
        </div>
        <div class="col-xs-2">
            <button id="btnLuuLich" type="button" class="btn btn-warning btn-flat btn-sm"
                onclick="App.DoanPhi.LuuLich(); return false;"><i class="fa fa-save"></i>
                Lưu</button>
        </div>
    </div>
</div>
<div class="col-xs-12">
    <div class="table-responsive">
        <?php if ($listDP != null) { ?>
        <table class="table table-bordered table-hover">
            <tr class="bg-green">
                <th class="text-center">STT</th>
                <th class="text-center">Mã đoàn viên</th>
                <th class="text-center">Họ tên đoàn viên</th>
                <th class="text-center">HK1</th>
                <th class="text-center">HK2</th>
                <th class="text-center">HK3</th>
                <th class="text-center">HK4</th>
                <th class="text-center">HK5</th>
                <th class="text-center">HK6</th>
                <th class="text-center">HK7</th>
                <th class="text-center">HK8</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php foreach ($listDP as $i => $dvO): ?>
            @php($dv = json_decode(json_encode($dvO), true))
            <tr>
                <td class="text-center"><?php echo $i + 1; ?></td>
                <td class="text-center"><?php echo $dv['MaDV']; ?></td>
                <td class="text-center"><?php echo $dv['HoDV']; ?> <?php echo $dv['TenDV']; ?></td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="1"
                        <?php echo $dv['HK1'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="2"
                        <?php echo $dv['HK2'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="3"
                        <?php echo $dv['HK3'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="4"
                        <?php echo $dv['HK4'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="5"
                        <?php echo $dv['HK5'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="6"
                        <?php echo $dv['HK6'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="7"
                        <?php echo $dv['HK7'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="form-group text-center">
                    <input name="dp_<?php echo $dv['MaDV']; ?>[]" type="checkbox" class="minimal" value="8"
                        <?php echo $dv['HK8'] != 0 ? 'checked' : ''; ?>>
                </td>
                <td class="text-center">
                    <button id="btnLuu_<?php echo $dv['MaDV']; ?>" type="button" class="btn btn-warning btn-flat btn-sm"
                        onclick="App.DoanPhi.CapNhat('<?php echo $dv['MaDV']; ?>'); return false;"><i class="fa fa-save"></i>
                        Lưu</button>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <?php } else { echo '<span class="text-danger">Không có dữ liệu</span>'; } ?>
    </div>
</div>
