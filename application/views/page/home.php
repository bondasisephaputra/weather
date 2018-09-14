
<?php if($keyword){ ?>
<div class="container">
  <div class="cta" style="background-color: transparent;">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ">
          <div style="color: #ffffff;font-size: 20px;padding: 15px;">Search Result : <?= $keyword ?></div>

        <?php
        if(count($listJson) > 0){
        ?>  

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead style="color: #ffffff;font-size: 14px;background-color:#80939B;">
                <tr>
                <th style="padding: 15px;">No</th>
                <th style="padding: 15px;">Location Name</th>
                <th style="padding: 15px;">Location Type</th>
                <th style="padding: 15px;">Coordinate</th>
                <th style="width:100px;padding: 15px;">Detail</th>
                </tr>
              </thead>
              <tbody style="color: #111111;font-size: 14px;background-color:#E3E3E3;">
              <?php
              for ($i=0; $i < count($listJson); $i++){                           
              ?>                
                <tr>
                <td style="padding: 15px;"><?= ($i+1) ?></td>
                <td style="padding: 15px;"><?= $listJson[$i]["title"] ?></td>
                <td style="padding: 15px;"><?= $listJson[$i]["location_type"] ?></td>
                <td style="padding: 15px;"><?= $listJson[$i]["latt_long"] ?></td>
                <td><center><div class="button" style="padding: 0px;margin: 10px;"><a href="<?php echo base_url("page/detail/".$listJson[$i]["woeid"]); ?>">view</a></div></center></td>
                </tr>
              <?php
              }
              ?>                
              </tbody>
            </table>
          </div>
        <?php
        }else{
        ?>
          <div class="alert alert-danger" style="text-align:center;">no data</div>
        <?php
        }
        ?>          
      </div>

    </div>
  </div>
</div>
<?php } ?> 