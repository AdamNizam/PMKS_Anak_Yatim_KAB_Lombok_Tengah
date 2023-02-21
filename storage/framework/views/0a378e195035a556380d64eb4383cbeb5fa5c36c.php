

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
<style>
  #chartdiv {
    width: 100%;
  }

  .data_kecamatan {
    width: 100%;
    height: 400px;

  }
</style>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldContent('breadcrumb-list'); ?>
<!-- Container-fluid starts-->
<div class="container-fluid dashboard-default-sec">
  <div class="row">
    <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
      <div class="card income-card card-primary">
        <div class="card-body text-center">
          <div class="round-box">
            <i data-feather="user"></i>
          </div>
          <h5 id="anak_yatim"></h5>
          <p>Anak Yatim</p><a class="btn-arrow arrow-primary" href="javascript:void(0)" id="jumlah_yatim"></a>

        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
      <div class="card income-card card-primary">
        <div class="card-body text-center">
          <div class="round-box">
            <i data-feather="user-minus"></i>
          </div>
          <h5 id="anak_piatu"></h5>
          <p>Anak Piatu</p><a class="btn-arrow arrow-primary" href="javascript:void(0)" id="jumlah_piatu"></a>
          <div class="parrten">

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
      <div class="card income-card card-primary">
        <div class="card-body text-center">
          <div class="round-box">
            <i data-feather="user-plus"></i>
          </div>
          <h5 id="yatim_piatu"></h5>
          <p>Anak Yatim Piatu</p><a class="btn-arrow arrow-primary" href="javascript:void(0)" id="jumlah_yatim_piatu"> </a>
          <div class="parrten">

          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 col-sm-6 box-col-3 des-xl-25 rate-sec">
      <div class="card income-card card-primary">
        <div class="card-body text-center">
          <div class="round-box">
            <i data-feather="users"></i>
          </div>
          <h5 id="semua"></h5>
          <p>Semua</p><a class="btn-arrow arrow-primary" href="javascript:void(0)"><i class="toprightarrow-primary fa fa-arrow-up me-2"></i>100% </a>
          <div class="parrten">

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="header-top d-sm-flex justify-content-between align-items-center">
            <h5>Total Anak Yatim Piatu</h5>
          </div>
        </div>
        <div class="card-body">
          <div id="status_anak"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <div class="header-top d-sm-flex justify-content-between align-items-center">
            <h5>Jenis Kelamin</h5>
          </div>
        </div>
        <div class="card-body">
          <div class="jenis_kelamin">

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Container-fluid Ends-->
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/chart/amchart/core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/amchart/charts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/amchart/animated.js')); ?>"></script>


<script>
  $(document).ready(function() {
    $.ajax({
      url: '/all',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // status anak
        const id_pendata = `<?php echo e(Session::get('id_survior')); ?>`
        // console.log(id_pendata)
        const pendata = data['anak'].filter((id_survior) => id_survior.id_survior == id_pendata);
        // console.log(pendata)
        const anak_yatim = pendata.filter((status_anak) => status_anak.status_anak == 1);
        const anak_piatu = pendata.filter((status_anak) => status_anak.status_anak == 2);
        const yatim_piatu = pendata.filter((status_anak) => status_anak.status_anak == 3);

        const jumlah_yatim = anak_yatim.length / pendata.length * 100;
        const jumlah_piatu = anak_piatu.length / pendata.length * 100;
        const jumlah_yatim_piatu = yatim_piatu.length / pendata.length * 100;
        // jenis kelamin
        const laki_laki = pendata.filter((jenis_kelamin) => jenis_kelamin.jenis_kelamin == 1);
        const perempuan = pendata.filter((jenis_kelamin) => jenis_kelamin.jenis_kelamin == 0);
        const jumlah_lk = laki_laki.length / pendata.length * 100;
        const jumlah_pr = perempuan.length / pendata.length * 100;


        // const kecamtan = data.filter((kecamtan) => kecamtan.id_kecamatan == id_kecamatan);
        $("#anak_yatim").append(anak_yatim.length + " Orang")
        $("#anak_piatu").append(anak_piatu.length + " Orang")
        $("#yatim_piatu").append(yatim_piatu.length + " Orang")
        $("#semua").append(pendata.length + " Orang")
        $("#jumlah_yatim").append(jumlah_yatim.toFixed(2) + " %")
        $("#jumlah_piatu").append(jumlah_piatu.toFixed(2) + " %")
        $("#jumlah_yatim_piatu").append(jumlah_yatim_piatu.toFixed(2) + " %")
        // console.log(jumlah_yatim);
        // console.log(jumlah_piatu);
        // console.log(jumlah_yatim_piatu);

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // grafik status Anak
        // Create chart instance
        var chart = am4core.create("status_anak", am4charts.PieChart);

        // Add data
        chart.data = [{
          "country": "Yatim",
          "litres": jumlah_yatim
        }, {
          "country": "Piatu",
          "litres": jumlah_piatu
        }, {
          "country": "Yatim Piatu",
          "litres": jumlah_yatim_piatu
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";
        pieSeries.innerRadius = am4core.percent(50);
        pieSeries.ticks.template.disabled = true;
        pieSeries.labels.template.disabled = true;

        var rgm = new am4core.LinearGradientModifier();
        rgm.brightnesses.push(0, -0.4);
        pieSeries.slices.template.fillModifier = rgm;

        var rgm2 = new am4core.LinearGradientModifier();
        rgm2.brightnesses.push(0, -0.4);

        pieSeries.slices.template.strokeModifier = rgm2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template.strokeWidth = 1;


        chart.legend = new am4charts.Legend();
        chart.legend.position = "right";

        pieSeries.slices.template.events.on("validated", function(event) {
          var gradient = event.target.fillModifier.gradient
          gradient.rotation = event.target.middleAngle + 90;

          var gradient2 = event.target.strokeModifier.gradient
          gradient2.rotation = event.target.middleAngle + 90;
        })


        // grafik jenis_kelamin

        var chart = am4core.create("jenis_kelamin", am4charts.PieChart);

        // Add data
        chart.data = [{
          "jenis_kelamin": "Yatim",
          "jumlah": jumlah_lk
        }, {
          "jenis_kelamin": "Piatu",
          "jumlah": jumlah_pr
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "jumlah";
        pieSeries.dataFields.category = "jenis_kelamin";
        pieSeries.innerRadius = am4core.percent(50);
        pieSeries.ticks.template.disabled = true;
        pieSeries.labels.template.disabled = true;

        var rgm = new am4core.LinearGradientModifier();
        rgm.brightnesses.push(0, -0.4);
        pieSeries.slices.template.fillModifier = rgm;

        var rgm2 = new am4core.LinearGradientModifier();
        rgm2.brightnesses.push(0, -0.4);

        pieSeries.slices.template.strokeModifier = rgm2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template.strokeWidth = 1;


        chart.legend = new am4charts.Legend();
        chart.legend.position = "right";

        pieSeries.slices.template.events.on("validated", function(event) {
          var gradient = event.target.fillModifier.gradient
          gradient.rotation = event.target.middleAngle + 90;

          var gradient2 = event.target.strokeModifier.gradient
          gradient2.rotation = event.target.middleAngle + 90;
        })
      }
    });

  })
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.survior.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\APPLaravel\pmks-anak-yatim\resources\views/survior/index.blade.php ENDPATH**/ ?>