<?php include('server.php') ?>
<?php include('block_permission.php') ?>
<?php
// if ($_SESSION['usertype'] != "Master-User" && $_SESSION['usertype'] != "Admin") {
//     header('location: login.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">


    <!-- Favicons -->
    <link href="Images/logo.png" rel="icon">
    <link href="Images/logo.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="lib/chart-master/Chart.js"></script>


    <!--    styles form search page-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.js" type="text/javascript"></script>
    <script src="js/notifIt.js" type="text/javascript"></script>
    <link href="css/notifIt.css" type="text/css" rel="stylesheet">

    <style>
        .table1 {
            width: 1060px;
            overflow-x: auto;
            margin-top: 20px;
            margin-left: 15px;
            background-color: #E8E8E8;
            box-sizing: border-box;
            box-shadow:  0 0 5px #000000b3;
            border: 2px solid #B0C4DE;;
        }
        .table2 {

            width: 1060px;
            margin-top: 2px;
            margin-left: 15px;
            background-color: #E8E8E8;
            box-sizing: border-box;
            box-shadow:  0 0 5px #000000b3;
            border: 2px solid #B0C4DE;;
        }

        .td2{

            padding: 10px;
            border: 2px solid #B0C4DE;;
            font-weight:bold;
            text-align : center;
            height: 30px;
        }
        .tr1 {
            margin-top: 20px;

        }
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border: none;
            border-radius: 5px;
        }

        .btn:hover {
            box-shadow:  0 0 5px #000000b3;
            color: white;
        }
        .btn btn-info:hover{
            box-shadow:  0 0 5px #000000b3;
            color: white;
        }
        .header1 {
            width: 40%;
            margin: 50px auto 0px;
            color: white;
            background: #5F9EA0;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;
        }
        table td {
            background-color:white;
            color:black;
        }
    </style>
</head>
<script>
    function not9(abc) {
        notif({
            msg: abc,
            position: "left",
            bgcolor: "#ff0000",
            color: "#ffffff"
        });
    }

    function not1(not){
        notif({
            msg: not,
            type: "success"
        });
    }
