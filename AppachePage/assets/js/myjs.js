$(document).ready(function(){

    $(".dropdown-menu li a").click(function(){
      var selText = $(this).text();
      $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
      $(this).parents('.input-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
    });

    
    // $('#btn-relGel').click(function(e) {
    //   e.preventDefault();
    //   var url = $(this).attr('href');
    //   if (url.indexOf('#') == 0) {
    //     $(url).modal('open');
    //   } else {
    //     $.get(url, function(data) {
    //       $('<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">' + data + '</div>').modal();
    //     }).success(function() { $('input:text:visible:first').focus(); });
    //   }
    // });


    $('#btn-relGel').click(function() {
        var inputArg = $('#inputArg').val();
        var inputArgType = $('#btn-entityType').text();
        var inputRelation = $('#btn-relation').text();
        $.post("http://localhost/CodeIgniter/index.php/welcome/add", {arg1: inputArg, arg1Type: inputArgType, relation: inputRelation}, function() {
            //alert( "post was performed." );
            $('#result-list').load("http://localhost/CodeIgniter/index.php/welcome/view/resultList");
            $('#result-doc').load("http://localhost/CodeIgniter/index.php/welcome/view/resultDocs");
            $('#modal-inputArg').val(inputArg);
            document.getElementById("modal-entityType").innerHTML = inputArgType;
            document.getElementById("modal-relation").innerHTML = inputRelation;
            $('#inputArg').val('');
            document.getElementById("btn-entityType").innerHTML = "Entity Type";
            document.getElementById("btn-relation").innerHTML = "- - - - - Relation - - - - -";
        });

    });


    $('.modal-body #result-list').on("click", ".clickable", function(){
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
        $("." + $(this).attr('id') + "-docs").siblings('div').addClass('hide');
        $("." + $(this).attr('id') + "-docs").removeClass('hide');
    });


});

