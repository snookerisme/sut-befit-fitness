    function searchBooking(str) {
        var string = str.substr(0,5);
        var url = "";
        //swal('Opp!',str, 'warning');

        if (string == " ") {
            document.getElementById("showdata").innerHTML = " ";
ฃ        }else {
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
                    //swal('Opp!',str, 'warning');

                   document.getElementById("showdata").innerHTML = this.responseText;
                    }
                
            };
            url = "bookingService.php?str='" + str + "'";
            // console.log(url);
            xmlhttp.open("GET",url, true);
            xmlhttp.send();
        }
    }

    function editStatus(id) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                                    //swal('Opp!',this.responseTex, 'warning');
                data = JSON.parse(this.responseText);
                console.log(data);
                $('#saveEdit').show();
                $('#editModalLabel').show();
                $('#editBooking').modal('toggle');
                $('#idBooking').val(data[0].id);
                $('#dayBooking').val(data[0].booking_day);
                $('#timeBooking').val(data[0].booking_time);
                $('#userBooking').val(data[0].booking_user);
                $('#exBooking').val(data[0].code_exercise);
                $('#statusBooking').val(data[0].status);
            }
        };
        url = "selectEdit.php?id=" + id;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }

    function saveEdit() {
        // alert("T");
        var id =  $('#idBooking').val();
        var day = $('#dayBooking').val();
        var time = $('#timeBooking').val();
        var user = $('#userBooking').val();
        var ex = $('#exBooking').val();
        var status = $('#statusBooking').val();
        var data = {
            id: ""+ id,
            day: "" + day,
            time: "" + time,
            user: "" + user,
            ex: "" + ex,
            status: "" + status
        };
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 1) {
                    //clearAddMyal();
                    //setDataTableFitness(1);
                    swal({
                        title: 'บันทึกข้อมูลสำเร็จ', 
                        type: 'success',
                        showConfirmButton: false,
                        timer: 1500});
                    $('#editBooking').modal('hide');
                } else {
                    swal({
                        title: 'ไม่สามารถบันทึกข้อมูลได้'+ this.responseText, 
                        type: 'warning',
                        showConfirmButton: false,
                        timer: 1500});
                    $('#editBooking').modal('hide');
                    //swal('ไม่สามารถบันทึกข้อมูลได้', this.responseText, 'warning');
                }
            }
        };
        var json = JSON.stringify(data);
        url = "editStatusService.php?json=" + json;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
