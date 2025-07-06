<section class="content-header">
  <h1><i class="fa fa-list-ol"></i> Score Answer</h1>
</section>

<form action="questionnaires/admin/answer/save/<?php echo $question->id; ?>" method="post">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header" style="padding:20px 20px 0;">
            <button class="btn btn-default add-answer" type="button">+ Answer</button>
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
  <div id="template-answer">
    <div class="form-group">
      <div class="row">
        <div class="col-xs-1">
          <label>Min</label>
          <input type="text" name="a[][min]" class="form-control">
        </div>
        <div class="col-xs-1">
          <label>Max</label>
          <input type="text" name="a[][max]" class="form-control">
        </div>
        <div class="col-xs-8">
          <label>Answer</label>
          <input type="text" name="a[][text]" class="form-control">
        </div>
        <div class="col-xs-2">
          <label>&nbsp;</label>
          <button class="btn btn-danger form-control delete-choice" type="button">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="themes/admin/asset/plugins/jQueryUI/jquery-ui.min.js"></script>
<script>
  var a = <?php echo $a_json ? $a_json : '[]'; ?> ;
  if (Array.isArray(a) == false) {
    a = [];
  }
  $(function() {
    a.map(function(json) {
      var answer = $('#template-answer .form-group').clone();
      answer.find('input[name="a[][min]"]').val(json.min);
      answer.find('input[name="a[][max]"]').val(json.max);
      answer.find('input[name="a[][text]"]').val(json.text);
      answer.appendTo(".box-body");
    })

    $('.add-answer').click(function() {
      $('#template-answer .form-group').clone().appendTo(".box-body");
    })


    $('.content').on('click', '.delete-choice', function() {
      $(this).closest('.form-group').remove();
      return false;
    })

    $('.btn-submit').click(function() {
      $('.box-body > .form-group').each(function(index) {
        $(this).find('input').each(function() {
          var name = $(this).attr('name').replace(/a\[\]/g, 'a[' + index + ']');
          $(this).attr('name', name);
        })
      })
      $('form').submit();
    })
  })
</script>