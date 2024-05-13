<!doctype html>

<html lang="en" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Student Profile</title>
    <link rel="shortcut icon" href="assets/Img/mylogo3.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/dist/css/home.css" rel="stylesheet">
    <script src="assets/dist/js/color-modes.js"></script>

    <style>
        #page-header{
            width: 100%;
            height: 40vh;
            background-size: cover;
            display: flex;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            padding: 14px;
        }

        #page-header p{
            color: #ffffff;
            font-size: 25px;
        }
        .form-control {
            width: 400px;
            height: 50px;
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <main>
        
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="#">Sri Lanka Institute of Information Technology</a>

            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.html">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.html">Programs</a>
                </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="students.php">Students</a>
                </li>

                <li class="nav-item">
                <a class="nav-link" href="index.html">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.html">Contact</a>
                </li>

            </ul>

            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <button class="btn btn-primary">Login</button>&nbsp;&nbsp;
                <button class="btn btn-secondary">Sign Up</button>
            </div>

            </div>
        </div>
        </nav>
        
    </main>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

    <section id="page-header" style="background-image: url('assets/Img/b12.jpg'); width: 100%; height: 400px">
        <h1 style="color: white; font-size: 80px;">Student Profile</h1>
        <p>View all student profiles or enter student ID</p>
    </section>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <button id="viewAllBtn" class="btn btn-primary" type="button">View all students</button>
            <a class="btn btn-outline-secondary" href="#searchStd">Specific student</a>
        </div>
    </div>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="viewOne.php" method="GET">
        <center>
            <input type="search" class="form-control" placeholder="Enter student ID" aria-label="Search" name="sid"><br>
            <button id="searchStd" class="btn btn-primary rounded-pill px-3" type="submit" style="width: 120px; height: 50px;">Search</button>
        </center>
    </form>

    <div id="studentsList"></div>
    <br><br>

    <script>
        // viewAllBtn clicked execute this function
        document.getElementById('viewAllBtn').addEventListener('click', function() {
            // new XMLHttpRequest object (ajax)
            var xhr = new XMLHttpRequest();

            // handle state changes of request
            xhr.onreadystatechange = function() {
                // If the request done
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    // If response status OK
                    if (xhr.status === 200) {
                        // Get response txt
                        var response = xhr.responseText;
                        var studentBox = document.getElementById('studentsList');
                        // Update HTML to display response json data
                        studentBox.innerHTML = '<div style="border: 1px solid #ffff; margin-top: 50px; margin-left: 200px; margin-right: 200px; color: white;">' + response + '</div>';
                    } else {
                        alert("Error loading JSON data");
                    }
                }
            };

            // asynchronous request
            xhr.open('GET', 'viewAll.php', true);
            // Send request to server
            xhr.send();
        });


        // view specific student
        document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        var studentID = document.querySelector('input[type="search"]').value;
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    var studentBox = document.getElementById('studentsList');
                    studentBox.innerHTML = '<div style="border: 1px solid #fff; margin-top: 50px; margin-left: 200px; margin-right: 200px; color: white;">' + response + '</div>';
                } else {
                    alert("Error loading student data");
                }
            }
        };
        xhr.open('GET', 'viewOne.php?sid=' + studentID, true);
        xhr.send();
    });
    </script>


    <hr>
    <center><footer class="container" style="color: #949494;">
        <p class="float-end"><a href="#" style="text-decoration: none; font-size: 25px;">▲</a></p>
        <p>Copyright © 2024 Ashfaaq Rifath - SA23089754</p>
        <p>ETF Class Task 07 - Bootstrap, jQuery & AJAX</p>
    </footer></center>


</body>

</html>