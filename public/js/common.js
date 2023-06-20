var App = App || {};

$(function () {
    App.Site.init();
});
// Site
App.Site = function () {

    var init = function () {
        $('select').select2();
        $('#datepicker,#datepicker2').datepicker({
            autoclose: false,
            format: 'dd/mm/yyyy'
        });

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $('[data-toggle="tooltip"], [data-toggle="offcanvas"], [data-toggle="modal"]').tooltip();

    };

    var showAjaxLoading = function () {
        $('#ajaxLoadingBar').show();
    };
    var hideAjaxLoading = function () {
        $('#ajaxLoadingBar').hide();
    };

    var clickChangeSBMenu = false;
    var changeSidebar = function () {
        if (!clickChangeSBMenu) {
            clickChangeSBMenu = true;
            var sidebar;
            if ($('body').hasClass('sidebar-collapse')) {
                sidebar = 1;
            } else {
                sidebar = 0;
            }
            $.ajax({
                url: baseurl + 'caidat/changeSidebar',
                type: 'post',
                dataType: 'json',
                data: { sidebar: sidebar },
                success: function () {
                    clickChangeSBMenu = false;
                }
            });
        }
    };

    var printThongKe = function (elem) {

        $('#btnPrint').removeClass('btn-success').addClass('btn-link').html('waiting...').attr('disabled', 'disabled');
        $(elem).printThis();
        setTimeout(function () {
            $('#btnPrint').addClass('btn-success').removeClass('btn-link').html('<i class="fa fa-print"></i> In').removeAttr('disabled').show(200);
        }, 850);

    };

    return {
        init: init,
        showAjaxLoading: showAjaxLoading,
        hideAjaxLoading: hideAjaxLoading,
        changeSidebar: changeSidebar,
        printThongKe: printThongKe
    };
}();

// Tài khoản
App.TaiKhoan = function () {

    var dangXuLy = false;

    var DangNhap = function () {
        if (dangXuLy == false) {
            dangXuLy = true;
            App.Site.showAjaxLoading();
            var frmData = $('#frmDangNhap').serialize();
            $.ajax({
                url: baseurl + '/login',
                type: 'post',
                dataType: 'json',
                data: frmData,
                success: function (res) {
                    dangXuLy = false;
                    App.Site.hideAjaxLoading();
                    res = res.data;
                    console.log(res);
                    if (res.status) {
                        $('.login-box-body').slideUp(100);
                        $('.login-box-body').html('<div class="text-center text-success">' + res.message + '</div>').slideDown(100);
                        setTimeout(function () {
                            window.location.href = baseurl;
                        }, 1200);
                    } else {
                        $('#errDangNhap').html(res.message).slideDown();
                        setTimeout(function () {
                            $('#errDangNhap').slideUp();
                        }, 3000);
                    }
                }
            });
        }
    };

    var ThemTK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmThemTK').serialize();

            $.ajax({
                url: baseurl + 'taikhoan/xulyThemTK',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errThemTK').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errThemTK').slideUp(200);
                        }, 3000);
                    } else {
                        $('#frmDangNhap').slideUp(200);
                        $('#errThemTK').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                }
            });
        }
    };

    var DoiMK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmDoiMK').serialize();

            $.ajax({
                url: baseurl + 'taikhoan/xulyDoiMK',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errDoiMK').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errDoiMK').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errDoiMK').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl;
                        }, 700);
                    }
                }
            });
        }
    };

    var SuaTK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmSuaTK').serialize();

            $.ajax({
                url: baseurl + 'taikhoan/xulySuaTK',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errSuaTK').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errSuaTK').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errSuaTK').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'taikhoan';
                        }, 700);
                    }
                }
            });
        }
    };

    var XoaTK = function (tdn) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + 'taikhoan/xulyXoaTK',
                type: 'POST',
                data: { TENDANGNHAP: tdn },
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errXoaTK').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errXoaTK').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errXoaTK').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'taikhoan';
                        }, 700);
                    }
                }
            });
        }
    };

    return {
        ThemTK: ThemTK,
        DangNhap: DangNhap,
        DoiMK: DoiMK,
        SuaTK: SuaTK,
        XoaTK: XoaTK
    };
}();

