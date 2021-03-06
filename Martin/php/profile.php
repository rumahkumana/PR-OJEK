<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>PR-OJEK : Profile </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1">
        <link rel="stylesheet" type="text/css" href="../css/profile-style.css">
        <script src="../js/profile.js"></script>
    </head>
    <body onload=fetchUserData()>
        <div class="profile-container-top">
            <a class="PR-OJEK-logo" href="../"> <img src="../src/PR-OJEK_logo.PNG"> </a>
            <div class="username-identifier-and-control">
                <p id="username-greetings"> Hi, <span id="hi-username"></span> ! </p>
                <a href="../login.html"> Logout </a>
            </div>
        </div>
        <div class="profile-topnavigation">
            <ul>
                <li><a href="../"> ORDER </a></li>
                <li><a href="../"> HISTORY </a></li>
                <li><a id="active" href="../"> MY PROFILE </a></li>
            </ul>
        </div>
        <div class="profile-and-preferred-locations-main">
            <div class="profile-update">
                <p id="profile-update-text"> MY PROFILE</p>
                <button type="button" id="profile-update-button" onclick="location.href='../edit-profile.html'"><img src="../src/edit_button.PNG"></button>
            </div>
            <div class="user-profile">
                <img id="userpp" src="../src/profile_sample_circle.PNG">
                <p id="username"></p>
                <p id="user-full-name"> Martin Lutta Putra </p>
                <div class="driver-status-and-ratings">
                    <p id="driver-status"> 
                        <span id="user-status"> Driver | </span>
                        <span id="user-stars"> &#9734 4.7 </span>
                        <span id="user-votes"> (1000 votes) </span>
                    </p>
                </div>
                <p id="user-email"> &#9993 13515121@std.stei.itb.ac.id </p>
                <p id="user-phone"> &#9743 085780058876 </p>
            </div>
            <div class="user-preferred-locations">
                <div class="preferred-locations-text"> 
                    <p id="preferred-locations-text"> PREFERRED LOCATIONS: </p>
                    <button type="button" id="preferred-locations-update-button" onclick="location.href = 'edit-preferred-locations.html'"><img src="../src/edit_button.PNG"></button>
                </div>
                <div class="user-preferred-locations-list">
                    <ul id="locations-list">
                        <li id="item1"> <span class="location-items"> Bandung </span> <li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>