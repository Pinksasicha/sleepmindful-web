<section class="content-header">
  <h1><i class="fa fa-plus"></i> Add Recommend</h1>
</section>
<?php foreach ($score_users as $score_user):?>
<form action="users/admin/users/recommend_save1/<?php echo $score_user->user_id;?>/<?php echo $score_user->question_list_id;?>/<?php echo $score_user->id; ?>" method="POST">
  <section class="content">
    <div class="row">
  
      <div class="col-xs-12">
       
          
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Recommend</h3>
          </div>
          <div class="box-body pad">
            <div class="form-group">
              <!-- <textarea name="recommend" class="form-control" rows="5"><?php echo $recommend; ?></textarea> -->
              <textarea name="recommend" class="form-control" rows="5"><?php echo $score_user->recommend; ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </section>
  <div class="footer-action">
    <button class="btn btn-primary pull-right" type="submit">Save</button>
    <a class="btn btn-default" href="javascript:history.back();">back</a>
  </div>
</form>
<style type="text/css">
  .box-body h2 {
    font-size: 18px;
    margin-top: 0;
    background: linear-gradient(to top, rgb(68, 165, 211) 0%, rgb(99, 205, 229) 100%);
    padding: 15px;
    color: #FFF;
    margin: 0 -10px 20px;
  }

  .question h3 {
    margin-top: 0;
    font-size: 16px;
  }

  .question {
    background: #F9F9F9;
  }
</style>