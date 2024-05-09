<?php
    // Load student data from JSON file
    $students = json_decode(file_get_contents('students.json'), true);

    // Check if student ID is provided in the query parameter
    if(isset($_GET['sid'])) {
        $studentID = $_GET['sid'];

        // Find the student with the matching ID
        $matchingStudent = array_filter($students, function($student) use ($studentID) {
            return $student['sid'] === $studentID;
        });

        // Display student details if found
        if(!empty($matchingStudent)) {
            $student = reset($matchingStudent); // Get the first (and only) element of the filtered array
?>
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                th, td {
                    border: 1px solid #fff;
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background-color: #0b5ed7;
                    color: white;
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>SID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>GPA</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td><?php echo $student['sid']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['age']; ?></td>
                        <td><?php echo $student['address']; ?></td>
                        <td><?php echo $student['cgpa']; ?></td>
                    </tr>
                </tbody>
            </table>
<?php
        } else {
            echo "Student not found.";
        }
    }
?>