// Đoàn cơ sở
App.DoanCS = function () {

    var dangXuLy = false;

    var ThemDCS = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmThemDCS').serialize();

            $.ajax({
                url: baseurl + 'doancs/xulyThemDCS',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errThemDCS').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errThemDCS').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errThemDCS').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                }
            });
        }
    };

    var SuaDCS = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmSuaDCS').serialize();

            $.ajax({
                url: baseurl + 'doancs/xulySuaDCS',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errSuaDCS').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errSuaDCS').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errSuaDCS').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'doancs';
                        }, 700);
                    }
                }
            });
        }
    };

    var XoaDCS = function (maDCS) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + 'doancs/xulyXoaDCS',
                type: 'POST',
                data: { MADCS: maDCS },
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errXoaDCS').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errXoaDCS').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errXoaDCS').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'doancs';
                        }, 700);
                    }
                }
            });
        }
    };

    return {
        ThemDCS: ThemDCS,
        SuaDCS: SuaDCS,
        XoaDCS: XoaDCS
    };
}();

// Chi đoàn
App.ChiDoan = function () {

    var dangXuLy = false;

    var ThemCD = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmThemCD').serialize();

            $.ajax({
                url: baseurl + 'chidoan/xulyThemCD',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errThemCD').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errThemCD').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errThemCD').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                }
            });
        }
    };

    var SuaCD = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmSuaCD').serialize();

            $.ajax({
                url: baseurl + 'chidoan/xulySuaCD',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errSuaCD').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errSuaCD').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errSuaCD').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'chidoan';
                        }, 700);
                    }
                }
            });
        }
    };

    var XoaCD = function (maCD) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + 'chidoan/xulyXoaCD',
                type: 'POST',
                data: { MACD: maCD },
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errXoaCD').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errXoaCD').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errXoaCD').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'chidoan';
                        }, 700);
                    }
                }
            });
        }
    };

    return {
        ThemCD: ThemCD,
        SuaCD: SuaCD,
        XoaCD: XoaCD
    };
}();

// Đoàn viên
App.DoanVien = function () {

    var dangXuLy = false;

    var ThemDV = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmThemDV').serialize();

            App.Site.hideAjaxLoading();

            $.ajax({
                url: baseurl + '/doanvien/them',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    res = res.data;
                    dangXuLy = false;
                    // console.log(res);
                    if (res.status == false) {
                        $('#errThemDV').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errThemDV').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errThemDV').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                }
            });
        }
    };

    var SuaDV = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $('#frmSuaDV').serialize();

            $.ajax({
                url: baseurl + '/doanvien/sua',
                type: 'POST',
                data: frmData,
                dataType: 'json',
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errSuaDV').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errSuaDV').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errSuaDV').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + 'doanvien';
                        }, 700);
                    }
                }
            });
        }
    };

    var XoaDV = function (maDV) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            $.ajax({
                url: baseurl + '/doanvien/xoa',
                type: 'POST',
                data: { MaDV: maDV },
                dataType: 'json',
                success: function (res) {
                    res = res.data;
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $('#errXoaDV').removeClass('text-success').addClass('text-danger').html(res.message).slideDown(200);

                        setTimeout(function () {
                            $('#errXoaDV').slideUp(200);
                        }, 3000);
                    } else {
                        $('#errXoaDV').removeClass('text-danger').addClass('text-success').html(res.message).slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + '/doanvien';
                        }, 700);
                    }
                }
            });
        }
    };

    return {
        ThemDV: ThemDV,
        SuaDV: SuaDV,
        XoaDV: XoaDV
    };
}();

