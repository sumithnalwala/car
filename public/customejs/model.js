$(document).ready(function(){
     $('#form-error').hide();  
     $(".alert-success").hide().delay(5000).fadeOut();
     $('#model_add_form').submit(function(event) {
       event.preventDefault();
         $('#form-error').hide(); 
         $('#form-success').hide(); 
        var form = $('form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            url:  '/carmodel',
            data:formData,   
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
            asyn: false,
            success: function(data) {
               $.each( data, function( key, value ) {
                   if(key == 'error'){
                    var err = '';
                    $.each(value,function(key,value){
                       err = err+value+'<br/>'; 
                    });
                    $('#form-error').html(err);
                    $('#form-error').show();
                    $( "#form-error" ).focus();     
                   }else{
                    $('#form-success').html(value);
                    $('#form-success').show();
                    $('#form-success').focus();      
                   }

               });
               
            }
        });
    
    });


      $('#form_update_view').submit(function(event) {
       event.preventDefault();
         $('#form-error').hide(); 
         $('#form-success').hide(); 
        var form = $('form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var id = $('#dataid');
        $.ajax({
            type: "POST",
            url:  '/updatemodel/'+id,
            data:formData,   
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false,
            asyn: false,
            success: function(data) {
               $.each( data, function( key, value ) {
                   if(key == 'error'){
                    var err = '';
                    $.each(value,function(key,value){
                       err = err+value+'<br/>'; 
                    });
                    $('#form-error').html(err);
                    $('#form-error').show();  
                    $( "#form-error" ).focus();   
                   }else{
                    $('#form-success').html(value);
                    $('#form-success').show(); 
                    alert(value);
                    location.reload();
                   }

               });
               
            }
        });
    
  });


});



