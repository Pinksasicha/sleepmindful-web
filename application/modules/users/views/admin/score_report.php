<style type="text/css">
  hr {
    margin-bottom: 30px;
  }
</style>

<h1 style="text-align:center;"><br />Questionnaire<br />
  <?php echo $user->first_name . ' ' . $user->last_name; ?><br />
  <?php echo $created_at; ?>
</h1>
<?php $round = 0; ?>
<?php foreach ($score_users as $score_user) :?>
  <?php $round++; ?>
<h3><?php echo '[Round : '.$round.'] '.$question_list->title; ?>
</h3>
<p><strong>Score : <?php echo $score_user->total_score; ?></strong></p>
<p><?php echo $score_user->result; ?>
</p>


<h3>Recommend</h3>
<div class="form-group"><?php echo nl2br($score_user->recommend); ?>
</div>
<hr />
<?php endforeach ;?>