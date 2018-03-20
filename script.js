/* Menu */
$(document).ready(function(){
    var header = $('header'),
        btn    = $('button.toggle-nav');

    btn.on('click', function(){
            /*var ime = $('input[name=Ime]').val();
            alert(ime);*/
            header.toggleClass('active');
        });
});

/* Naslovna poruka */
/*

/* Dugme za vrati na pocetak */
$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 400) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });
    
    //Click event to scroll to top
    $('#myBtn').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
});

/* validacija */
$(document).ready(function(){
    $("#greskaIme").hide();
    $("#greskaPrezime").hide();
    $("#greskaMail").hide();
    $("#greskaPassword").hide();
    $("#greskaPassword2").hide();
    $("#greskaLoginEmail").hide();
    $("#greskaLoginPass").hide();
    
    function check_firstname()
    {
        var firstname_length= $('input[name=Ime]').val().length;
        
        if(firstname_length == "")
        {
            $("#greskaIme").html("Ime je obavezno");
            $("#greskaIme").show();
            error_firstname=true;
        }
        
        else if(firstname_length < 3 || firstname_length >20)
        {
            $("#greskaIme").html("Ime treba biti između 3 i 20 znakova");
            $("#greskaIme").show();
            error_firstname=true;
        }
        else
        {
            $("#greskaIme").hide();
        }
        
    }

    function check_lastname()
    {
        var lastname_length= $("input[name=Prezime]").val().length;
        
        if(lastname_length == "")
        {
            $("#greskaPrezime").html("Prezime je obavezno");
            $("#greskaPrezime").show();
            error_lastname=true;
        }
        
        
        else if(lastname_length < 5 || lastname_length >20)
        {
            $("#greskaPrezime").html("Prezime treba biti između 5 i 20 karaktera");
            $("#greskaPrezime").show();
            error_lastname=true;
        }
        else
        {
            $("#greskaPrezime").hide();
        }
    }

    function check_password()
    {
        
        var password_length=$("input[name=pass]").val().length;
        
        
        if(password_length == "")
        {
            $("#greskaPassword").html("Password je obavezan");
            $("#greskaPassword").show();
            error_password=true;
        }
        
        else if(password_length < 8)
        {
            $("#greskaPassword").html("Password treba imati makar 8 karaktera");
            $("#greskaPassword").show();
            error_password=true;
        }
        else
        {
            $("#greskaPassword").hide();
        }
    }

    function check_cpassword()
    {
        var password=$("input[name=pass]").val();        
        var cpassword=$("input[name=pass2]").val();
        
        var cpassword_length=$("input[name=pass2]").val().length;
        
        
        if(cpassword_length == "")
        {
            $("#greskaPassword2").html("Potvrdite password");
            $("#greskaPassword2").show();
            error_cpassword=true;
        }
        else if(password != cpassword)
        {
            $("#greskaPassword2").html("Ne podudara se");
            $("#greskaPassword2").show();
            error_cpassword=true;
        }
        else
        {
            $("#greskaPassword2").hide();
        }
    }

    function check_email()
    {
        var pattern= /^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/;
     
        var email_length=$("input[name=email]").val().length;
         
        if(email_length == "")
        {
            $("#greskaMail").html("Email je obavezan");
            $("#greskaMail").show();
            error_email=true;
        }
        
        else if(pattern.test($("input[name=email]").val()))
        {
            $("#greskaMail").hide();
        }
        else
        {
            $("#greskaMail").html("Ne valja mail adresa");               
            $("#greskaMail").show();               
            error_email=true;
        }
    }

    $("#prva").submit(function(){
        
        error_firstname=false;
        error_lastname=false;
        error_email= false;
        error_password= false;
        error_cpassword= false;
        
        check_firstname(); 
        check_lastname();       
        check_email(); 
        check_password();
        check_cpassword();
         
         if(!(error_firstname===false && error_lastname===false && error_email === false && error_password === false &&error_cpassword === false ))
         {
           return false;   
         }
         
    });
    
    function check_login_email()
    {
        var pattern= /^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/;
     
        var email_length=$("input[name=emailLogin]").val().length;
         
        if(email_length == "")
        {
            $("#greskaLoginEmail").html("Email je obavezan");
            $("#greskaLoginEmail").show();
            error_email=true;
        }
        
        else if(pattern.test($("input[name=emailLogin]").val()))
        {
            $("#greskaLoginEmail").hide();
        }
        else
        {
            $("#greskaLoginEmail").html("Ne valja mail adresa");               
            $("#greskaLoginEmail").show();               
            error_email=true;
        }
    }

    function check_login_password()
    {
        
        var password_length=$("input[name=passLogin]").val().length;
        
        
        if(password_length == 0)
        {
            $("#greskaLoginPass").html("Password je obavezan");
            $("#greskaLoginPass").show();
            error_password=true;
        }
        else
        {
            $("#greskaLoginPass").hide();
        }
    }

    $("#druga").submit(function(){
        error_email = false;
        error_password = false;

        check_login_email();
        check_login_password();

        if(error_email === true || error_password === true){
            return false;
        }
    });
});
