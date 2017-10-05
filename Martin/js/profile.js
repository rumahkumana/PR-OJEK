function fetchUserData() {
    
    var id_active = getQueryVariable("id_active");
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myJSON = this.responseText;
            var obj = JSON.parse(myJSON);
            document.getElementById("hi-username").innerHTML = obj.username;
            document.getElementById("username").innerHTML = "@" + obj.username;
            document.getElementById("user-full-name").innerHTML = obj.full_name;
            document.getElementById("user-email").innerHTML = "&#9993 " + obj.email;
            document.getElementById("user-phone").innerHTML =  "&#9743 " + obj.phone;
            if (obj.hasOwnProperty("rating")) {
                document.getElementById("user-status").innerHTML = "Driver | ";
                document.getElementById("user-stars").innerHTML = "&#9734 " + obj.rating;
                document.getElementById("user-votes").innerHTML = "(" + obj.votes + " votes)";
            }
            else {
                document.getElementById("driver-status").innerHTML = "ASD";                
            }
        }
    }
    xmlhttp.open("GET", "fetchUserData.php?id_active="+id_active,true);
    xmlhttp.send();
}

function getQueryVariable(variable)
{ 
  var query = window.location.search.substring(1); 
  var vars = query.split("&"); 
  for (var i=0;i<vars.length;i++)
  { 
    var pair = vars[i].split("="); 
    if (pair[0] == variable)
    { 
      return pair[1]; 
    } 
  }
  return -1; //not found 
}