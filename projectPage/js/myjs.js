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
        var xmlhttp;
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
              if(xmlhttp.responseText.length > 0){
                document.getElementById("modal-doc").innerHTML = 'related docs';
                document.getElementById("result-list").innerHTML=xmlhttp.responseText;
              }
            }
          }
        xmlhttp.open("GET","php/ResultList.php?p=" + $('#inputArg').val(), true);
        xmlhttp.send();
    });


    $('.modal-body #result-list').on("click", ".clickable", function(){
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });


});

