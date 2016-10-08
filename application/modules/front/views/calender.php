<div class="calendar">
    <div class="day colored">
        <span style="" data-n="1">Pazartesi</span>
        <span style="display:none" data-n="2">Salı</span>
        <span style="display:none" data-n="3">Çarşamba</span>
        <span style="display:none" data-n="4">Perşembe</span>
        <span style="" data-n="5">Cuma</span>
        <span style="display:none" data-n="6">Cumartesi</span>
        <span style="display:none" data-n="0">Pazar</span>
    </div>
    <div class="date">
        <div class="date-day">2</div>
        <div class="month">
            <span style="display:none" data-n="0">Ocak</span>
            <span style="display:none" data-n="1">Şubat</span>
            <span style="display:none" data-n="2">Mart</span>
            <span style="display:none" data-n="3">Nisan</span>
            <span style="display:none" data-n="4">Mayıs</span>
            <span style="display:none" data-n="5">Haziran</span>
            <span style="display:none" data-n="6">Temmuz</span>
            <span style="" data-n="7">Ağustos</span>
            <span style="" data-n="8">Eylül</span>
            <span style="display:none" data-n="9">Ekim</span>
            <span style="display:none" data-n="10">Kasım</span>
            <span style="display:none" data-n="11">Aralık</span>
        </div>
        <div class="year">2016</div>
    </div>
<div class="content-2">
        <div id="calendar-datepicker" class="hasDatepicker">
        </div>
    </div>
</div>


<div style="display:none;" class="box box-solid bg-green-gradient">
    <div class="box-header">
        <h3 class="box-title">
            Etkinlik
        </h3>
        <!-- tools box -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar" style="width: 100%">
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer text-black">
        <div class="row">
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- /.box -->
<script>
    //The Calender
    $("#calendar-datepicker").datepicker({
        language: 'tr',
        weekStart: 1
    });
</script>
