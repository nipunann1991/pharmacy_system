<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<div class="script_box">
<script src="assets/js/material.min.js"></script> 
<script src="http://fian.my.id/Waves/static/waves.min.js?v=0.7.1"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
</div>

<script> 

  var server_urls = {
    base_url : 'http://localhost/zigma_pos_php/index.php'
  };


   
  function baseUrl(){
    return server_urls.base_url;
  }


  var url = localStorage.getItem('page_url')
 
  if (typeof url !== 'undefined') {
     loadPage(url); 
  }else{
    loadPage('dashboard'); 
  }

  

  $('html').on('click', '.left_nav a, .page_btn', function(event) {
    event.preventDefault();
    /* Act on the event */
    $('.loader').removeClass('hide');
    $('.left_nav a').removeClass('active');

    var page_url = $(this).attr('data-href');

    localStorage.setItem('page_url',page_url);

    $(this).addClass('active'); 

    loadPage(page_url)

  });



  function loadPage(page_url){


     $.ajax({
        url: 'index.php/pages/'+page_url,  
        dataType: 'html',
      })
      .done(function(data) {  
        
       // $('#page').empty(); 
        $('#page').html(data).addClass('animated fadeIn'); 
        $('.loader').addClass('animated fadeOut');

        var scripts =  $('.script_box').html();
        $('.script_box').empty();  
        $('.script_box').append(scripts);

        $("#page").one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){ 
          $(this).removeClass('animated fadeIn');
        });

        $(".loader").one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){ 
          $(this).removeClass('animated fadeOut').addClass('hide');
        });
 

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
  }

   $('select').select2();

   
 
  function bootbox(){
    bootbox.confirm({
      title: 'text',
      message: "This is a confirm with custom button text and color! Do you like it?",
      buttons: {
          confirm: {
              label: 'Yes',
              className: 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'
          },
          cancel: {
              label: 'No',
              className: 'mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent'
          }
      },
      callback: function (result) {
          console.log('This was logged in the callback: ' + result);
      }
  });
  }

</script>