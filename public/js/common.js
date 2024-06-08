var App = App || {};

$(function () {
    App.Site.init();
});

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(";");
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === " ") c = c.substring(1, c.length); // Remove leading spaces
        if (c.indexOf(nameEQ) === 0) {
            // Decode the cookie value before returning it
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
    }
    return null;
}

const JWT_TOKEN = getCookie("JWT_TOKEN");

if (JWT_TOKEN) {
    localStorage.setItem("JWT_TOKEN", JWT_TOKEN);
}

App.JWT_TOKEN = localStorage.getItem("JWT_TOKEN");

$.ajaxSetup({
    headers: {
        Authorization: "Bearer " + App.JWT_TOKEN,
    },
});

// Site
App.Site = (function () {
    var init = function () {
        $("select").select2();
        $("#datepicker,#datepicker2").datepicker({
            autoclose: false,
            format: "dd/mm/yyyy",
        });

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck(
            {
                checkboxClass: "icheckbox_minimal-blue",
                radioClass: "iradio_minimal-blue",
            }
        );

        $(
            'input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue'
        ).iCheck({
            checkboxClass: "icheckbox_minimal-blue",
            radioClass: "iradio_minimal-blue",
        });

        $(
            'input[type="checkbox"].flat-red, input[type="radio"].flat-red'
        ).iCheck({
            checkboxClass: "icheckbox_flat-green",
            radioClass: "iradio_flat-green",
        });

        $(
            '[data-toggle="tooltip"], [data-toggle="offcanvas"], [data-toggle="modal"]'
        ).tooltip();
    };

    var showAjaxLoading = function () {
        $("#ajaxLoadingBar").show();
    };
    var hideAjaxLoading = function () {
        $("#ajaxLoadingBar").hide();
    };

    var clickChangeSBMenu = false;
    var changeSidebar = function () {
        if (!clickChangeSBMenu) {
            clickChangeSBMenu = true;
            var sidebar;
            if ($("body").hasClass("sidebar-collapse")) {
                sidebar = 1;
            } else {
                sidebar = 0;
            }
            $.ajax({
                url: baseurl + "caidat/changeSidebar",
                type: "post",
                dataType: "json",
                data: { sidebar: sidebar },
                success: function () {
                    clickChangeSBMenu = false;
                },
            });
        }
    };

    var printThongKe = function (elem) {
        $("#btnPrint")
            .removeClass("btn-success")
            .addClass("btn-link")
            .html("waiting...")
            .attr("disabled", "disabled");
        $(elem).printThis();
        setTimeout(function () {
            $("#btnPrint")
                .addClass("btn-success")
                .removeClass("btn-link")
                .html('<i class="fa fa-print"></i> In')
                .removeAttr("disabled")
                .show(200);
        }, 850);
    };

    return {
        init: init,
        showAjaxLoading: showAjaxLoading,
        hideAjaxLoading: hideAjaxLoading,
        changeSidebar: changeSidebar,
        printThongKe: printThongKe,
    };
})();

