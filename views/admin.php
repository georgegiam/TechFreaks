<?php 
    // connecting with the database
    $conn = new mysqli('localhost', 'root', '', 'diet');           

    // query the username, password, name and email from the databalse
    $query = "SELECT `username`, `password`, `name`, `email` FROM `users`";
        
    // setting the result from the query
    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <!-- for responsivness in mobile view -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
        
    <!-- custom css -->
    <link rel="stylesheet" href="../static/css/general.css">
    <link rel="stylesheet" href="../static/css/admin.css">
    
    <!-- fav icon -->
    <link rel="icon" href="../static/images/logo.jpg" type="image/gif" sizes="16x16">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin Panel</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <!-- logo image and title -->
        <a class="navbar-brand" href="../index.html">
            <img src="../static/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            Tech Freaks
        </a>
        <!-- menu button for mobile view -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- navbar items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- unorder list start -->
            <ul class="navbar-nav mr-auto">
                <!-- listing type navbar item (Our Team) -->
                <li class="nav-item">
                    <a class="nav-link" href="our_team.html">Our Team</a>
                </li>
                <!-- listing type navbar item (FAQ) -->
                <li class="nav-item">
                    <a class="nav-link" href="faq.html">FAQ</a>
                </li>
                <!-- listing type navbar item (Blog) -->
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                </li>
                <!-- listing type navbar item (Contact Us) -->
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <!-- listing type navbar item (Calculate BMI) -->
                <li class="nav-item">
                    <a class="nav-link" href="bmi.html">Calculate BMI</a>
                </li>
            </ul> <!-- ul end -->
        </div> <!-- navbar items end -->
    </nav> <!-- nav end -->

    <!-- light or dark theme selector -->
    <div id="theme_div">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">Select Theme:</label>
        </div>
        <!-- radio button for light theme -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1"><i class="far fa-sun"></i></label>
        </div>
        <!-- radio button for dark theme -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"
                checked="checked">
            <label class="form-check-label" for="inlineRadio2"><i class="far fa-moon"></i></label>
        </div>
    </div>

    <!-- container fluid -->
    <div class=".container-fluid text-center">
        <!-- container -->
        <div class="container">
            <!-- header -->
            <div class="py-5 text-center" id="header">
                <h2>Admin Panel</h2>
                <p class="lead">Here, in the administrator page you can see all the users who are subscribed in the newslatter list. You can do that by clicking the following button.</p>
                <button class="btn btn-primary" id="users_button" type="submit">Get all users</button>
            </div>
            
            <!-- table with data -->
            <table class="table">
                <!-- table head -->
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username </th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    </tr>
                </thead> <!-- table head end -->
                <!-- table body -->
                <tbody>
                    <?php 
                        // checking if there are data in the database
                        if ($result->num_rows > 0) {                      
                            // setting key variable 
                            $key = 1;
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                // getting the name
                                $name = $row["name"];
                                // getting the username
                                $username = $row["username"];
                                // getting the email
                                $email = $row["email"];
                                // getting the password
                                $passsword = $row["password"];    
                                // filling the table's rows
                                echo "
                                    <tr>
                                        <th scope='row'>$key</th>
                                        <td>$name</td>
                                        <td>$username</td>
                                        <td>$email</td>
                                        <td>$passsword</td>
                                    </tr> 
                                ";                                
                                // increasing the key
                                $key++;
                            }                            
                        } 
                        // if no users in the database
                        else{                            
                            echo "
                                <div class='alert alert-danger' role='alert'>
                                    No users found in the database.
                                </div>
                            ";
                        }                                  
                    ?>                      
                </tbody> <!-- table body end -->
            </table> <!-- table end -->
        </div> <!-- container end -->                  
    </div> <!-- container fluid end -->   

    <!-- jQuery script -->
    <script>
        // getting the DOM ready
        $(document).ready(function () {            
            // action when inlineRadio1 radio button is clicked (light theme)
            $("#inlineRadio1").click(function () {
                // set body background color white
                $("body").css({ "background-color": "white" });
                // set text color black
                $(".row, #header, #theme_div").css({ "color": "black" });               
            });
            // action when inlineRadio2 radio button is clicked (dark theme)
            $("#inlineRadio2").click(function () {
                // set body background color black
                $("body").css({ "background-color": "#444444" });
                // set text color white
                $(".row, #header, #theme_div").css({ "color": "white" });
            });           
        
            // hide the table by default
            $("table").hide();                  
            // track the click buuton fro show and hide
            var clicked = 1;
            // number of table's rows
            var rowCount = $('table tr').length; 

            // is no rows in the table (no users) hide the button
            if (rowCount == 1) {
                $("#users_button").hide();
            } 
            // else show the button
            else {
                $("#users_button").show();
            }
            
            // action when the buttin is clicked 
            $("#users_button").click(function() {
                // checks if the table is shown or not
                if (clicked == 1) {
                    // show the table
                    $("table").show();
                    // change buutton text
                    $("#users_button").html('Hide users');
                    clicked = 0;
                }
                else {
                    // hide the table
                    $("table").hide();
                    // change buutton text
                    $("#users_button").html('Get all users');
                    clicked = 1;
                }
            });            
        });
    </script> <!-- script end -->   

    <!-- Bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
</body>

</html>