<style type="text/css">
  hr {
    margin-bottom: 30px;
  }
</style>

<h1 style="text-align:center;"><br />Questionnaire<br />
  <?php echo $user->first_name . ' ' . $user->last_name; ?><br />
  <?php echo $created_at; ?>
</h1>
<h3>Sleep Quality Questionaire total score of : Suggestion as below</h3>
<p><strong>Score : <?php echo $score_user->total_score; ?></strong></p>
<p><?php echo $score_user->result; ?>
</p>
<hr />
<div>
</div>
<h3>SST: measurement of sleep satisfaction</h3>
<?php $question_index = 1; ?>
<?php foreach ($questions as $q_key => $question): ?>
<?php if ($question->type == 'section'): ?>
<h4><?php echo $question->title; ?>
</h4>
<?php elseif ($question->type == 'textbox'): ?>

<h4><?php echo $question_index . '.' . $question->title; ?>
</h4>
<?php $question_index++; ?>
<strong>ANS: <?php echo $user_answers[$q_key]; ?></strong>

<?php elseif ($question->type == 'checkbox'): ?>

<h4><?php echo $question_index . '.' . $question->title; ?>
</h4>
<?php $question_index++; ?>

<?php $array = []; ?>
<?php foreach ($user_answers[$q_key] as $key): ?>
<?php $array[] = $question->choice[$key]->text; ?>
<?php endforeach; ?>
<div class="answer"><strong>ANS: <?php echo implode(',', $array); ?></strong>
</div>

<?php elseif ($question->type == 'condition'): ?>
<div class="question">
  <h4><?php echo $question_index . '.' . $question->title; ?>
  </h4>
  <?php $question_index++; ?>
  <div class="answer answer-yn"><strong>ANS: <?php echo $user_answers[$q_key]['answer']; ?></strong>
  </div>
  <?php if ($user_answers[$q_key]['answer'] == 'yes'): ?>

  <?php $array = []; ?>
  <?php foreach ($user_answers[$q_key]['yes'] as $key): ?>
  <?php $array[] = $question->choice->yes[$key]->text; ?>
  <?php endforeach; ?>
  <div class="answer answer-y"><?php echo implode(', ', $array); ?>
  </div>
  <?php endif; ?>
  <?php if ($user_answers[$q_key]['answer'] == 'no'): ?>
  <div class="answer answer-n">
    <?php $array = []; ?>
    <?php foreach ($user_answers[$q_key]['no'] as $key): ?>
    <?php $array[] = $question->choice->no[$key]->text; ?>
    <?php endforeach; ?>
    <?php echo implode(', ', $array); ?>
  </div>
  <?php endif; ?>
</div>
<?php endif; ?>
<?php endforeach; ?>
<hr />
<h3>Recommend</h3>
<div class="form-group"><?php echo nl2br($recommend); ?>
</div>