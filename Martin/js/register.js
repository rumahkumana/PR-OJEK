function checkInDB() {
    var username_value = document.getElementById("username").value; 
    var email_value = document.getElementById("email").value; 

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myJSON = this.responseText;
            var obj = JSON.parse(myJSON);
            document.getElementById("isUsernameExist").innerHTML = obj.username;
            document.getElementById("isEmailExist").innerHTML = obj.email;
        }
    }
    xmlhttp.open("GET", "php/checkdata.php?username="+username_value+"&email="+email_value,true);
    xmlhttp.send();
}