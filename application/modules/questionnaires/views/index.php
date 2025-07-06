<section id="question-page">
  <div class="container">
    <h1>
      <?php echo isset($question_list) ? $question_list->title : 'Sleep Quality Questionaire'; ?>
    </h1>
    <form id="question-form" action="questionnaires/save/<?php echo isset($question_list) ? $question_list->id : ''; ?>" method="post">
      <?php $question_index = 1; ?>
      <?php foreach ($questions as $q_key => $question): ?>
      <?php if ($question->type == 'section'): ?>
      <h2>
        <?php echo $question->title; ?>
      </h2>
      <?php elseif ($question->type == 'question'): ?>
      <div class="question">
        <h3>
          <?php echo $question_index . '.' . $question->title; ?>
        </h3>
        <?php $question_index++; ?>
        <div class="answer">
          <?php foreach ($question->choice as $c_key => $choice): ?>
          <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="a[<?php echo $q_key; ?>]" id="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>" value="<?php echo $c_key; ?>">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>"><?php echo $choice->text; ?></label>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="text-center p-3">
        <button type="submit" class="button blue-gradient-30 mx-1 btn-submit">Confirm</button>
        <button type="reset" class="button-white blue-gradient-30 mx-1">Cancel</button>
      </div>
    </form>
  </div>
</section>
<?php if (isset($score_user)): ?>
<?php if ($score_user !== false): ?>
<div class="modal fade" id="modalResult" tabindex="-1" role="dialog" aria-labelledby="modalResult" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h1>Sleep Quality Questionaire total score of : Suggestion as below</h1>
        <h2>
          Your Score : <?php echo $score_user->total_score; ?>
        </h2>
        <p>
          <?php echo $score_user->result; ?>
        </p>
        <div class="text-center">
          <a href="users/history" class="button blue-gradient-30 mx-1 btn-submit">Done</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#modalResult').modal('show');
</script>
<?php endif; ?>
<?php endif; ?>
<script>
  $(function() {
    <?php $question_index = 1; ?>
    $('#question-form').submit(function() {
      <?php foreach ($questions as $q_key => $question): ?>
      <?php if ($question->type == 'question'): ?>
      if ($('input[name="a[<?php echo $q_key; ?>]"]:checked').length <= 0) {
        console.log($('input[name="a[<?php echo $q_key; ?>]"]:checked').length);
        alert('Please specify your answer to question <?php echo $question_index; ?>.');
        $('input[name="a[<?php echo $q_key; ?>]"]')[0].focus();
        return false;
      }
      <?php $question_index++; ?>
      <?php endif; ?>
      <?php endforeach; ?>
    })
  })
</script>