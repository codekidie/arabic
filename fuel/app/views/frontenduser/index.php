<form  class="form-horizontal form-label-left" method="POST" action="">
<?php foreach ($questionare as $q): ?>
   <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $q->question_name; ?></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="text" name="answer[]" required="required" class="form-control col-md-7 col-xs-12">
      <input type="hidden" name="user_id" value="<?php echo Auth::get('id'); ?>" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
<?php endforeach ?>
 
 
  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="submit" class="btn btn-primary">Cancel</button>
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>

</form>