// Tài khoản
App.TaiKhoan = (function () {
    var dangXuLy = false;

    var DangNhap = function () {
        if (dangXuLy == false) {
            dangXuLy = true;
            App.Site.showAjaxLoading();
            var frmData = $("#frmDangNhap").serialize();
            $.ajax({
                url: baseurl + "/login",
                type: "post",
                dataType: "json",
                data: frmData,
                success: function (res) {
                    dangXuLy = false;
                    App.Site.hideAjaxLoading();
                    res = res.data;
                    localStorage.setItem("JWT_TOKEN", res.token);
                    App.JWT_TOKEN = res.token;
                    console.log(localStorage.getItem("JWT_TOKEN"));
                    if (res.status) {
                        $(".login-box-body").slideUp(100);
                        $(".login-box-body")
                            .html(
                                '<div class="text-center text-success">' +
                                    res.message +
                                    "</div>"
                            )
                            .slideDown(100);
                        setTimeout(function () {
                            window.location.href = baseurl;
                        }, 1200);
                    } else {
                        $("#errDangNhap").html(res.message).slideDown();
                        setTimeout(function () {
                            $("#errDangNhap").slideUp();
                        }, 3000);
                    }
                },
            });
        }
    };

    var ThemTK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmThemTK").serialize();

            $.ajax({
                url: baseurl + "taikhoan/xulyThemTK",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errThemTK")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errThemTK").slideUp(200);
                        }, 3000);
                    } else {
                        $("#frmDangNhap").slideUp(200);
                        $("#errThemTK")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                },
            });
        }
    };

    var DoiMK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmDoiMK").serialize();

            $.ajax({
                url: baseurl + "taikhoan/xulyDoiMK",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errDoiMK")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errDoiMK").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errDoiMK")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl;
                        }, 700);
                    }
                },
            });
        }
    };

    var SuaTK = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmSuaTK").serialize();

            $.ajax({
                url: baseurl + "taikhoan/xulySuaTK",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errSuaTK")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errSuaTK").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errSuaTK")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "taikhoan";
                        }, 700);
                    }
                },
            });
        }
    };

    var XoaTK = function (tdn) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + "taikhoan/xulyXoaTK",
                type: "POST",
                data: { TENDANGNHAP: tdn },
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errXoaTK")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errXoaTK").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errXoaTK")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "taikhoan";
                        }, 700);
                    }
                },
            });
        }
    };

    return {
        ThemTK: ThemTK,
        DangNhap: DangNhap,
        DoiMK: DoiMK,
        SuaTK: SuaTK,
        XoaTK: XoaTK,
    };
})();

// Đoàn cơ sở
App.DoanCS = (function () {
    var dangXuLy = false;

    var ThemDCS = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmThemDCS").serialize();

            $.ajax({
                url: baseurl + "doancs/xulyThemDCS",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errThemDCS")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errThemDCS").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errThemDCS")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                },
            });
        }
    };

    var SuaDCS = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmSuaDCS").serialize();

            $.ajax({
                url: baseurl + "doancs/xulySuaDCS",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errSuaDCS")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errSuaDCS").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errSuaDCS")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "doancs";
                        }, 700);
                    }
                },
            });
        }
    };

    var XoaDCS = function (maDCS) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + "doancs/xulyXoaDCS",
                type: "POST",
                data: { MADCS: maDCS },
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errXoaDCS")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errXoaDCS").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errXoaDCS")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "doancs";
                        }, 700);
                    }
                },
            });
        }
    };

    return {
        ThemDCS: ThemDCS,
        SuaDCS: SuaDCS,
        XoaDCS: XoaDCS,
    };
})();

// Chi đoàn
App.ChiDoan = (function () {
    var dangXuLy = false;

    var ThemCD = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmThemCD").serialize();

            $.ajax({
                url: baseurl + "chidoan/xulyThemCD",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errThemCD")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errThemCD").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errThemCD")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                },
            });
        }
    };

    var SuaCD = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmSuaCD").serialize();

            $.ajax({
                url: baseurl + "chidoan/xulySuaCD",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errSuaCD")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errSuaCD").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errSuaCD")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "chidoan";
                        }, 700);
                    }
                },
            });
        }
    };

    var XoaCD = function (maCD) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;

            $.ajax({
                url: baseurl + "chidoan/xulyXoaCD",
                type: "POST",
                data: { MACD: maCD },
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errXoaCD")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errXoaCD").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errXoaCD")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "chidoan";
                        }, 700);
                    }
                },
            });
        }
    };

    return {
        ThemCD: ThemCD,
        SuaCD: SuaCD,
        XoaCD: XoaCD,
    };
})();

