<!-- <style type="text/css">
  hr {
    margin-bottom: 30px;
  }
</style>

<h1 style="text-align:center;"><br />Questionnaire<br />
  <?php echo $user->first_name . ' ' . $user->last_name; ?><br />
  <?php echo $created_at; ?>
</h1>

<div>
</div>
<h3><?php echo $question_list->title; ?>
</h3>
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
  <?php if (isset($user_answers[$q_key]['yes'])): ?>
  <?php $array = []; ?>
  <?php foreach ($user_answers[$q_key]['yes'] as $key): ?>
  <?php $array[] = $question->choice->yes[$key]->text; ?>
  <?php endforeach; ?>
  <div class="answer answer-y"><?php echo implode(', ', $array); ?>
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
<hr />
<h3>Recommend</h3>
<div class="form-group"><?php echo nl2br($recommend); ?>
</div> -->

<style type="text/css">
  hr {
    margin-bottom: 30px;
  }
</style>

<h1 style="text-align:center;"><br />Questionnaire<br />
  <?php echo $user->first_name . ' ' . $user->last_name; ?><br />
  <?php echo $created_at; ?>
</h1>

<div>
</div>
<!-- <h3>
  <?php echo $question_list->title; ?>
</h3> -->

<?php $round = 0; ?>
<?php foreach($questions as $q_key => $qs): ?>
    <?php $round++; ?>
      <h3>
        <?php echo '[Round : '.$round.'] '.$question_list->title; ?>
      </h3>

<?php $question_index = 1; ?>
<?php $arrays = []; ?>
<?php foreach($qs as $question): ?>
  <?php $ignore = false; ?>
			<?php if ($question->type == 'section'): ?>
					<?php $ignore = true; ?>
						<h2>
						  <?php echo $question->title; ?> 
            </h2>
            
<?php elseif ($question->type == 'textbox'): ?>
<h4>
  <span class="text-bold">Question:</span><?php echo $question_index . 'ddd.' . $question->title; ?>
</h4>
<strong>ANS:</strong> <?php echo $user_answers[$q_key][$question_index - 1]; ?>

<?php elseif ($question->type == 'checkbox'): ?>
<h4>
  <span class="text-bold">Question: </span><?php echo $question_index . '.' . $question->title; ?>
</h4>
<?php $array = []; ?>
<?php $array_score = 0; ?>
<?php foreach ($user_answers[$q_key][$question_index - 1] as $key => $value): ?>
  <?php array_push($array, $question->choice[$key]->text); ?>
	<?php $array_score += empty($question->choice[$key]->score)? 0 : $question->choice[$key]->score; ?>
	<?php array_push($array_score, $question->choice[$key]->score); ?>
	<?php array_push($arrays, $question->choice[$key]->score); ?>
<?php endforeach; ?>
<strong>ANS:</strong> <?php echo implode(',', $array); ?>
<p><strong> Score: </strong><?php echo $array_score; ?> point</p>
</div>

<?php elseif ($question->type == 'condition'): ?>
<div class="question">
  <h4>
    <span class="text-bold">Question: </span><?php echo $question_index . '.' . $question->title; ?>
  </h4>
  <div class="answer answer-yn">
  <strong>ANS:</strong> <?php echo $user_answers[$q_key][$question_index - 1]['answer']; ?>
  </div>
  <?php if ($user_answers[$q_key][$question_index - 1]['answer'] == 'yes'): ?>
							  <?php if (isset($user_answers[$q_key][$question_index - 1]['yes'])): ?>
								  <div class="answer answer-y">
									<?php $array = []; ?>
									<?php $array_score = 0; ?>
									<?php foreach ($user_answers[$q_key][$question_index - 1]['yes'] as $key => $value): ?>
									<?php array_push($array, $question->choice->yes[$key]->text); ?>
									<?php $array_score += empty($question->choice->yes[$key]->score)? 0: $question->choice->yes[$key]->score; ?>
									<?php array_push($arrays, $question->choice->yes[$key]->score); ?>
									<?php endforeach; ?>
									<?php echo implode(', ', $array); ?>
									<p><strong> Score: </strong><?php echo $array_score; ?> point</p>
								  </div>
							  <?php endif; ?>
						  <?php endif; ?>
              <?php if ($user_answers[$q_key][$question_index - 1]['answer'] == 'no'): ?>
							  <?php if (isset($user_answers[$q_key][$question_index - 1]['no'])): ?>
								  <div class="answer answer-n">
									<?php $array = []; ?>
									<?php $array_score = 0; ?>
									<?php foreach ($user_answers[$q_key][$question_index - 1]['no'] as $key => $value): ?>
									<?php array_push($array, $question->choice->no[$key]->text); ?>
									<?php $array_score += empty($question->choice->no[$key]->score)? 0: $question->choice->no[$key]->score; ?>
									<?php array_push($arrays, $question->choice->no[$key]->score); ?>
									<?php endforeach; ?>
									<?php echo implode(', ', $array); ?>
									<p><strong> Score: </strong><?php echo $array_score; ?> point</p>
								  </div>
							  <?php endif; ?>
						  <?php endif; ?>
</div>
<?php endif; ?>
<?php if(!$ignore): ?>
						<?php $question_index++; ?> 
					<?php endif; ?>
<?php endforeach; ?>
<div class="row">
				  <div class="col-xs-12">
					  <div class="box-body">
						<div class="question">
						  <div class="answer">
							<?php $sum_point = 0; ?>
							<?php foreach($arrays as $a): ?>
								<?php $sum_point += $a; ?>
							<?php endforeach; ?>
							<strong>Total Score: <?php echo $sum_point;?> point</strong>
						   </div>
					    </div>

<h3>Recommend</h3>
<div class="form-group"><?php echo nl2br($recommend[$q_key]); ?>
</div>
<hr style = "border: 1px dotted;">
<?php endforeach; ?>