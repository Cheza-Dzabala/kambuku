<!-- Start Widget -->
<div class="row">
    @foreach($stats as $key => $value)
    <div class="col-md-6 col-sm-6 col-lg-3">
        <div class="mini-stat clearfix bx-shadow">
            <div class="mini-stat-info ">
                <span class="counter">{{ $value['total'] }}</span>
                {{ $key }}
                <i class="fa fa-cogs"></i>
            </div>
            <div class="tiles-progress">
                <div class="m-t-20">
                    <div>
                        <span>{{ number_format($value['percentage'], 2) }} %</span>&nbsp;Active
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- End row-->