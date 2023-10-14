<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
    var data = {
        name: $("#name").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        action: $("#action").val(),
    };

    $.ajax({
        url: 'function.php',
        type: 'post',
        data: data,
        success:function(response){
        if(response == "Login Successful" || response == "Registration Successful"){
            window.location.reload();
        }
        else {
            $("#error").html(response);
        }
        }
    });
    });
}

  function saveData(){
    $(document).ready(function(){
    var data = {
        username: $("#username").val(),
        firstname: $("#firstname").val(),
        lastname: $("#lastname").val(),
        email: $("#email").val(),
        age: $("#age").val(),
        gender: $("#gender").val(),
        phone: $("#phone").val(),
        country: $("#country").val(),
        action: $("#action").val(),
    };

    $.ajax({
        url: 'function.php',
        type: 'post',
        data: data,
        success:function(response){
        if(response == "Saved Successfully"){
            window.location.reload();
        }
        else {
            $("#error").html(response);
        }
        }
    });
    });
}
</script>