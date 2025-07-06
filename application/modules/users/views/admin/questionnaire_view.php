<section class="content-header">
  <h1><i class="fa fa-question"></i> Questionnairessss</h1>
</section>


  <section class="content">
    <div class="row">
	<?php $round = 0; ?>
	<?php foreach($questions as $q_key => $qs): ?>
		<?php $round++; ?>
		<div class="col-xs-12">
			<div class="box box-primary">
			  <div class="box-header with-border">
				<h3 class="box-title text-bold" ><?php echo '[Round : '.$round.'] '.$question_list->title; ?>
				</h3>
			  </div>
			  <div class="box-body">
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
						<div class="question">
						  <h3>
							<span class="text-bold">Question:</span><?php echo $question_index . 'ddd.' . $question->title; ?>
						  </h3>
						  <strong>ANS:</strong> <?php echo $user_answers[$q_key][$question_index - 1]; ?>
						</div>
					<?php elseif ($question->type == 'checkbox'): ?>
						<div class="question">
						  <h3>
							<span class="text-bold">Question: </span><?php echo $question_index . '.' . $question->title; ?>
						  </h3>
						  <div class="answer">
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
						</div>
					<?php elseif ($question->type == 'condition'): ?>
						<div class="question">
						  <h3>
							<span class="text-bold">Question: </span><?php echo $question_index . '.' . $question->title; ?>
						  </h3>
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
			  </div>
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
					  <form action="users/admin/users/addrec/<?php echo $user->id; ?>/<?php echo $question_list->id; ?>/<?php echo $q_key; ?>" method="POST">
						<div class="box box-primary">
						  <a class="btn btn-default btn-large sr-only" href="<?php echo base_url(); ?>users/admin/users/addRecommend_q/<?php echo $user->id; ?>/<?php echo $question_list->id ;?>/<?php echo $q_key; ?>"><i class="fa fa-plus"></i> Add Recommend</a>
						  <div class="box-header with-border">
							<h3 class="box-title">Recommend</h3>
						  </div>
						  <div class="box-body pad">
							<div class="form-group">
							  <!-- <textarea name="recommend" readonly class="form-control" rows="5"><?php echo $recommend; ?></textarea> -->
							  <textarea name="recommend" class="form-control" rows="5"><?php echo $recommend[$q_key]; ?></textarea>
							</div>
						  </div>
						  <div>
							<button type="submit" class="btn btn-info btn-large">submit</button>
							<!-- <a class="btn btn-default btn-large" href="xxxx">cancel</a> -->
						  </div>
						</div>
					   </form>
					</div>
				  </div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	
  </section>
  <!-- <div class="footer-action">
    <button class="btn btn-primary pull-right" type="submit">Save</button>
    <a class="btn btn-default" href="javascript:history.back();">back</a>
  </div> -->

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