<?php $sbpage = "az" ?>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">DANH MỤC MENU</li>

            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'home' ? 'active' : ''; ?>">
                <a href="<?php echo url('/'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
                </a>
            </li>

            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'doanvien' ? 'active' : ''; ?>">
                <a href="<?php echo url('doanvien'); ?>">
                    <i class="fa fa-users"></i> <span>Đoàn viên</span>
                </a>
            </li>

            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'chidoan' ? 'active' : ''; ?>">
                <a href="<?php echo url('chidoan'); ?>">
                    <i class="fa fa-building"></i> <span>Chi đoàn</span>
                </a>
            </li>
            {{-- <?php if ($this->session->userdata('QUYEN') >= 1): ?>
            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'doancs' ? 'active' : ''; ?>">
                <a href="<?php echo url('doancs'); ?>">
                    <i class="fa fa-university"></i> <span>Đoàn cơ sở</span>
                </a>
            </li>
            <?php endif ?> --}}
            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'renluyen' ? 'active' : ''; ?>">
                <a href="<?php echo url('renluyen'); ?>">
                    <i class="fa fa-child"></i> <span>Rèn luyện</span>
                </a>
            </li>
            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'doanphi' ? 'active' : ''; ?>">
                <a href="<?php echo url('doanphi'); ?>">
                    <i class="fa fa-money"></i> <span>Đoàn phí</span>
                </a>
            </li>
            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'thongke' ? 'active' : ''; ?>">
                <a href="<?php echo url('thongke'); ?>">
                    <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
                </a>
            </li>
            {{-- <?php if ($this->session->userdata('QUYEN') >= 2): ?>
            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'taikhoan' ? 'active' : ''; ?>">
                <a href="<?php echo url('taikhoan'); ?>">
                    <i class="fa fa-database"></i> <span>Tài khoản</span>
                </a>
            </li>
            <?php endif ?> --}}
            {{-- <li class="header text-center" style="color: #fff;"><?php echo strtoupper($this->session->userdata('TENDANGNHAP')); ?></li> --}}

            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'doimatkhau' ? 'active' : ''; ?>">
                <a href="<?php echo url('taikhoan/doimatkhau'); ?>">
                    <i class="fa fa-lock"></i> <span>Đổi mật khẩu</span>
                </a>
            </li>

            <li class="treeview <?php echo isset($sb_page) && $sb_page == 'taikhoan/thoat' ? 'active' : ''; ?>">
                <a href="<?php echo url('logout'); ?>">
                    <i class="fa fa-sign-out text-danger"></i> <span class="text-danger">Thoát</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
