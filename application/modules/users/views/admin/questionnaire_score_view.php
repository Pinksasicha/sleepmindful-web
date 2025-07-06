<section class="content-header">
  <h1><i class="fa fa-question"></i> Questionnaire</h1>
</section>

<form action="users/admin/users/recommend_save1/<?php echo $user->id; ?>/<?php echo $question_list->id; ?>/<?php echo $score_user->id; ?>" method="POST">
  <section class="content">
    <div class="row">
    <?php $round = 0; ?>
    <?php foreach ($score_user as $score_user):?>
      <?php $round++; ?>
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <!-- <h3 class="box-title">Sleep Quality Questionaire total score of : Suggestion as below</h3> -->
            <h3 class="box-title"><?php echo '[Round : '.$round.'] '.$question_list->title; ?></h3>
          </div>
          
          <div class="box-body">
          <!-- <h1><?php echo $score_user->id; ?></h1> -->
          
            <p><strong>
                Score : <?php echo $score_user->total_score; ?></strong>
            </p>
            <p>
              <?php echo $score_user->result; ?>
            </p>
          </div>
          
        </div>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Recommend</h3>
          </div>
          <div class="box-body pad">
          <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>users/admin/users/addRecommend/<?php echo $user->id; ?>/<?php echo $question_list->id; ?>/<?php echo $score_user->id; ?>"><i class="fa fa-plus"></i> Add Recommend</a>
          </div>
          <div class="box-body pad">
            <div class="form-group">
              <!-- <textarea name="recommend" class="form-control" rows="5"><?php echo $recommend; ?></textarea> -->
              <textarea name="recommend" readonly class="form-control" rows="5"><?php echo $score_user->recommend; ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </section>
  <!-- <div class="footer-action">
    <button class="btn btn-primary pull-right" type="submit">Save</button>
    <a class="btn btn-default" href="javascript:history.back();">back</a>
  </div> -->
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