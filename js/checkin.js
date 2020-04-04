    function searchDate() {
        var date = $('#dateSearch').val();
        //var pass = $('#password').val();
       // swal(date);

        var url = "";
        if (date == "" ) {
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
                        swal({
                            title: 'ไม่สามารถค้นหาข้อมูลได้'+ this.responseText, 
                            type: 'warning',
                            showConfirmButton: false,
                            timer: 1500});
                        //swal('Good job!',this.responseText, 'warning');
                    }else{
                        document.getElementById("showdata").innerHTML = this.responseText;
                    }
                }
            };
            url = "checkinService.php?date='" + date + "'";
            // console.log(url);
            xmlhttp.open("GET",url, true);
            xmlhttp.send();
        }
    }


    function showDetail(id) {
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
                $('#idMember').val(data[0].id_mem);
                $('#dateCheck').val(data[0].date);
                $('#fitnessCheck').val(data[0].code_fitness);
                $('#timeCheck').val(data[0].time);
            }
            /*else{
                swal('Good job!',this.responseText, 'warning');
            }*/

        };
        url = "showDetail.php?id=" + id;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }


    function showDataFitness(code_fitness) {
        //swal('Good job!',code_fitness, 'warning');

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
                //swal('Good job!',data[0].name_fitness, 'warning');
                $('#editModalLabel').show();
                $('#dataFitness').modal('toggle');
                $('#idFitness').val(data[0].code_fitness);
                $('#nameFitness').val(data[0].name_fitness);
                $('#addFitness').val(data[0].address_fitness);
            }
           /* else{
                swal('Good job!',this.responseText, 'warning');
            }*/

        };
        url = "showFitness.php?code_fitness=" + code_fitness;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }


