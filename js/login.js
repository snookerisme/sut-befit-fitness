

//var input = document.getElementById("login");
//input.addEventListener("keyup", function goToLogin(){
    function goToLogin() {
        var user = $('#username').val();
        var pass = $('#password').val();
        var url = "";
        if (user == "" || pass == "") {
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
                    if(this.responseText == 0){
                        swal('โปรดลองอีกครั้ง!','ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง', 'warning');
                    }else{
                        //swal('Good job!',this.responseText, 'warning');

                       window.location.href = "index.html";
                    }
                }
            };
            url = "loginService.php?username='" + user + "'&password='" + pass + "'";
            // console.log(url);
            xmlhttp.open("GET",url, true);
            xmlhttp.send();
        }
    }