// Đoàn viên
App.DoanVien = (function () {
    var dangXuLy = false;

    var ThemDV = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmThemDV").serialize();

            App.Site.hideAjaxLoading();

            $.ajax({
                url: baseurl + "/api/doanvien",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    res = res.data;
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errThemDV")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errThemDV").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errThemDV")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                },
            });
        }
    };

    var SuaDV = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmSuaDV").serialize();
            const maDV = $("[name='MaDV']").attr("value");
            $.ajax({
                url: `${baseurl}/api/doanvien/${maDV}`,
                type: "PUT",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errSuaDV")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errSuaDV").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errSuaDV")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            console.log("rd");
                            window.location.href = baseurl + "/doanvien";
                        }, 700);
                    }
                },
            });
        }
    };

    var XoaDV = function (maDV) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            $.ajax({
                url: `${baseurl}/api/doanvien/${maDV}`,
                type: "DELETE",
                dataType: "json",
                success: function (res) {
                    res = res.data;
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errXoaDV")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errXoaDV").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errXoaDV")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "/doanvien";
                        }, 700);
                    }
                },
            });
        }
    };

    return {
        ThemDV: ThemDV,
        SuaDV: SuaDV,
        XoaDV: XoaDV,
    };
})();

App.DoanPhi = (function () {
    var dangXuLy = false;

    var XemDoanPhi = function () {
        if (dangXuLy == false) {
            $("#tblDoanPhi").html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var maCD = $("#selectChiDoan").val();
            console.log(maCD);

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $.ajax({
                url: `${baseurl}/api/doanphi/view/${maCD}`,
                type: "GET",
                dataType: "json",
                success: function (html) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;

                    $("#tblDoanPhi").html(html.data).slideDown(200);

                    App.Site.init();
                },
                timeout: 3000,
            });
        }
    };

    var CapNhat = function (maDV) {
        if (dangXuLy == false) {
            $("#btnLuu_" + maDV)
                .removeClass("btn-warning")
                .addClass("btn-link")
                .html("waiting...")
                .attr("disabled", "disabled");
            dangXuLy = true;
            var val = [];
            let data = { MaDV: maDV };

            $('input[name="dp_' + maDV + '[]"]').each(function () {
                if (this.checked) {
                    data["HK" + $(this).val()] = 1;
                    // val.push($(this).val());
                } else {
                    data["HK" + $(this).val()] = 0;
                }
            });

            $.ajax({
                url: `${baseurl}/api/doanphi`,
                type: "POST",
                data: data,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    dangXuLy = false;
                    $("#btnLuu_" + maDV)
                        .addClass("text-success")
                        .html('<i class="fa fa-check"></i> Xong')
                        .fadeIn(200);
                    setTimeout(function () {
                        $("#btnLuu_" + maDV)
                            .addClass("btn-warning")
                            .removeClass("btn-link")
                            .html('<i class="fa fa-save"></i> Lưu')
                            .removeAttr("disabled")
                            .show(500);
                    }, 500);
                },
            });
        }
    };

    var LuuLich = function () {
        console.log("Luu Lich");
        if (dangXuLy == false) {
            $("#btnLuuLich")
                .removeClass("btn-warning")
                .addClass("btn-link")
                .html("waiting...")
                .attr("disabled", "disabled");
            dangXuLy = true;
            var thoigian = $('input[name="thoigian"]').val();
            var hocky = $('input[name="hocky"]').val();
            var chidoan = $("#selectChiDoan").val();

            let data = { ThoiDiem: thoigian, HocKy: hocky, MaCD: chidoan };
            console.log(data);
            $.ajax({
                url: baseurl + "/lich",
                type: "POST",
                data: data,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    dangXuLy = false;
                    $("#btnLuuLich")
                        .addClass("text-success")
                        .html('<i class="fa fa-check"></i> Xong')
                        .fadeIn(200);
                    setTimeout(function () {
                        $("#btnLuuLich")
                            .addClass("btn-warning")
                            .removeClass("btn-link")
                            .html('<i class="fa fa-save"></i> Lưu')
                            .removeAttr("disabled")
                            .show(500);
                    }, 500);
                },
            });
        }
    };

    return {
        XemDoanPhi: XemDoanPhi,
        CapNhat: CapNhat,
        LuuLich: LuuLich,
    };
})();

