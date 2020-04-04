function editStatus(id) {
    //var id = $_Session["id"];
    //var pass = $('#password').val();
    var url = "";
    if (id == "" ) {
        $('#textWarning').show();
    } else {
        $('#textWarning').hide();
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                /*if(this.responseText == 0){
                    swal('Opp!','Username Or Password Incorrect!!', 'warning');
                }else{
                    //swal('Good job!',this.responseText, 'warning');

                   window.location.href = "index.html";
                }*/
            }
        };
        url = "editStatusService.php?id='"+id+"'";
        // console.log(url);
        xmlhttp.open("GET",url, true);
        xmlhttp.send();
    }
}
