<div id="content-DoanVien">
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Quản lý Đoàn viên <small> - Trang chính</small></h3>
            </div>
            <div class="box-body">
                <form id="frmThemDV" enctype="multipart/form-data" action="none">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Mã Đoàn viên (mã số sinh viên)</label>
                                <input type="text" class="form-control" name="MaDV" readonly
                                    placeholder="{{ $doanvien->MaDV }}">
                            </div>
                            <div class="form-group">
                                <label>Quê quán</label>
                                <input type="text" class="form-control" name="QueQuan"
                                    placeholder="{{ $doanvien->QueQuan }}" readonly>
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
                                             value="{{ $doanvien->NgayVaoDoan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Họ và tên đệm</label>
                                <input type="text" class="form-control" name="HoDV"
                                    placeholder="{{ $doanvien->HoDV }}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="TenDV"
                                    placeholder="{{ $doanvien->TenDV }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="Email"
                                    placeholder="{{ $doanvien->Email }}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="SDT"
                                    placeholder="{{ $doanvien->SDT }}" readonly>
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
                                        value="{{ $doanvien->NgaySinh }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <div class="radio-group">
                                    <label>
                                        <input type="radio" name="GioiTinh" class="minimal-blue icheck" value="1"
                                            @if ($doanvien->GioiTinh == '1') checked @endif disabled>
                                        Nam
                                    </label>
                                    <label style="padding-left: 40px;">
                                        <input type="radio" name="GioiTinh" class="minimal-blue icheck" value="0"
                                            @if ($doanvien->GioiTinh == '0') checked @endif disabled>
                                        Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Tên chi đoàn</label>
                                <input type="text" class="form-control" name="TenCD"
                                    placeholder="{{ $doanvien->TenCD }}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Tên chức vụ</label>
                                <input type="text" class="form-control" name="TenChucVu"
                                    placeholder="{{ $doanvien->TenChucVu }}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
