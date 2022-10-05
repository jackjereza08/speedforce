$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
    $("#profileImage").click(function(e) {
      $("#imageUpload").click();
  });
  
  function fasterPreview( uploader ) {
      if ( uploader.files && uploader.files[0] ){
            $('#profileImage').attr('src', 
               window.URL.createObjectURL(uploader.files[0]) );
      }
  }
  
  $("#imageUpload").change(function(){
      fasterPreview( this );
  });
   
  
    var $this = $(this),
        label = $this.prev('label');
  
      if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
          } else {
            label.addClass('active highlight');
          }
      } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
          label.removeClass('active highlight'); 
        } else {
          label.removeClass('highlight');   
        }   
      } else if (e.type === 'focus') {
        
        if( $this.val() === '' ) {
          label.removeClass('highlight'); 
        } 
        else if( $this.val() !== '' ) {
          label.addClass('highlight');
        }
      }
  
  });
  
  $('.tab a').on('click', function (e) {
    
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    target = $(this).attr('href');
  
    $('.tab-content > div').not(target).hide();
    
    $(target).fadeIn(600);
    
  });

  // SpeedForce JS code here  //
  // ===================================================================== //

  function login(){ 
    var username = $("#uname").val()
    var password = $("#pword").val()
    var flag = false
    $.post("php/login.php",{
      username:username,
      password:password
    },function(data){
      $("#error").html(data)
    })

  }

  function signup(){
    var username = $('#uname').val()
    var fname = $('#fname').val()
    var lname = $('#lname').val()
    var email = $('#email').val()
    var password = $('#pwd').val()

    if(username == "" || fname == "" || lname == "" || email == "" || password == "")
    {
        $('#msg').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please fill up the fields.</div>')
        return
    }
    else
    { 
        $.post("php/signup.php",{
            username:username,
            fname:fname,
            lname:lname,
            email:email,
            password:password
        },function(data){
                $('#msg').html(data)
        })
    }
  }