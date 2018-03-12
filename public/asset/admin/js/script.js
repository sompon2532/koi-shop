$(document).ready(function() {
  var table = $('#dataTable').DataTable();

  $('#dataTable tbody').on('click', 'tr', function (event) {
    var target = $( event.target );
    if(target.is('.delete')) {
      if( confirm('Are you sure delete') ) {
        return true;
      }
      else {
        return false;
      }
    }
  });

  $('.menu-collapse').click(function() {

    $('nav').slideToggle(500, function() {
      $(this).css('display', '');
      $(this).toggleClass('menu-expanded');
    });

  });

  $(document).on('click', '.button-upload', function(){
    $(this).prev().trigger('click');
  });

  $(document).on('change', '.choose_file', function() {
    var input = $(this).parent().find('.text-show');
    if( $(this).val() === '') {
      var target = $(this).next().next().next().children();
      target.attr('src', '');
      input.val('');
    }
    else if( input.val() === '' ) {
      var value = $(this).val().replace('C:\\fakepath\\', '');
      var target = $(this).next().next().next().children();
      if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            target.attr({
              src: e.target.result,
              width: '450'
            });
          }
          reader.readAsDataURL(this.files[0]);
      }
      input.val(value);
    }
    else {
      var value = $(this).val().replace('C:\\fakepath\\', '');
      var target = $(this).next().next().next().children();
      if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            target.attr({
              src: e.target.result,
              width: '450'
            });
          }
          reader.readAsDataURL(this.files[0]);
      }
      input.val(value);
    }
  });

  function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image-preview img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    else {
      $('#image-preview img').attr('src', '');
    }

  }

  $('.add-image').click(function() {
    var html = '<div class="form-group">';
    html += '<label for="" class="col-sm-2 control-label">รูปภาพ</label>';
    html += '<div class="col-sm-8">';
    html += '<span class="pull-right img-cancle" style="font-size: 24px; color: #FF0000; cursor: pointer"><i class="fa fa-times"></i></span>';
    html += '<input type="file" name="image[]" class="form-control choose_file" id="" placeholder="">';
    html += '<button type="button" class="btn btn-warning button-upload">เลือกไฟล์รูปภาพ</button>';
    html += '<input type="text" name="imageName[]" class="text-show" value="">';
    html += '<div id="image-preview">';
    html += '<img src="" alt="" />';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $(html).insertBefore($(this).parent().parent());
  });

  $(document).on('click', 'span.img-cancle', function() {
    $(this).parent().parent().remove();
  });

  $(document).on('click', 'span.img-cancle-hide', function() {
    var obj = $(this).parent().parent();
    obj.find('input[type="text"]').val('');
    obj.find('#image-preview img').attr('src', '');
  });

  $('.add-remark').click(function() {
    var html = '<div class="form-group">';
    html += '<label for="" class="col-sm-2 control-label">หมายเหตุ</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="text" name="remark[]" class="form-control" id="" value="">';
    html += '</div>';
    html += '</div>';
    $(html).insertBefore($(this).parent().parent());
  });

});
