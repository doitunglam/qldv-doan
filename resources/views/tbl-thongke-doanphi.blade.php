<div class="col-xs-12">
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab"><strong>TẤT CẢ</strong></a></li>
			<li><a href="#tab_2" data-toggle="tab"><strong class="text-success">ĐÃ ĐÓNG ĐOÀN PHÍ</strong></a></li>
			<li><a href="#tab_3" data-toggle="tab"><strong class="text-danger">CHƯA ĐÓNG ĐOÀN PHÍ</strong></a></li>
			<li class="pull-right"><button id="btnPrint" onclick="App.Site.printThongKe('#tblThongKe .tab-pane.active'); return false;" type="button" class="btn btn-success btn-flat"><strong><i class="fa fa-print"></i> IN</strong></button></li>
		</ul>
		<div class="tab-content bg-info">
			<div class="tab-pane active" id="tab_1">
				<div class="row">
					<div class="col-xs-12">
						<h3>DANH SÁCH ĐOÀN PHÍ LỚP <?php echo $tencd; ?> (HỌC KỲ <?php echo $hocky; ?>)</h3>
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr class="bg-green">
									<th class="text-center">STT</th>
									<th class="text-center">Mã đoàn viên</th>
									<th class="text-center">Họ tên đoàn viên</th>
									<th class="text-center">Đoàn phí</th>
								</tr>
							<?php foreach ($listdp as $i => $dv): ?>
								<tr>
									<td class="text-center"><?php echo $i+1; ?></td>
									<td class="text-center"><?php echo $dv->MaDV; ?></td>
									<td class="text-center"><?php echo $dv->HoDV; ?> <?php echo $dv->TenDV; ?></td>
									<td class="form-group text-center">
										<?php echo (($dv->DoanPhi == 1) ? '<span class="text-success">Đã đóng</span>' : '<span class="text-danger">Chưa đóng</span>'); ?>
									</td>
								</tr>
							<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab_2">
				<div class="row">
					<div class="col-xs-12">
						<h3>DANH SÁCH ĐOÀN VIÊN ĐÃ ĐÓNG ĐOÀN PHÍ LỚP <?php echo $tenCD; ?> (HỌC KỲ <?php echo $hocky; ?>)</h3>
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr class="bg-green">
									<th class="text-center">STT</th>
									<th class="text-center">Mã đoàn viên</th>
									<th class="text-center">Họ tên đoàn viên</th>
									<th class="text-center">Đoàn phí</th>
								</tr>
							<?php $i = 1;
							foreach ($listDP as $dv): ?>
							<?php if ($dv['DOANPHI'] == 1): ?>
								<tr>
									<td class="text-center"><?php echo $i; $i++; ?></td>
									<td class="text-center"><?php echo $dv['MADV']; ?></td>
									<td class="text-center"><?php echo $dv['HODV']; ?> <?php echo $dv['TENDV']; ?></td>
									<td class="form-group text-center">
										<?php echo (($dv['DOANPHI'] == 1) ? '<span class="text-success">Đã đóng</span>' : '<span class="text-danger">Chưa đóng</span>'); ?>
									</td>
								</tr>
							<?php endif ?>
							<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="tab_3">
				<div class="row">
					<div class="col-xs-12">
						<h3>DANH SÁCH ĐOÀN VIÊN CHƯA ĐÓNG ĐOÀN PHÍ LỚP <?php echo $tenCD; ?> (HỌC KỲ <?php echo $hocky; ?>)</h3>
					</div>
				</div>
				<div class="row" style="margin-top: 15px;">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr class="bg-green">
									<th class="text-center">STT</th>
									<th class="text-center">Mã đoàn viên</th>
									<th class="text-center">Họ tên đoàn viên</th>
									<th class="text-center">Đoàn phí</th>
								</tr>
							<?php $i = 1;
							foreach ($listDP as $dv): ?>
								<?php if ($dv['DOANPHI'] == 0): ?>
								<tr>
									<td class="text-center"><?php echo $i; $i++; ?></td>
									<td class="text-center"><?php echo $dv['MADV']; ?></td>
									<td class="text-center"><?php echo $dv['HODV']; ?> <?php echo $dv['TENDV']; ?></td>
									<td class="form-group text-center">
										<?php echo (($dv['DOANPHI'] == 1) ? '<span class="text-success">Đã đóng</span>' : '<span class="text-danger">Chưa đóng</span>'); ?>
									</td>
								</tr>
							<?php endif ?>
							<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
