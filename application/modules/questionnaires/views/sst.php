<section id="question-page" class="sst-page">
  <div class="container">
    <h1>
      <?php echo isset($question_list) ? $question_list->title : 'SST: measurement of sleep satisfaction'; ?>
    </h1>
    <form id="question-form" action="questionnaires/sst/save/<?php echo isset($question_list) ? $question_list->id : ''; ?>" method="post">
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
        <div class="form-group">
          <input type="text" class="form-control" name="a[<?php echo $q_key; ?>]">
        </div>
      </div>
      <?php elseif ($question->type == 'checkbox'): ?>
      <div class="question">
        <h3>
          <?php echo $question_index . '.' . $question->title; ?>
        </h3>
        <?php $question_index++; ?>
        <div class="answer">
          <?php foreach ($question->choice as $c_key => $choice): ?>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="a[<?php echo $q_key; ?>][<?php echo $c_key; ?>]" id="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>" value="<?php echo $c_key; ?>">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>"><?php echo $choice->text; ?></label>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php elseif ($question->type == 'condition'): ?>
      <div class="question">
        <h3>
          <?php echo $question_index . '.' . $question->title; ?>
        </h3>
        <?php $question_index++; ?>
        <div class="answer answer-yn">
          <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="a[<?php echo $q_key; ?>][answer]" id="answer_<?php echo $q_key; ?>_y" value="yes">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_y">Yes</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="a[<?php echo $q_key; ?>][answer]" id="answer_<?php echo $q_key; ?>_n" value="no">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_n">No</label>
          </div>
        </div>
        <div class="answer answer-y" style="display:none;">
          <?php if (isset($question->choice->yes)): ?>
          <strong>If Yes</strong>

          <?php foreach ($question->choice->yes as $c_key => $choice): ?>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="a[<?php echo $q_key; ?>][yes][<?php echo $c_key; ?>]" id="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>y" value="<?php echo $c_key; ?>">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>y"><?php echo $choice->text; ?></label>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="answer answer-n" style="display:none;">
          <?php if (isset($question->choice->no)): ?>
          <strong>If No</strong>

          <?php foreach ($question->choice->no as $c_key => $choice): ?>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="a[<?php echo $q_key; ?>][no][<?php echo $c_key; ?>]" id="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>n" value="<?php echo $c_key; ?>">
            <label class="custom-control-label" for="answer_<?php echo $q_key; ?>_<?php echo $c_key; ?>n"><?php echo $choice->text; ?></label>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
      <div class="text-center p-3">
        <button type="submit" class="button blue-gradient-30 mx-1 btn-submit">Confirm</button>
        <!-- <button type="reset" class="button-white blue-gradient-30 mx-1">Cancel</button> -->
        <a href="users/history"><button type="button" class="button-white blue-gradient-30 mx-1">Cancel</button></a>
      </div>
    </form>
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
<script>
  $(function() {
    <?php $question_index = 1; ?>
    $('#question-form').submit(function() {
      <?php foreach ($questions as $q_key => $question): ?>
      <?php if ($question->type == 'textbox'): ?>
      if ($('input[name="a[<?php echo $q_key; ?>]"]').val().length <= 0) {
        alert('Please specify your answer to question <?php echo $question_index; ?>.');
        $('input[name="a[<?php echo $q_key; ?>]"]').focus();
        return false;
      }
      <?php $question_index++; ?>
      <?php endif; ?>
      <?php if ($question->type == 'checkbox'): ?>
      if ($('input[name^="a[<?php echo $q_key; ?>]"]:checked').length <= 0) {
        alert('Please specify your answer to question <?php echo $question_index; ?>.');
        $('input[name^="a[<?php echo $q_key; ?>]"]')[0].focus();
        return false;
      }
      <?php $question_index++; ?>
      <?php endif; ?>
      <?php if ($question->type == 'condition'): ?>
      if ($('input[name="a[<?php echo $q_key; ?>][answer]"]:checked').length <= 0) {
        alert('Please specify your answer to question <?php echo $question_index; ?>.');
        $('input[name="a[<?php echo $q_key; ?>][answer]"]')[0].focus();
        return false;
      } else {
        var value = $('input[name="a[<?php echo $q_key; ?>][answer]"]:checked').val();
        if ($('input[name^="a[<?php echo $q_key; ?>][' + value + ']"]').length > 0) {
          if ($('input[name^="a[<?php echo $q_key; ?>][' + value + ']"]:checked').length <= 0) {
            alert('Please specify your answer to question <?php echo $question_index; ?>.');
            $('input[name^="a[<?php echo $q_key; ?>][' + value + ']"]')[0].focus();
            return false;
          }
        }
      }
      <?php $question_index++; ?>
      <?php endif; ?>
      <?php endforeach; ?>
    })
  })
</script>