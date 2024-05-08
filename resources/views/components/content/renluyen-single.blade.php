<section class="content">
    <div class="box box-success">
        <div class="row">
            @foreach ($listrl as $renluyen)
            <div class="col-xs-6">
                <div style="padding: 10px; font-size: 20px">
                    {{ $renluyen->HocKy}}
                    <div>
                        Điểm: {{ $renluyen->Diem}}
                    </div>
                    <div>
                        Xếp loại: {{ $renluyen->XepLoai}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
