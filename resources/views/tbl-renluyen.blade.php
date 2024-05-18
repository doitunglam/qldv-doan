@php($listRL = json_decode($listRL, true))
<script>
    $("input[id^='select_']").each(function(i, el) {
        if (el.id == "select_all") {
            $(this).on('change', function() {
                if (this.checked) {
                    $("input[id^='select_']").each(function(i, el) {
                        el.checked = true;
                    })
                } else {
                    $("input[id^='select_']").each(function(i, el) {
                        el.checked = false;
                    })
                }

            })
        } else {
            $(this).on('change', function() {
                if (this.checked) {
                    var allChecked = true;
                    $("input[id^='select_']").each(function(i, el) {
                        allChecked = this.checked == true ? true : false;
                    })
                    if (allChecked) {
                        $("input[id^='select_all']").each(function(i, el) {
                            this.checked = true;
                        })
                    }
                } else {
                    $("input[id^='select_all']").each(function(i, el) {
                        this.checked = false;
                    })
                }

            })
        }
    })
</script>
<div class="col-xs-12">
    <div class="table-responsive">
        <?php if ($listRL != null) { ?>
        <table class="table table-bordered table-hover">
            <tr class="bg-green">
                <th></th>
                <th class="text-center">STT</th>
                <th class="text-center">Mã đoàn viên</th>
                <th class="text-center">Họ tên đoàn viên</th>
                <th class="text-center">Điểm</th>
                <th class="text-center">Xếp loại</th>
                <th class="text-center">Thao tác</th>
            </tr>
            <tr>
                <td class="text-center"><input type="checkbox" id="select_all"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="form-group">
                    <input name="Diem_all" data-toggle="tooltip" data-placement="right" title="0 - 100" type="number"
                        class="form-control" value="0" min="0" max="100" step="1">
                </td>
                <td class="text-center">
                    <select name="XepLoai_all" class="form-control select2" style="width: 100%;">
                        <option value="Chưa xếp loại">Chưa xếp loại</option>
                        <option value="Xuất sắc">Xuất sắc</option>
                        <option value="Khá">Khá</option>
                        <option value="Trung bình">Trung bình</option>
                        <option value="Yếu">Yếu</option>
                    </select>
                </td>
                <td class="text-center">
                    <button id="btnLuu_all" type="button" class="btn btn-warning btn-flat btn-sm"
                        onclick="App.RenLuyen.CapNhatAll(); return false;"><i class="fa fa-save"></i>
                        Lưu</button>
                </td>
            </tr>
            <?php foreach ($listRL as $i => $dv): ?>
            <tr>
                <td class="text-center">
                    <input type="checkbox" id="select_<?php echo $dv['MaDV']; ?>">
                </td>
                <td class="text-center"><?php echo $i + 1; ?></td>
                <td class="text-center"><?php echo $dv['MaDV']; ?></td>
                <td class="text-center"><?php echo $dv['HoDV']; ?> <?php echo $dv['TenDV']; ?></td>
                <td class="form-group">
                    <input name="Diem_<?php echo $dv['MaDV']; ?>" data-toggle="tooltip" data-placement="right" title="0 - 100"
                        type="number" class="form-control" value="<?php echo $dv['Diem']; ?>" min="0" max="100"
                        step="1">
                </td>
                <td class="text-center">
                    <select name="XepLoai_<?php echo $dv['MaDV']; ?>" class="form-control select2" style="width: 100%;">
                        <option value="Chưa xếp loại" <?php echo $dv['XepLoai'] == 'Chưa xếp loại' ? 'selected' : ''; ?>>Chưa xếp loại</option>
                        <option value="Xuất sắc" <?php echo $dv['XepLoai'] == 'Xuất sắc' ? 'selected' : ''; ?>>Xuất sắc</option>
                        <option value="Khá" <?php echo $dv['XepLoai'] == 'Khá' ? 'selected' : ''; ?>>Khá</option>
                        <option value="Trung bình" <?php echo $dv['XepLoai'] == 'Trung bình' ? 'selected' : ''; ?>>Trung bình</option>
                        <option value="Yếu" <?php echo $dv['XepLoai'] == 'Yếu' ? 'selected' : ''; ?>>Yếu</option>
                    </select>
                </td>
                <td class="text-center">
                    <button id="btnLuu_<?php echo $dv['MaDV']; ?>" type="button" class="btn btn-warning btn-flat btn-sm"
                        onclick="App.RenLuyen.TaoMoi('<?php echo $dv['MaDV']; ?>'); return false;"><i class="fa fa-save"></i>
                        Lưu</button>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <?php } else { echo '<span class="text-danger">Không có dữ liệu</span>'; } ?>
    </div>
</div>