</script>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg" style="margin-top: -1px;margin-left: -5px;margin-right: -10px">
        <!--      <div class="sidebar-toggle-box">-->
        <!--        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>-->
        <!--      </div>-->
        <!--logo start-->
        <a href="dashboard.php" class="logo"><b>DASH<span>BOARD</span></b></a>
        <!--logo end-->

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="index.php?logout='1'" >Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <div class="sidenav">
        <?php include 'sidebar.php';?>
    </div>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content" style="background-image: url('img/11-Plus.jpeg'); background-size: cover">
        <section class="wrapper" >
            <div class="header1" style="width: 100%;margin-left: 1px">
                <h2>Diary</h2>
            </div>
            <div  style="background-color:white;border-bottom-right-radius: 7px;border-bottom-left-radius: 7px; margin-top: 3px;padding-top: 7px; width: 100%;margin-left: 1px; overflow-y:auto ;box-shadow:  0 0 10px #000000b3;margin-bottom: 30px">

            <!-- // comment save notification -->
            <?php
                    if(isset($_SESSION['commentSaved']))
                    {
                        echo '<h4 style="color:green;text-align:center"><b>Comment saved successfully.</b></h4>';
                        unset($_SESSION['commentSaved']);
                    }
                ?>

            <div  style="background-color:white; margin-top: 3px;padding-top: 7px; width: 35%;border-radius: 7px; margin-left: 50px;margin-bottom: 0px; box-shadow:  0 0 10px #000000b3;">

                <div style="display:inline-block;margin: 10px">
                    <form method="post" action="fetch.php">
                    <input type="text" placeholder="Enter Family ID" name="family_id" id="family_id" style="height: 30px; padding-left: 4px; margin-left: 0px;border-radius: 7px;width: 180px" autofocus>

                </div>
                <div style="display:inline-block;margin: 20px">
                    <button type="button" name="find_student" id="find_student" class="btn btn-info">Search</button>
                </div>
            </div>
                <div id="printableArea">
                <div style="display:inline-block;margin-left:30px;">
                    <div style="display:inline-block;margin: 20px" id="existing_comments">
                        <table class="table table-bordered" id="existing_comments_table">
                            <thead style="background-color:#5F9EA0;color:white">
                                <tr>
                                    <th>User</th>
                                    <th>Comments</th>
                                    <th>Date & Time</th>
                                </tr>
                            </thead>
                        </table>
                    </div><br>

                    <div style="display:inline-block;margin-left: 70px">
                        <label style="margin-left: -45px"><b>Add Comment:</b></label><br>
                        <textarea style="margin-left: -45px" name="comment" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                   
                  
                    <div >
                        <button style="margin-left: 25px; margin-top:20px" type="submit" name="addComment" class="btn btn-info">Submit Comment</button>
                    </div>
                    </form>
                    <div id="print_f_id" style="display:none;margin-left: 60px">
                        <label style="margin-left: -45px"><b>Family ID</b></label><br>
                        <input type="button" id="f_id_print" name="f_id_print" style="padding-left: 10px; margin-left: -50px;height: 30px; border-radius: 5px;width: 160px">
                    </div>

        <div>



        </div>

                </div>
                 <?php 
                    if (isset($_POST['viewResult'])) {
                        $familyId = $_POST['family_id'];
                        $studentName = $_POST['select'];
                            $sql2 = "SELECT * from student_tests where family_id = '$familyId' && student_name = '$studentName'";
                            $result = mysqli_query($db, $sql2);
                            $row = mysqli_fetch_array($result);
                            // print_r($row);
                            // echo $row['book'];
                            if($row['family_id']!=$familyId && $row['student_name']!=$studentName)
                            {
                                echo '
                                    <script>
                                          var abc = "No record found!";
                                            not9(abc);

                                    </script>
                                ';
                            }
                            else
                            {
                                echo '
                    <div style="margin-top: 0px;margin-bottom: 20px">
                    <table class="table1">
                        <tr class="tr1">
                            <th class="td2" style="width: 88px;">
                                Family ID
                            </th>
                            <th class="td2" style="width: 160px;">
                                Student Name
                            </th>
                            <th class="td2" style="width: 92px;">
                                Book
                            </th>
                            <th class="td2" style="width: 171px;">
                                Test No
                            </th>
                            <th class="td2" style="width: 150px;">
                                Attempt
                            </th>

                            <th class="td2" style="width: 160px;">
                                Test Date
                            </th>
                            <th class="td2" style="width: 90px;">
                                Percentage
                            </th>
                        
                            <th class="td2" style="width: 55px;">
                                Status
                            </th>
                            <th class="td2" style="width: 55px;">
                                Tutor Updated By
                            </th>
                        </tr>
                        <tbody style="text-align:center">
                            <tr>
                                <td class="td2">'.$row["family_id"].'</td>
                                <td class="td2">'.$row["student_name"].'</td>
                                <td class="td2">'.$row["book"].'</td>
                                <td class="td2">'.$row["test_no"].'</td>
                                <td class="td2">'.$row["attempt"].'</td>
                                <td class="td2">'.$row["test_date"].'</td>
                                <td class="td2">'.$row["percentage"].'</td>
                                <td class="td2">'.$row["status"].'</td>
                                <td class="td2">'.$row["tutor_updated_by"].'</td>

                                

                            </tr>
                        </tbody>
                    </table>
                    
                </div>

                    
               ';
                            }
               
              
                         }
                ?>
                
                    <div id="print_table_div" style=" height: 200px; overflow:auto ;">
                        <table class='table2' id="timetable" >

                        </table>
                    </div>
                </div>
                </div>
                <!--     <input type="button" style="width: 80px;margin-right: 20px;margin-bottom: 20px; float: right;margin-top: 20px;background-color: green" class="btn" onclick="printDiv('printableArea')" value="Print" />
                    <input type="button" id="update" style="width: 80px;margin-left: 20px;margin-bottom: 20px; float: left;margin-top: 20px;" class="btn btn-info" value="Update" /> -->


                <script>
                    function x() {
                        document.location.href="managetimetable.php";

                    }

                    function printDiv(divName) {

                        var s_name=$('#select').val();
                        var f_date=$('#from_date').val();
                        var t_date=$('#to_date').val();
                        $("#print_student_name").css("display", "block");
                        $("#print_from_date").css("display", "block");
                        $("#print_to_date").css("display", "block");
                        document.getElementById("print_student_name").innerText=s_name;
                        document.getElementById("print_from_date").innerText=f_date;
                        document.getElementById("print_to_date").innerText=t_date;
                        $("#select").css("display", "none");
                        $("#from_date").css("display", "none");
                        $("#to_date").css("display", "none");
                        $("#view_att").css("display", "none");
                        $("#print_table_div").css("height", "auto");


                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                        $("#print_table_div").css("height", "200px");
                        $("#view_att").css("display", "block");

                        $("#print_from_date").css("display", "none");
                        $("#from_date").css("display", "block");
                        $("#print_to_date").css("display", "none");
                        $("#to_date").css("display", "block");
                        $("#print_student_name").css("display", "none");
                        $("#select").css("display", "block");
                    }
                </script>


                <script>
                    $(document).ready(function(){
                        var checkselect=1;

                        
                    $('#find_student').click(function(){
                        var family_id= $('#family_id').val();

                        if(family_id !=='')
                        {
                            $.ajax({
                                url:"fetch.php",
                                method:"POST",
                                data:{familyId:family_id, family_id_search_student: family_id},
                                dataType:"json",

                                success:function(response) {
                                    if (response.family_check==="yes"){
                                    if (response.student_names_for_view_attendance !== '')
                                    {
                                        $.ajax({
                                            url:"fetch.php",
                                            method:"POST",
                                            data:{familyId: family_id},
                                            dataType:"json",
                                            success:function(response) {
                                                // $('#existing_comments').empty();
                                                
                                                // var myTable = $("#existing_comments_table");
                                                // var thead = myTable.find("thead");
                                                // if (thead.length===0){  //if there is no thead element, add one.
                                                //     thead = $("<thead><th>Commentor</th><th>Comment</th><th>Date & Time</th></thead>").appendTo(myTable);    
                                                // }
                                                
                                                if(response == ''){
                                                    $('#existing_comments').append('No comment found.');
                                                }
                                                else
                                                {
                                                    
                                                    // $('#existing_comments').append('<tbody>');
                                                    if(Object.prototype.toString.call(response) === '[object Array]') {
                                                        $.each(response, function (index, item) {
                                                            
                                                            $('#existing_comments_table tr:last').after('<tr><td>'+item.username+'</td><td>'+item.comment+'</td><td>'+item.date_time+'</td></tr>');
                                                            // $('#existing_comments').append('<p style="margin-left: -45px;color:green"> <b style="color:black">'+item.username+'</b> '+item.comment+' &nbsp<span style="font-style:italic">'+item.date_time+'</span> </p>');
                                                        });
                                                    }
                                                    else
                                                    {
                                                        $('#existing_comments_table tr:last').after('<tr><td>'+response.username+'</td><td>'+response.comment+'</td><td>'+response.date_time+'</td></tr>');
                                                    }
                                                }
                                            },
                                            error:function(error) {
                                                console.log(error)
                                            }
                                        });
                                    }else
                                    {
                                        $('#family_id').val('');
                                        var abc = "Family ID Not Found!";
                                        not9(abc);
                                    }


                                 }
                                else
                                {
                                    $('#family_id').val('');
                                    var abc = "Family ID Not Found!";
                                    not9(abc);
                                }
                                    
                                    
                                }, 
                                error: function(error) {
                                    // console.log(error)
                                }
                            })

                        }
                        // else
                        // {
                        //     var abc="Please Enter Family ID!";
                        //     not9(abc);
                        // }
                        });
                
                    });
              
                    

                </script>


        </section>
    </section>
    <!--    data: JSON.stringify(arr),-->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer" >
        <div class="text-center">
            <p>
                Copyright © 2020 Frobel Learning | Designed and Developed by <strong><b>Biztechsols</b></strong>
            </p>
            <div class="credits">

                <!--          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>-->
            </div>
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="lib/sparkline-chart.js"></script>
<script src="lib/zabuto_calendar.js"></script>
<script type="text/javascript">

</script>
<script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                type: "text",
                label: "Special event",
                badge: "00"
            },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
</body>

</html>
