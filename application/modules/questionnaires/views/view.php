<section id="history-page">
  <div class="container">
    <h1>History</h1>

    <div class="container">
    <canvas id="myChart"></canvas>
    </div>

    <?php $round = 0; ?>
    <?php foreach($score_users as $score_user):?>
      <?php $round++; ?>
    <div class="question-list pt-5">
      <h4>
        <?php echo '[Round : '.$round.'] '.$question_list->title; ?>
      </h4>
      <div class="question-score" style="width:auto;">
        <?php $q_key = array_keys($questions)[$round - 1]; ?>
        <!-- <?php echo $q_key; ?> -->
        <br>
        <?php $idx = 0;?>
        <?php $q_no = 1; ?>
        <!-- <?php echo json_encode($questions); ?> -->
        <?php foreach($questions[$q_key] as $question) {?>
          <?php if ($question->type == 'question') { ?>
            <p>Ans <?php echo $q_no.': '.$question->choice[$user_answers[$q_key][$idx]]->text; ?></p>
            <?php $q_no++; ?>
          <?php } ?>
          <?php $idx++ ?>
        <?php } ?> 
        <hr style="border: 1px dotted;">
        Your Score : <?php echo $score_user->total_score; ?>
        <p class="text-center">
        <?php echo $score_user->result; ?>
      </p></div>
      <?php if ($score_user->recommend): ?>
      <div class="recommend">
        <h5>Recommend :</h5>
        <p>
          <?php echo $score_user->recommend; ?>
        </p>
      </div>
      
      </div>
      <?php endif; ?><br>
      <?php endforeach;?>
      

      <hr />
      <div class="text-center pt-4 pb-2">
        <a class="button blue-gradient-30 btn-submit" href="users/history">BACK</a>
      </div>
  
      
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
var date = [<?php foreach($score_users as $score_user):?>
             '<?php echo date("d M Y",strtotime($score_user->updated)); ?>',
             <?php endforeach;?>];
var score = [<?php foreach($score_users as $score_user):?>
            '<?php echo $score_user->total_score; ?>',
             <?php endforeach;?>];
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
            text: 'Score Chart',
            fontSize: 20,
            fontColor: '#3ec5df'
        }
    }
});

</script>



