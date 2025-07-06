<section id="history-page">
  <div class="container">
    <h1>History</h1>
    
    <div class="container">
    <canvas id="myChart"></canvas>
    </div>

    <?php $round = 0; ?>
    <?php $array_score = []; ?>
	<div class="question-list pt-5">
      <?php foreach($questions as $q_key => $qs): ?>
        <?php $round++; ?>
    
      <h4>
      <?php echo '[Round : '.$round.'] '.$question_list->title; ?>
      </h4>
      <div id="question-page" class="sst-page">
        <div>
          <?php $question_index = 1; ?>
          <?php foreach($qs as $question): ?>
          <?php $arrays = [];?>
					<?php $ignore = false; ?>
          <?php $total = 0; ?>
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
							<?php foreach ($user_answers[$q_key][$question_index - 1] as $key => $value): ?>
							<?php array_push($array, $question->choice[$key]->text); ?>
							<?php $total += empty($question->choice[$key]->score)? 0 : $question->choice[$key]->score; ?>
							
							<?php array_push($arrays, $question->choice[$key]->score); ?>
							<?php endforeach; ?>
							<strong>ANS:</strong> <?php echo implode(',', $array); ?>
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
									<?php foreach ($user_answers[$q_key][$question_index - 1]['yes'] as $key => $value): ?>
									<?php array_push($array, $question->choice->yes[$key]->text); ?>
									<?php $total += empty($question->choice->yes[$key]->score)? 0: $question->choice->no[$key]->score; ?>
									<?php array_push($arrays, $question->choice->yes[$key]->score); ?>
									<?php endforeach; ?>
									<?php echo implode(', ', $array); ?>

								  </div>
							  <?php endif; ?>
						  <?php endif; ?>
						  <?php if ($user_answers[$q_key][$question_index - 1]['answer'] == 'no'): ?>
							  <?php if (isset($user_answers[$q_key][$question_index - 1]['no'])): ?>
								  <div class="answer answer-n">
									<?php $array = []; ?>
									<?php foreach ($user_answers[$q_key][$question_index - 1]['no'] as $key => $value): ?>
									<?php array_push($array, $question->choice->no[$key]->text); ?>
									<?php $total += empty($question->choice->no[$key]->score)? 0: $question->choice->no[$key]->score; ?>
									<?php array_push($arrays, $question->choice->no[$key]->score); ?>
									<?php endforeach; ?>
									<?php echo implode(', ', $array); ?>

								  </div>
							  <?php endif; ?>
						  <?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if(!$ignore): ?>
						<?php $question_index++; ?> 
					<?php endif; ?>
          <?php array_push($array_score, array('id' => $q_key, 'score' => $total)); ?>
				<?php endforeach; ?>
        </div>

      </div>
      <?php if ($recommend[$q_key]): ?>
      <div class="recommend">
        <h5>Recommend :</h5>
        <p>
          <?php echo $recommend[$q_key]; ?>
        </p>
      </div>
      <?php endif; ?><hr><br>
      <?php endforeach;?>

      <div class="text-center pt-4 pb-2">
        <a class="button blue-gradient-30 btn-submit" href="users/history">BACK</a>
      </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
  $(function() {
    $('.answer-yn input[type="radio"]').click(function() {
      var parent = $(this).closest('.question');
      var value = $(this).closest('.answer-yn').find('input[type="radio"]:checked').val();
      if (value == 'yes') {
        parent.find('.answer-n').hide();
        parent.find('.answer-y').show();
      } else if (value == 'no') {
        parent.find('.answer-n').show();
        parent.find('.answer-y').hide();
      } else {
        parent.find('.answer-n').hide();
        parent.find('.answer-y').hide();
      }
    })
  })
</script>

<script>
var date = [<?php foreach($qq as $qs): ?>
          '<?php echo date("d M Y",strtotime($qs->updated)); ?>',
           <?php endforeach;?>];
var score = <?php echo json_encode($array_score); ?>;
score = score
  .reduce((prev, current) => {
    let formIdx = prev.findIndex(item => item.id === current.id)
    let form = prev[formIdx];

    if (!form || form.id != current.id) {
      form = { id: current.id, total: current.score }
      prev.push(form);
    } else {
        form.total += current.score 
        prev[formIdx] = form;
    }

    return prev
  }, [])
  .map(item => item.total)

var question_title = '<?php echo $question_list->title; ?>';
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
            labels: date,
            datasets: [{
            label: question_title,
            backgroundColor: 'transparent',
            // lineTension: 0,
					  pointRadius: 7,
				  	pointHoverRadius: 10,
            pointBackgroundColor: 'rgb(8, 136, 254)',
            borderColor: 'rgb(8, 136, 254)',
            data: score
        }]
    },

    // Configuration options go here
    options: {
    //   elements: {
    //     line: {
    //         tension: 0
    //     }
    // },
      title: {
            display: true,
            text: 'Chart',
            fontSize: 20,
            fontColor: '#3ec5df'
        }
    }
});

</script>