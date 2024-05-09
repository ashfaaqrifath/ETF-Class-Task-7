<!doctype html>

<html lang="en" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Student Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="bootstrap-5.3.3-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="CSS/home.css" rel="stylesheet">
    <link href="CSS/students.css" rel="stylesheet">
    <script src="bootstrap-5.3.3-examples/assets/js/color-modes.js"></script>
</head>

<body>

    <main>
        
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">

        <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0" href="#">City University</a>

            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="students.php">Students</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
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
    <script src="bootstrap-5.3.3-examples/assets/dist/js/bootstrap.bundle.min.js"></script>

    <section id="page-header" style="background-image: url('img/b1.png');">
        <h2>Student Profile</h2>
        <p>View all student profiles or enter student ID</p>
    </section>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <button id="viewAllBtn" class="btn btn-primary" type="button">View all students</button>
            <button class="btn btn-outline-secondary" type="button">Specific student</button>
        </div>
    </div>

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="viewOne.php" method="GET">
        <center>
            <input type="search" class="form-control" placeholder="Enter student ID" aria-label="Search" name="sid"><br>
            <button class="btn btn-primary rounded-pill px-3" type="submit" style="width: 120px; height: 50px;">Search</button>
        </center>
    </form>

    <div id="studentsList"></div>

    <script>
        // view all students
        document.getElementById('viewAllBtn').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {

                        var response = xhr.responseText;
                        var studentBox = document.getElementById('studentsList');
                        studentBox.innerHTML = '<div style="border: 1px solid #ffff; margin-top: 50px; margin-left: 200px; margin-right: 200px; color: white;">' + response + '</div>';

                    } else {
                        alert("Error loading JSON data");
                    }
                }
            };
            xhr.open('GET', 'viewAll.php', true);
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


</body>

</html>