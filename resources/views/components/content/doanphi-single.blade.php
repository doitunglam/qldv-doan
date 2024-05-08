<!-- Trang home đoàn phí -->
@php
    if (isset($doanphi)) {
        unset($doanphi['MaDV']);
        $doanphi = $doanphi->toArray();
    } else {
        $doanphi = [
            'HK1' => 0,
            'HK2' => 0,
            'HK3' => 0,
            'HK4' => 0,
            'HK5' => 0,
            'HK6' => 0,
            'HK7' => 0,
            'HK8' => 0,
        ];
    }
@endphp

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Đoàn phí</h3>
        </div>
        <div class="box-body">
            <div class="row">
                @foreach ($doanphi as $hocky => $trangthai)
                    <div class="col-xs-6" style="padding: 20px; font-size: 20px;"> {{ $hocky }} :
                        @if ($trangthai == 1)
                            Đã thanh toán
                        @else
                            Chưa thanh toán
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
