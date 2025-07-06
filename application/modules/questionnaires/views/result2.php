<section id="question-page" class="sst-page">
  <div class="container">
    <h1>SST: measurement of sleep satisfaction</h1>
    <form action="questionnaires/sst/save" method="post">
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
        <strong>YOU: <?php echo $user_answers[$q_key]; ?></strong>
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
          <strong>YOU: <?php echo implode(',', $array); ?></strong>
        </div>
      </div>
      <?php elseif ($question->type == 'condition'): ?>
      <div class="question">
        <h3>
          <?php echo $question_index . '.' . $question->title; ?>
        </h3>
        <?php $question_index++; ?>
        <div class="answer answer-yn">
          <strong>YOU: <?php echo $user_answers[$q_key]['answer']; ?></strong>
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
    </form>
  </div>
  <div class="text-center pt-4 pb-2">
        <a class="button blue-gradient-30 btn-submit" href="users/history">BACK</a>
      </div>
</section>
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