App.RenLuyen = (function () {
    var dangXuLy = false;

    var XemRenLuyen = function () {
        if (dangXuLy == false) {
            $("#tblRenLuyen").html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var maCD = $("#selectChiDoan").val();
            var hocky = $("#selectHocKy").val();

            $.ajax({
                url: `${baseurl}/api/renluyen/view/${maCD}/${hocky}`,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    $("#tblRenLuyen").html(response.data).slideDown(200);

                    App.Site.init();
                },
            });
        }
    };

    var TaoMoi = function (maDV) {
        if (dangXuLy == false) {
            $("#btnLuu_" + maDV)
                .removeClass("btn-warning")
                .addClass("btn-link")
                .html("waiting...")
                .attr("disabled", "disabled");
            dangXuLy = true;
            var diem = $('input[name="Diem_' + maDV + '"]').val();
            var xeploai = $('select[name="XepLoai_' + maDV + '"]').val();
            var hocky = $("#selectHocKy").val();
            var data = {
                MaDV: maDV,
                HocKy: `HK${hocky}`,
                Diem: diem,
                XepLoai: xeploai,
            };
            $.ajax({
                url: `${baseurl}/api/renluyen`,
                type: "POST",
                data: data,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    dangXuLy = false;
                    $("#btnLuu_" + maDV)
                        .addClass("text-success")
                        .html('<i class="fa fa-check"></i> Xong')
                        .fadeIn(200);
                    setTimeout(function () {
                        $("#btnLuu_" + maDV)
                            .addClass("btn-warning")
                            .removeClass("btn-link")
                            .html('<i class="fa fa-save"></i> Lưu')
                            .removeAttr("disabled")
                            .show(500);
                    }, 500);
                },
                error: function (err) {},
                statusCode: {
                    // Resource already created, update
                    201: function () {
                        CapNhat(maDV);
                    },
                },
            });
        }
    };

    var CapNhat = function (maDV) {
        if (dangXuLy == false) {
            $("#btnLuu_" + maDV)
                .removeClass("btn-warning")
                .addClass("btn-link")
                .html("waiting...")
                .attr("disabled", "disabled");
            dangXuLy = true;
            var diem = $('input[name="Diem_' + maDV + '"]').val();
            var xeploai = $('select[name="XepLoai_' + maDV + '"]').val();
            var hocky = $("#selectHocKy").val();
            var data = {
                MaDV: maDV,
                HocKy: `HK${hocky}`,
                Diem: diem,
                XepLoai: xeploai,
            };
            $.ajax({
                url: `${baseurl}/api/renluyen`,
                type: "PUT",
                data: data,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    dangXuLy = false;
                    $("#btnLuu_" + maDV)
                        .addClass("text-success")
                        .html('<i class="fa fa-check"></i> Xong')
                        .fadeIn(200);
                    setTimeout(function () {
                        $("#btnLuu_" + maDV)
                            .addClass("btn-warning")
                            .removeClass("btn-link")
                            .html('<i class="fa fa-save"></i> Lưu')
                            .removeAttr("disabled")
                            .show(500);
                    }, 500);
                },
                error: function (err) {},
            });
        }
    };

    var CapNhatAll = function () {
        var list_maDV = $("input[id^='select_']")
            .map(function (i, el) {
                if (this.id != "select_all" && this.checked == true) {
                    return this.id.split("_")[1];
                } else return undefined;
            })
            .get();
        if (dangXuLy == false) {
            $("#btnLuu_all")
                .removeClass("btn-warning")
                .addClass("btn-link")
                .html("waiting...")
                .attr("disabled", "disabled");
            dangXuLy = true;
            var diem = $('input[name="Diem_all"]').val();
            var xeploai = $('select[name="XepLoai_all"]').val();
            var hocky = $("#selectHocKy").val();
            var data = {
                list_maDV: list_maDV,
                HocKy: `HK${hocky}`,
                Diem: diem,
                XepLoai: xeploai,
            };

            var promises = [];

            list_maDV.forEach((maDV) => {
                var data = {
                    MaDV: maDV,
                    HocKy: `HK${hocky}`,
                    Diem: diem,
                    XepLoai: xeploai,
                };
                promises.push(
                    $.ajax({
                        url: `${baseurl}/api/renluyen`,
                        type: "POST",
                        data: data,
                        dataType: "json",
                        error: function (err) {},
                        statusCode: {
                            // Resource already created, update
                            201: function () {
                                promises.push(
                                    $.ajax({
                                        url: `${baseurl}/api/renluyen`,
                                        type: "PUT",
                                        data: data,
                                        dataType: "json",
                                        error: function (err) {},
                                    })
                                );
                            },
                        },
                    })
                );
            });

            Promise.all(promises).then(() => {
                dangXuLy = false;
                $("#btnLuu_all")
                    .addClass("text-success")
                    .html('<i class="fa fa-check"></i> Xong')
                    .fadeIn(200);
                setTimeout(function () {
                    $("#btnLuu_all")
                        .addClass("btn-warning")
                        .removeClass("btn-link")
                        .html('<i class="fa fa-save"></i> Lưu')
                        .removeAttr("disabled")
                        .show(500);
                }, 500);
                App.RenLuyen.XemRenLuyen();
            });
        }
    };

    return {
        XemRenLuyen: XemRenLuyen,
        CapNhat: CapNhat,
        TaoMoi: TaoMoi,
        CapNhatAll: CapNhatAll,
    };
})();

