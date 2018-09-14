

<?php $date = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"); ?>
<div class="content features-two">
  <div class="container">
    <div class="row" style="margin-bottom: 50px;">
      <h1 style="color:#ffffff; "><?= $weatherJson["title"] ?></h1>
      <br/>

            <div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8">
                  <div class="row">
                     <!-- Staff name with designation. Designation should be enclosed inside <span> tag. -->
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align: right;padding-top:50px;color:#ffffff;">
                      <p style="font-size: 40px;"><?= round($weatherJson["consolidated_weather"][0]["the_temp"]) ?>°</p>
                      <br/>
                      <p style="font-size: 15px;">
                        <span style="color:#1C9ACA;font-weight:bold;"><?= round($weatherJson["consolidated_weather"][0]["min_temp"]) ?>°</span> / <span style="color:#FBA93D;font-weight:bold;"><?= round($weatherJson["consolidated_weather"][0]["max_temp"]) ?>°</span>
                      </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align: center;padding-left: 0px;margin-left: 0px;padding-right: 0px;margin-right: 0px;">
                      <img src="https://www.metaweather.com/static/img/weather/<?= $weatherJson["consolidated_weather"][0]["weather_state_abbr"] ?>.svg" alt="" />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left;padding-top:70px;color:#ffffff;">
                      <p style="font-size: 12px;">
                        <p style="color:#1C9ACA;font-weight:bold;"><?= $date[date('w', strtotime($weatherJson["consolidated_weather"][0]["applicable_date"]))] ?></p>
                        <p style="color:#ffffff;font-weight:bold;"><?= date_format(date_create($weatherJson["consolidated_weather"][0]["applicable_date"]),"d/m/Y") ?></p>                        
                      </p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;padding-top:20px;color:#1C9ACA;">
                      <p style="font-size: 50px;"><?= $weatherJson["consolidated_weather"][0]["weather_state_name"] ?></p>
                    </div>
                                         
                  </div>
                  
            </div>

    </div>

    <div class="row">
      <div class="col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
        <div style="text-align: left;margin-bottom: 10px;color: #ffffff;font-weight:bold;">          
          <p><span style="color: #1C9ACA;font-weight:bold;">Wind</span> <?= round($weatherJson["consolidated_weather"][0]["wind_speed"]) ?>mph<?= $weatherJson["consolidated_weather"][0]["wind_direction_compass"] ?> &nbsp;&nbsp;&nbsp;<span style="color: #1C9ACA;font-weight:bold;">Humidity</span> <?= round($weatherJson["consolidated_weather"][0]["humidity"]) ?>% &nbsp;&nbsp;&nbsp;<span style="color: #1C9ACA;font-weight:bold;">Visibility</span> <?= round($weatherJson["consolidated_weather"][0]["visibility"]) ?>miles</p>
        </div>
      </div>      
    </div>


    <div class="row">

          <div class="col-md-1 col-sm-1 col-xs-1">
          </div>      

    <?php
    for ($i=1; $i <= 5; $i++){
      $result = date('w', strtotime($weatherJson["consolidated_weather"][$i]["applicable_date"]));
    ?>

          <div class="col-md-2 col-sm-2 col-xs-2" style="background-color: #000000;opacity: 0.6;<?php if($i>1){ ?>margin-left: 5px;<?php } ?>">
            <div>
              <h4 class="title" style="color:#1C9ACA;font-weight:bold;font-size: 15px;"> <?= $date[$result] ?></h4>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <img src="https://www.metaweather.com/static/img/weather/<?= $weatherJson["consolidated_weather"][$i]["weather_state_abbr"] ?>.svg" alt="" style="margin-bottom: 10px;margin-top: 10px;" />
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left;margin-left: 0px;padding-left: 0px;padding-top: 10px; ">
                <p style="color:#FBA93D;font-weight:bold;padding-bottom: 0px;margin-bottom: 0px;"><?= round($weatherJson["consolidated_weather"][$i]["max_temp"]) ?>°</p>
                <p style="color:#1C9ACA;font-weight:bold;padding-top: 0px;margin-top: 0px;"><?= round($weatherJson["consolidated_weather"][$i]["min_temp"]) ?>°</p>
              </div>
            </div>
          </div>

    <?php } ?> 

          <div class="col-md-1 col-sm-1 col-xs-1">
          </div> 

    </div>
  </div>
</div>
