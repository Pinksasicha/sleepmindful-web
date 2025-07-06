<section class="content-header">
  <h1><i class="fa fa-question"></i> Question Maker</h1>
</section>

<form action="questionnaires/admin/questions/save/<?php echo $question->id; ?>" method="post">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div style="padding:10px 20px;">
            <div class="form-group" style="margin:0;">
              <label>Title</label>
              <input type="text" name="title" placeholder="Name" class="form-control" value="<?php echo htmlentities($question->title);?>">
            </div>
          </div>
          <div class="box-header" style="padding:20px 20px 0;">
            <button class="btn btn-default add-section" type="button">+ Section</button>
            <button class="btn btn-default add-checkbox" type="button">+ Question Checkbox</button>
            <button class="btn btn-default add-textbox" type="button">+ Question Textbox</button>
            <button class="btn btn-default add-condition" type="button">+ Question Condition</button>
          </div>
          <div id="sortable" class="box-body" style="padding:20px;">

          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="footer-action">
    <button class="btn btn-primary pull-right btn-submit" type="button">Save</button>
    <a class="btn btn-default" href="javascript:history.back();">back</a>
  </div>
</form>
<div id="template">
  <div id="template-section">
    <div class="question">
      <div class="question-tool clearfix">
        <a href="#" class="pull-right btn-box-tool delete-question"><i class="fa fa-times"></i></a>
      </div>
      <div class="form-group">
        <label>Section</label>
        <input type="text" name="q[][title]" class="form-control">
        <input type="hidden" name="q[][type]" value="section">
      </div>
    </div>
  </div>
  <div id="template-checkbox">
    <div class="question">
      <div class="question-tool clearfix">
        <a href="#" class="pull-right btn-box-tool delete-question"><i class="fa fa-times"></i></a>
        <button class="btn btn-default copy-question" type="button">Dupplicate</button>
        <button class="btn btn-default add-choice" type="button">+ Choice</button>
      </div>
      <div class="form-group">
        <label>Question</label>
        <input type="text" name="q[][title]" class="form-control">
        <input type="hidden" name="q[][type]" value="checkbox">
      </div>
      <div class="answer">
        <div class="form-group">
          <div class="row">
          <div class="col-xs-2">
              <label>Score</label>
              <input type="text" name="q[][choice][][score]" class="form-control">
            </div>
            <div class="col-xs-8">
            <label>Choice</label>
              <input type="text" name="q[][choice][][text]" class="form-control">
            </div>
            <div class="col-xs-2">
            <label>&nbsp;</label>
              <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="template-condition">
    <div class="question">
      <div class="question-tool clearfix">
        <a href="#" class="pull-right btn-box-tool delete-question"><i class="fa fa-times"></i></a>
        <button class="btn btn-default copy-question" type="button">Dupplicate</button>
        <button class="btn btn-default add-choice-yes" type="button">+ Choice Yes</button>
        <button class="btn btn-default add-choice-no" type="button">+ Choice No</button>
      </div>
      <div class="form-group">
        <label>Question</label>
        <input type="text" name="q[][title]" class="form-control">
        <input type="hidden" name="q[][type]" value="condition">
      </div>
      <label>If Yes</label>
      <div class="answer-yes">

        <div class="form-group">

          <div class="row">
            <!-- <div class="col-xs-12">
              <input type="text" name="q[][choice][][text]" class="form-control">
            </div> -->
            <div class="col-xs-2">
          <label>Score</label>
          <input type="text" name="q[][choice][][score]" class="form-control">
        </div>
        <div class="col-xs-8">
          <label>Choice</label>
          <input type="text" name="q[][choice][][text]" class="form-control">
        </div>
            <div class="col-xs-2">
            <label>&nbsp;</label>
              <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
            </div>
          </div>
        </div>
      </div>
      <label>If No</label>
      <div class="answer-no">
        <div class="form-group">
          <div class="row">
            <!-- <div class="col-xs-12">
              <input type="text" name="q[][choice][][text]" class="form-control">
            </div> -->
            <div class="col-xs-2">
          <label>Score</label>
          <input type="text" name="q[][choice][][score]" class="form-control">
        </div>
        <div class="col-xs-8">
          <label>Choice</label>
          <input type="text" name="q[][choice][][text]" class="form-control">
        </div>
            <div class="col-xs-2">
            <label>&nbsp;</label>
              <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div id="template-choice">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-2">
          <label>Score</label>
          <input type="text" name="q[][choice][][score]" class="form-control">
        </div>
        <div class="col-xs-8">
          <label>Choice</label>
          <input type="text" name="q[][choice][][text]" class="form-control">
        </div>
        <div class="col-xs-2">
          <label>&nbsp;</label>
          <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
        </div>
      </div>
    </div>
  </div> -->
  <div id="template-choice">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-2">
          <label>Score</label>
          <input type="text" name="q[][choice][][score]" class="form-control">
        </div>
        <div class="col-xs-8">
          <label>Choice</label>
          <input type="text" name="q[][choice][][text]" class="form-control">
        </div>
        <div class="col-xs-2">
          <label>&nbsp;</label>
          <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <div id="template-textbox">
    <div class="question">
      <div class="question-tool clearfix">
        <a href="#" class="pull-right btn-box-tool delete-question"><i class="fa fa-times"></i></a>
      </div>
      <div class="form-group">
        <label>Question</label>
        <input type="text" name="q[][title]" class="form-control">
        <input type="hidden" name="q[][type]" value="textbox">
      </div>
    </div>
  </div>
