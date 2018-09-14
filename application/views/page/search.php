<div class="container">
  <div class="cta" style="background-color: transparent;">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ">
        <!-- Search form -->
            <form role="form" method="get" action="<?php echo base_url("page/index"); ?>">
              <div class="form-group col-md-8 col-sm-7 col-xs-6">
                <input type="text" class="form-control" name="keyword" placeholder="Type Location..." value="<?php if($keyword){ echo $keyword;} ?>">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
              <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("page/save"); ?>'">Saved Search History</button>
            </form>
      </div>

    </div>
  </div>
</div>
