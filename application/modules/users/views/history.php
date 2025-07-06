<section id="history-page">
  <div class="container">
    <h1>History</h1>
    <h2>You have <?php echo $questions->c(); ?> Questionare : Questionnaire tested <?php echo $questions->tested_count(); ?>
    </h2>
    <div class="question-list">
      <div class="d-flex align-items-center mb-4">
        <div class="done-count"><?php echo $questions->tested_count(); ?>
        </div>
        <div class="progress flex-fill">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $questions->tested_count() / $questions->c() * 100; ?>%" aria-valuenow="<?php echo $questions->tested_count() / $questions->c() * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="total-count"><?php echo $questions->c(); ?>
        </div>
      </div>
      <ul>
      <?php foreach ($question as $q): ?>
        <?php if ($q->status_s == 'on'):?>
        <li class="d-flex align-items-center">
          <div class="question-icon"><img src="assets/images/icon-question.png"></div>
          <div class="question-title flex-fill">
            <?php echo $q->title; ?>
          </div>
            <div class="question-action">
            <?php if ($q->status == 'def'): ?>
            <a class="button blue-gradient-5 btn-submit" href="questionnaires/test/<?php echo $q->id; ?>">TEST</a>
            <?php elseif ($q->status == 'on'): ?>
            <a class="button blue-gradient-5 btn-submit" href="questionnaires/test/<?php echo $q->id; ?>">TEST</a>
            <a class="button blue-gradient-5 btn-white" href="questionnaires/view/<?php echo $q->id; ?>">VIEW</a>
            <?php else: ?>
            <a class="button blue-gradient-5 btn-white" href="questionnaires/view/<?php echo $q->id; ?>">VIEW</a>
            <?php endif; ?>
          </div>
        </li>
        <?php else: ?>

        <?php endif; ?>
       
       <?php endforeach; ?>
       
<!--         
        <?php foreach ($questions as $question): ?>
        <li class="d-flex align-items-center">
          <div class="question-icon"><img src="assets/images/icon-question.png"></div>
          <div class="question-title flex-fill">
            <?php echo $question->title; ?>
          </div>
          <div class="question-action">
            <?php if ($question->tested()): ?>
            <a class="button blue-gradient-5 btn-white" href="questionnaires/view/<?php echo $question->id; ?>">VIEW</a>
            <?php else: ?>
            <a class="button blue-gradient-5 btn-submit" href="questionnaires/test/<?php echo $question->id; ?>">TEST</a>
            <?php endif; ?>
          </div>
        </li>
        <?php endforeach; ?> -->
      </ul>
    </div>
  </div>
</section>

<!-- <?php if ($question->question_list_status == 'on'): ?>
            <a class="button blue-gradient-5 btn-white" href="questionnaires/view/<?php echo $question->id; ?>">VIEW</a>
            <a class="button blue-gradient-5 btn-submit" href="questionnaires/test/<?php echo $question->id; ?>">TEST</a>
            <?php else: ?>

            <a class="button blue-gradient-5 btn-white" href="questionnaires/view/<?php echo $question->id; ?>">VIEW</a>
            <?php endif; ?> -->