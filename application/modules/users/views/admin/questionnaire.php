<section class="content-header">
  <h1><i class="fa fa-question"></i> Questionnaire</h1>
</section>

<form action="users/admin/users/recommend_save/<?php echo $user->id; ?>" method="POST">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Sleep Quality Questionaire total score of : Suggestion as below</h3>
          </div>
          <div class="box-body">

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
            <h3 class="box-title">SST: measurement of sleep satisfaction</h3>
          </div>
          <div class="box-body">
            <?php $question_index = 1; ?>
            <?php foreach ($questions as $q_key => $question): ?>
            <?php if ($question->type == 'section'): ?>
            <h2>
              <?php echo $question->title; ?>
            </h2>
            <?php elseif ($question->type == 'textbox'): ?>
            <div class="question">
              <h3>
                <?php echo $question_index . '.' . $question->title; ?>
              </h3>
              <?php $question_index++; ?>
              <strong>ANS: <?php echo $user_answers[$q_key]; ?></strong>
            </div>
            <?php elseif ($question->type == 'checkbox'): ?>
            <div class="question">
              <h3>
                <?php echo $question_index . '.' . $question->title; ?>
              </h3>
              <?php $question_index++; ?>
              <div class="answer">
                <?php $array = []; ?>
                <?php foreach ($user_answers[$q_key] as $key): ?>
                <?php $array[] = $question->choice[$key]->text; ?>
                <?php endforeach; ?>
                <strong>ANS: <?php echo implode(',', $array); ?></strong>
              </div>
            </div>
            <?php elseif ($question->type == 'condition'): ?>
            <div class="question">
              <h3>
                <?php echo $question_index . '.' . $question->title; ?>
              </h3>
              <?php $question_index++; ?>
              <div class="answer answer-yn">
                <strong>ANS: <?php echo $user_answers[$q_key]['answer']; ?></strong>
              </div>
              <?php if ($user_answers[$q_key]['answer'] == 'yes'): ?>
              <?php if (isset($user_answers[$q_key]['yes'])): ?>
              <div class="answer answer-y">
                <?php $array = []; ?>
                <?php foreach ($user_answers[$q_key]['yes'] as $key): ?>
                <?php $array[] = $question->choice->yes[$key]->text; ?>
                <?php endforeach; ?>
                <?php echo implode(', ', $array); ?>
              </div>
              <?php endif; ?>
              <?php endif; ?>
              <?php if ($user_answers[$q_key]['answer'] == 'no'): ?>
              <?php if (isset($user_answers[$q_key]['no'])): ?>
              <div class="answer answer-n">
                <?php $array = []; ?>
                <?php foreach ($user_answers[$q_key]['no'] as $key): ?>
                <?php $array[] = $question->choice->no[$key]->text; ?>
                <?php endforeach; ?>
                <?php echo implode(', ', $array); ?>
              </div>
              <?php endif; ?>
              <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Recommend</h3>
          </div>
          <div class="box-body pad">
            <div class="form-group">
              <textarea name="recommend" class="form-control" rows="5"><?php echo $recommend; ?></textarea>
            </div>
          </div>
        </div>
      </div>
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