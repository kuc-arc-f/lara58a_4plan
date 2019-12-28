@extends('layouts.app')
@section('title', '一覧')

@section('content')
<h1 style="margin: 8px 8px;">Plans: {{ $month }}</h1>
{{ link_to_route('plans.create', 'Create' ,null, ['class' => 'btn btn-primary']) }}
<hr />
<div class="flex-center position-ref full-height">
    <div class="content">
        <div style="text-align: center; font-size : 1.4rem;">
            <a href="?ym={{ $prev }}">&lt;</a>&nbsp;
            <span class="month">{{ $month }}</span>&nbsp;
            <a href="?ym={{ $next }}">&gt;</a>
        </div>
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
            @foreach ($weeks as $days)
                <tr>
                    @foreach ($days as $day)
                    <?php
                    $today_class = "none";
                    if($day["today"]){ $today_class = "today"; }
                    $day_content = mb_substr($day["content"], 0, 6 );
                    //debug_dump($day );
                    ?>
                    <td class="{{ $today_class }} td_cls">
                        <?php if(!empty($day["content"]) ){ ?>
                            <a href="/plans/{{$day["id"]}}">
                            <div>
                                {{ $day["day"] }}<br />
                                <p class="content_text">{{ $day_content }}</p>
                            </div>
                            </a>  
                            <a class="td_edit" href="/plans/{{$day["id"]}}/edit">[ 編集 ]
                            </a>                          
                        <?php }else{ ?>
                            {{ $day["day"] }}<br />
                            <p class="content_text">{{ $day_content }}</p>
                        <?php } ?>
                    </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div><!-- content_end -->
</div>
<!-- -->
<style>
.today{
    background : #EEE;    
}
.table .td_cls{
    width : 80px;
    min-height : 60px;
}
.table .content_text{
    /*     font-size : 0.8rem; */
    color : gray;
    font-size : 11pt;
}
.table .td_edit{
    font-size : 11pt;
}
</style>
@endsection
	