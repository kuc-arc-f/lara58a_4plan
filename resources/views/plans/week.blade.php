@extends('layouts.app')
@section('title', 'plan-week')

@section('content')
<!-- <br /> -->
<div class="row" style="margin-top: 20px;">
    <div class="col-sm-4">
        <h3>Week : {{ $startDt }}</h3>
    </div>
    <div class="col-sm-5">
        <div class="month_move_wrap" style="text-align: center; font-size : 1.2rem;">
            <a href="?ymd={{ $prev }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-circle-left"></i> Before
            </a>&nbsp;
            <!-- 
            <label>
                <input type="week" name="week" id="camp-week"
                   min="2020-W18" max="2020-W26" required>
            </label>
            <input type="button" onClick="changeMonth();" value="Go"
            class="btn btn-outline-primary btn-sm btn_change"
            style="margin-bottom: 8px;">&nbsp;
            -->
            <a href="?ymd={{ $next }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-circle-right"></i> Next
            </a>&nbsp;
        </div>        
    </div>
    <div class="col-sm-3"  style=" text-align: right;">
        {{ link_to_route('plans.create', 'Create' ,null, ['class' => 'btn btn-primary']) }}
        {{ link_to_route('plans.index', 'Month' ,null, ['class' => 'btn btn-outline-primary']) }}
    </div>
</div>
<br />
<!-- margin-top:20px; -->
<div class="flex-center position-ref full-height" style="">
    <div class="content">
        <table class="table table-bordered">
            <tr>
                <th style="color :red;">日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th style="color :blue;">土</th>
            </tr>
            <!-- week -->
            <tr>
            @foreach ($weeks as $day)
                <?php
                $today_class = "none";
                if($day["today"]){ $today_class = "today"; }
                $day_content = mb_substr($day["content"], 0, 128 );
                $day_content = nl2br($day_content);
                ?>
                <td class="{{ $today_class }} td_cls">
                    <?php if(!empty($day_content) ){ ?>
                        <a href="/plans/{{$day["id"]}}">
                            <div>
                                {{ $day["day"] }}<br />
                                <p class="content_text"><?php echo($day_content) ?>
                                </p>
                            </div>
                        </a>  

                        <a  href="/plans/{{$day["id"]}}/edit" class="btn btn-outline-primary btn-sm td_edit"
                            data-toggle="tooltip" title="edit plan">
                           <i class="far fa-edit"></i>
                       </a>                        
                    <?php }else{ ?>
                        {{ $day["day"] }}<br />
                        <br />
                        <br />
                    <?php } ?>

                </td>
            @endforeach
            </tr>
        </table>
        <br />
        <br />
        @include('element.page_info',
        [
            'git_url' => 'https://github.com/kuc-arc-f/lara58a_4plan',
            'blog_url' => 'https://knaka0209.hatenablog.com/entry/lara58_11_plan'
        ])

    </div><!-- content_end -->
</div>
<!-- -->
<style>
.today{
    background : #B3E5FC;
}
.table .td_cls{
    width : 80px;
    min-height : 60px;
}
.table .content_text{
    color : gray;
    font-size : 11pt;
    margin : 8px 0px;
}
.table .td_edit{
    font-size : 11pt;
}
.table th{
    text-align: center;
    padding: 8px;
}
#month{
    width : 180px;
}
.month_move_wrap .fa-arrow-circle-left{
    font-size : 1.2rem;
}
.month_move_wrap .fa-arrow-circle-right{
    font-size : 1.2rem;
}
</style>
<!-- -->
<script>
function changeMonth(){
    var nowMonth= $("#month").val();
    var url = "/plans?ym=" +nowMonth;
//    console.log( url );
    location.href = url;
}
</script>

@endsection
	