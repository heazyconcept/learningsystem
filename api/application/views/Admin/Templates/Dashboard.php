<?php $data["PageTitle"] = "Admin Dashboard - 90minsbet"; $data["PresentMenu"] = "dashboard"; ?>
<?php $this->load->view("Admin/Partials/Head", $data); ?>
<?php $this->load->view("Admin/Partials/Navigation"); ?>

<div class="az-content-body">
  <div class="row row-sm">
    <div class="col-lg-10 mg-t-20 mg-lg-t-0">
      <div class="card card-dashboard-four">
        <div class="card-header">
          <h6 class="card-title">Users by Country</h6>
        </div><!-- card-header -->
        <div class="card-body row">
          <div class="col-md-6 d-flex align-items-center">
            <div class="chart"><canvas id="chartDonut"></canvas></div>
          </div><!-- col -->
          <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0" id="countryDetailsStat">
            
          </div><!-- col -->
        </div><!-- card-body -->
      </div><!-- card-dashboard-four -->
    </div><!-- col -->
    <div class="col-lg-10 mg-t-50">
        <div class="card card-dashboard-four">
          <div class="card-header">
            <h6 class="card-title">Users by Subscription</h6>
          </div><!-- card-header -->
          <div class="card-body row">
            <div class="col-md-6 d-flex align-items-center">
              <div class="chart"><canvas id="chartDonut1"></canvas></div>
            </div><!-- col -->
            <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0" id="SubDetailsStat">
              
            </div><!-- col -->
          </div><!-- card-body -->
        </div><!-- card-dashboard-four -->
      </div><!-- col -->
  </div>

  <!-- your content goes here -->
</div><!-- az-content-body -->


<?php $this->load->view("Admin/Partials/Script"); ?>
<script>
  var optionpie = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false,
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    };
  $(document).ready(function () {
    

    $.get("<?php echo base_url('adminAjax/GetStatistics/') ?>")
    .done(function (data) {
      var statistics = JSON.parse(data);
      console.log(statistics);
      var countryColors = [];
      var countryPercentage = [];
      var countryLabel = [];
      var countryHtml = '';
      var subColors = [];
      var subPercentage = [];
      var subLabel = [];
      var subHtml = '';
      $.each(statistics.CountryStat, function(key, value){
         var _tempColor = getRandomColor(); 
         countryHtml += '<div class="az-traffic-detail-item">' +
                '<div>' +
                  '<span>'+ value.Country +'</span>' +
                  '<span>' + value.count + '<span>(' + value.Percentage +'%)</span></span>' +
                '</div>' +
                '<div class="progress">' +
                  '<div style="background-color: ' + _tempColor +';" class="progress-bar wd-'+ value.Percentage +'p" role="progressbar" aria-valuenow="'+ value.Percentage +'" aria-valuemin="0"  aria-valuemax="100"></div>' +
                '</div>' +
              '</div>';
          countryColors.push(_tempColor);
          countryPercentage.push(value.Percentage);
          countryLabel.push(value.Country);
      });
      $.each(statistics.SubscriptionStat, function(key, value){
         var _tempColor = getRandomColor(); 
         subHtml += '<div class="az-traffic-detail-item">' +
                '<div>' +
                  '<span>'+ value.Name +'</span>' +
                  '<span>' + value.count + '<span>(' + value.Percentage +'%)</span></span>' +
                '</div>' +
                '<div class="progress">' +
                  '<div style="background-color: ' + _tempColor +';" class="progress-bar wd-'+ value.Percentage +'p" role="progressbar" aria-valuenow="'+ value.Percentage +'" aria-valuemin="0"  aria-valuemax="100"></div>' +
                '</div>' +
              '</div>';
          subColors.push(_tempColor);
          subPercentage.push(value.Percentage);
          subLabel.push(value.Name);
      });
      var datapie = {
      labels: countryLabel,
      datasets: [{
        data: countryPercentage,
        backgroundColor: countryColors
      }]
    };
    var datapie2 = {
      labels: subLabel,
      datasets: [{
        data: subPercentage,
        backgroundColor: subColors
      }]
    };
    $("#countryDetailsStat").html(countryHtml);
    $("#SubDetailsStat").html(subHtml);
      var ctxpie = document.getElementById('chartDonut');
      var ctxpie1 = document.getElementById('chartDonut1');
      var myPieChart6 = new Chart(ctxpie, {
      type: 'doughnut',
      data: datapie,
      options: optionpie
    })
    var myPieChart7 = new Chart(ctxpie1, {
      type: 'doughnut',
      data: datapie2,
      options: optionpie
    })

    })
    .fail(function (error) {
      console.log(error);
    })
    // Donut Chart
   



    // For a doughnut chart
    
    
    
   
  })
  function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
</script>