</div>
<script src="themes/admin/asset/plugins/jQueryUI/jquery-ui.min.js"></script>
<script>
  var q = <?php echo $q_json ? $q_json : '[]'; ?> ;
  if (Array.isArray(q) == false) {
    q = [];
  }
  $(function() {

    q.map(function(json) {
      if (json.type == 'section') {
        console.log('section');
        var section = $('#template-section .question').clone();
        section.find('input[name="q[][title]"]').val(json.title);
        section.appendTo(".box-body");
      }
      if (json.type == 'checkbox') {
        console.log('checkbox');
        var question = $('#template-checkbox .question').clone();
        question.find('input[name="q[][title]"]').val(json.title);
        question.find('.answer').html('');
        var question_answer = question.find('.answer');
          json.choice.map(function(answer) {
            var choice = $('#template-choice .form-group').clone();
            choice.find('input[name="q[][choice][][score]"]').val(answer.score);
            choice.find('input[name="q[][choice][][text]"]').val(answer.text);
            choice.appendTo(question_answer);
          })
          question.appendTo(".box-body");
        }
        
      
      if (json.type == 'textbox') {
        console.log('textbox');
        var section = $('#template-textbox .question').clone();
        section.find('input[name="q[][title]"]').val(json.title);
        section.appendTo(".box-body");
      }
      if (json.type == 'condition') {
        console.log('question');
        var question = $('#template-condition .question').clone();
        question.find('input[name="q[][title]"]').val(json.title);
        question.find('.answer-yes').html('');
        question.find('.answer-no').html('');
        var question_answer_yes = question.find('.answer-yes');
        var question_answer_no = question.find('.answer-no');
        if (json.choice != undefined) {
          if (Array.isArray(json.choice.yes)) {
            json.choice.yes.map(function(answer) {
              var choice = $('#template-choice .form-group').clone();
              choice.find('input[name="q[][choice][][score]"]').val(answer.score);
              choice.find('input[name="q[][choice][][text]"]').val(answer.text);
              choice.appendTo(question_answer_yes);
            })
          }
          if (Array.isArray(json.choice.no)) {
            json.choice.no.map(function(answer) {
              var choice = $('#template-choice .form-group').clone();
              choice.find('input[name="q[][choice][][score]"]').val(answer.score);
              choice.find('input[name="q[][choice][][text]"]').val(answer.text);
              choice.appendTo(question_answer_no);
            })
          }
        }
        question.appendTo(".box-body");
      }
    })

    $('.add-section').click(function() {
      $('#template-section .question').clone().appendTo(".box-body");
    })
    $('.add-checkbox').click(function() {
      $('#template-checkbox .question').clone().appendTo(".box-body");
    })
    $('.add-textbox').click(function() {
      $('#template-textbox .question').clone().appendTo(".box-body");
    })
    $('.add-condition').click(function() {
      $('#template-condition .question').clone().appendTo(".box-body");
    })
    var fixHelper = function(e, ui) {
      ui.children().each(function() {
        $(this).width($(this).width());
      });
      return ui;
    };

    $('.content').on('click', '.delete-question', function() {
      $(this).closest('.question').remove();
      return false;
    })

    $('.content').on('click', '.add-choice', function() {
      var container = $(this).closest('.question').find('.answer');
      $('#template-choice .form-group').clone().appendTo(container);
      return false;
    })

    $('.content').on('click', '.add-choice-yes', function() {
      var container = $(this).closest('.question').find('.answer-yes');
      $('#template-choice .form-group').clone().appendTo(container);
      return false;
    })

    $('.content').on('click', '.add-choice-no', function() {
      var container = $(this).closest('.question').find('.answer-no');
      $('#template-choice .form-group').clone().appendTo(container);
      return false;
    })

    $('.content').on('click', '.copy-question', function() {
      $(this).closest('.question').clone().appendTo(".box-body");;
      return false;
    })

    $('.content').on('click', '.delete-choice', function() {
      $(this).closest('.form-group').remove();
      return false;
    })

    $('.btn-submit').click(function() {
      $('.box-body .question').each(function(index) {
        $(this).find('input').each(function() {
          var name = $(this).attr('name').replace(/q\[\]/g, 'q[' + index + ']');
          $(this).attr('name', name);
        })
        $(this).find('.answer .form-group').each(function(answer_index) {
          $(this).find('input').each(function() {
            var name = $(this).attr('name').replace(/\[choice\]\[\]/g, '[choice][' + answer_index + ']');
            $(this).attr('name', name);
          })
        })
        $(this).find('.answer-yes .form-group').each(function(answer_index) {
          $(this).find('input').each(function() {
            var name = $(this).attr('name').replace(/\[choice\]\[\]/g, '[choice][yes][' + answer_index + ']');
            $(this).attr('name', name);
          })
        })
        $(this).find('.answer-no .form-group').each(function(answer_index) {
          $(this).find('input').each(function() {
            var name = $(this).attr('name').replace(/\[choice\]\[\]/g, '[choice][no][' + answer_index + ']');
            $(this).attr('name', name);
          })
        })
      })
      $('form').submit();
    })

    $("#sortable").sortable({
      helper: fixHelper,
      start: function(e, ui) {
        ui.placeholder.height(ui.item.height());
      },
      stop: function(e, ui) {
        $('.question').css('width', 'auto');
      },
      update: function(event, ui) {

      }
    }).disableSelection();
  })
</script>