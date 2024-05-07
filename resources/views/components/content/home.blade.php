<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Trang chủ <small> - Tổng quan hệ thống</small></h3>
        </div>
        <!-- Main content -->
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="callout callout-success">
                        <p>Xin chào <strong><?php echo Auth::user()->name; ?></strong>, chúc bạn một ngày làm việc vui vẻ!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            {{-- <span class="info-box-text">TỔNG SỐ</span> --}}
                            {{-- <span class="info-box-number"><?php echo $numDVTotal; ?> <small>đoàn viên</small></span> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <?php foreach ($numByDCS as $item): ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green"><i class="fa fa-university"></i></span>

						<div class="info-box-content">
							<span class="info-box-text"><?php echo $item['TENDCS']; ?></span>
							<span class="info-box-number"><?php echo $item['NUMCD']; ?> <small><em>(chi đoàn)</em></small></span>
							<span class="info-box-number"><?php echo $item['NUMDV']; ?> <small><em>(đoàn viên)</em></small></span>
						</div>
					</div>
				</div>
			<?php endforeach ?> --}}
            </div>
        </div>
    </div>
</section>