App.ThongKe = (function () {
    var dangXuLy = false;

    var XemThongKe = function () {
        if (dangXuLy == false) {
            $("#tblThongKe").html('<div id="ajaxLoadingBar"></div>');
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var loaiThongKe = $("#selectThongKe").val();
            var maCD = $("#selectChiDoan").val();
            var hocky = $("#selectHocKy").val();

            $.ajax({
                url: baseurl + "thongke/xulyXemThongKe",
                type: "POST",
                data: { LOAI: loaiThongKe, MACD: maCD, HOCKY: hocky },
                dataType: "json",
                success: function (html) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;

                    $("#tblThongKe").html(html).slideDown(500);

                    App.Site.init();
                },
            });
        }
    };

    return {
        XemThongKe: XemThongKe,
    };
})();

App.ThongBao = (function () {
    var dangXuLy = false;

    var ThemTB = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmThemTB").serialize();

            App.Site.hideAjaxLoading();

            $.ajax({
                url: baseurl + "/api/thongbao",
                type: "POST",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    res = res.data;
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errThemTB")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errThemTB").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errThemTB")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            location.reload();
                        }, 700);
                    }
                },
            });
        }
    };

    var SuaDV = function () {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            var frmData = $("#frmSuaDV").serialize();
            const maDV = $("[name='MaDV']").attr("value");
            $.ajax({
                url: `${baseurl}/api/doanvien/${maDV}`,
                type: "PUT",
                data: frmData,
                dataType: "json",
                success: function (res) {
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errSuaDV")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errSuaDV").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errSuaDV")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            console.log("rd");
                            window.location.href = baseurl + "/doanvien";
                        }, 700);
                    }
                },
            });
        }
    };

    var XoaDV = function (maDV) {
        if (dangXuLy == false) {
            App.Site.showAjaxLoading();
            dangXuLy = true;
            $.ajax({
                url: `${baseurl}/api/doanvien/${maDV}`,
                type: "DELETE",
                dataType: "json",
                success: function (res) {
                    res = res.data;
                    App.Site.hideAjaxLoading();
                    dangXuLy = false;
                    if (res.status == false) {
                        $("#errXoaDV")
                            .removeClass("text-success")
                            .addClass("text-danger")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            $("#errXoaDV").slideUp(200);
                        }, 3000);
                    } else {
                        $("#errXoaDV")
                            .removeClass("text-danger")
                            .addClass("text-success")
                            .html(res.message)
                            .slideDown(200);

                        setTimeout(function () {
                            window.location.href = baseurl + "/doanvien";
                        }, 700);
                    }
                },
            });
        }
    };

    return {
        ThemTB: ThemTB,
        SuaDV: SuaDV,
        XoaDV: XoaDV,
    };
})();
