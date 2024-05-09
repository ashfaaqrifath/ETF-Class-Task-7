<?php
    $students = json_decode(file_get_contents('students.json'));
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
        <?php foreach($students as $student){ ?>
            <tr>
                <td><?php echo $student->sid; ?></td>
                <td><?php echo $student->name; ?></td>
                <td><?php echo $student->age; ?></td>
                <td><?php echo $student->address; ?></td>
                <td><?php echo $student->cgpa; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

