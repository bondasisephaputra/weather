<div class="container">
  <div class="cta" style="background-color: transparent;">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ">
        <!-- Search form -->
            <form role="form" method="get" action="<?php echo base_url("page/index"); ?>">
              <div class="form-group col-md-10 col-sm-10 col-xs-10">
                <input type="text" class="form-control" name="keyword" placeholder="Type Location..." value="<?php if($keyword){ echo $keyword;} ?>">
              </div>
              <button type="submit" class="btn btn-default">Search</button>
            </form>
      </div>

    </div>
  </div>
</div>
