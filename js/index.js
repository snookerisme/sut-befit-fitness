
$( document ).ready(function() {
    goToHome();
});

function goToHome(){
    $('#wrapper').attr('w3-include-html','home.html'); 
    w3.includeHTML();
}

function goToBooking(){
    $('#wrapper').attr('w3-include-html','booking.php'); 
    w3.includeHTML();
}

function goToCheckin(){
    $('#wrapper').attr('w3-include-html','checkin.html'); 
    w3.includeHTML();
}