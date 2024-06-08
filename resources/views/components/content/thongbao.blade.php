<div id="content-DoanVien">
    <section class="content">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Thông báo</h3>
            </div>
            <!-- Main content -->
            <div class="box-body">
                @if (\Auth::user()->Quyen == 10)
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-success btn-flat" data-toggle="modal"
                                data-target="#modalThemDV"><i class="fa fa-plus"></i> Thêm mới</button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-2 text-bold"> Nguời gửi </div>
                    <div class="col-xs-8 text-bold"> Nội dung </div>
                    <div class="col-xs-2 text-bold"> Thời gian </div>
                </div>

                @foreach ($listTB as $thongbao)
                    <div class="row">
                        <div class="col-xs-2"> {{ $thongbao->HoDV . ' ' . $thongbao->TenDV }} </div>
                        <div class="col-xs-8"> {{ $thongbao->NoiDung }}</div>
                        <div class="col-xs-2"> {{ $thongbao->created_at }} </div>
                    </div>
                @endforeach
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
                <h4 class="modal-title">Thêm thông báo</h4>
            </div>
            <div class="modal-body" style="padding: 15px;">
                <form id="frmThemTB" enctype="multipart/form-data" action="none">
                    <div class="row">
                        <div class=" col-xs-12">
                            <div class="form-group">
                                <label>Thông báo tới (Khóa)</label>
                                <input type="text" class="form-control" name="Khoa"
                                    placeholder="Mã Đoàn viên (mã số sinh viên)">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="NoiDung" rows="3" placeholder="Nội dung thông báo"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row" style="margin: 0px;">
                    <div id="errThemTB" class="pull-right" style="display: none;margin-bottom: 10px;"></div>
                    <div id="ajaxLoadingBar" style="display: none;margin-bottom: 10px;"></div>
                </div>
                <div class="row" style="margin: 0px;">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-success btn-flat"
                        onclick="App.ThongBao.ThemTB();return false;">Thêm</button>
                </div>
            </div>
        </div>
    </div>
</div>