App.DoanPhi = function () {

    var dangXuLy = false;

    var XemDoanPhi = function () {
        if (dangXuLy == false) {
            $('#tblDoanPhi').html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var maCD = $('#selectChiDoan').val();
            console.log(maCD);

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $.ajax({
                url: baseurl + '/doanphi/data',
                type: 'POST',
                data: { MACD: maCD },
                dataType: 'json',
                success: function (html) {
                    // why the fuck did server return html??? is it server's responsibility ???
                    console.log(html);
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;

                    $('#tblDoanPhi').html(html.data).slideDown(200);

                    App.Site.init();
                },
                timeout: 3000
            });
        }
    };

    var CapNhat = function (maDV) {
        if (dangXuLy == false) {
            $('#btnLuu_' + maDV).removeClass('btn-warning').addClass('btn-link').html('waiting...').attr('disabled', 'disabled');
            dangXuLy = true;
            var val = [];
            let data = { MaDV: maDV };


            $('input[name="dp_' + maDV + '[]"]').each(function () {
                if ((this).checked) {
                    data['HK' + $(this).val()] = 1;
                    // val.push($(this).val());
                } else {
                    data['HK' + $(this).val()] = 0;
                }
            });

            $.ajax({
                url: baseurl + '/doanphi/entry',
                type: 'POST',
                // data: { MADV: maDV, DOANPHI: val },
                data: data,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    dangXuLy = false;
                    $('#btnLuu_' + maDV).addClass('text-success').html('<i class="fa fa-check"></i> Xong').fadeIn(200);
                    setTimeout(function () {
                        $('#btnLuu_' + maDV).addClass('btn-warning').removeClass('btn-link').html('<i class="fa fa-save"></i> Lưu').removeAttr('disabled').show(500);
                    }, 500);
                }
            });
        }
    };

    return {
        XemDoanPhi: XemDoanPhi,
        CapNhat: CapNhat
    };
}();

App.RenLuyen = function () {

    var dangXuLy = false;

    var XemRenLuyen = function () {
        if (dangXuLy == false) {
            $('#tblRenLuyen').html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var maCD = $('#selectChiDoan').val();
            var hocky = $('#selectHocKy').val();

            $.ajax({
                url: baseurl + 'renluyen/xulyGetRenLuyenChiDoan',
                type: 'POST',
                data: { MACD: maCD, HOCKY: hocky },
                dataType: 'json',
                success: function (html) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;

                    $('#tblRenLuyen').html(html).slideDown(200);

                    App.Site.init();
                }
            });
        }
    };

    var CapNhat = function (maDV, hocky) {
        if (dangXuLy == false) {
            $('#btnLuu_' + maDV).removeClass('btn-warning').addClass('btn-link').html('waiting...').attr('disabled', 'disabled');
            dangXuLy = true;
            var diem = $('input[name="diem_' + maDV + '"]').val();
            var xeploai = $('select[name="xeploai_' + maDV + '"]').val();
            $.ajax({
                url: baseurl + 'renluyen/xulyCapNhatRenLuyen',
                type: 'POST',
                data: { MADV: maDV, HOCKY: hocky, DIEM: diem, XEPLOAI: xeploai },
                dataType: 'json',
                success: function (res) {
                    dangXuLy = false;
                    $('#btnLuu_' + maDV).addClass('text-success').html('<i class="fa fa-check"></i> Xong').fadeIn(200);
                    setTimeout(function () {
                        $('#btnLuu_' + maDV).addClass('btn-warning').removeClass('btn-link').html('<i class="fa fa-save"></i> Lưu').removeAttr('disabled').show(500);
                    }, 500);
                }
            });
        }
    };

    return {
        XemRenLuyen: XemRenLuyen,
        CapNhat: CapNhat
    };
}();

App.ThongKe = function () {

    var dangXuLy = false;

    var XemThongKe = function () {
        if (dangXuLy == false) {
            $('#tblThongKe').html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var loaiThongKe = $('#selectThongKe').val();
            var maCD = $('#selectChiDoan').val();
            var hocky = $('#selectHocKy').val();

            $.ajax({
                url: baseurl + 'thongke/xulyXemThongKe',
                type: 'POST',
                data: { LOAI: loaiThongKe, MACD: maCD, HOCKY: hocky },
                dataType: 'json',
                success: function (html) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;

                    $('#tblThongKe').html(html).slideDown(500);

                    App.Site.init();
                }
            });
        }
    };

    return {
        XemThongKe: XemThongKe
    };
}();
