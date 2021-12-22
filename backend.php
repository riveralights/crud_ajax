<?php
$conn = mysqli_connect('localhost', 'root', 'melodyjkt48', 'crud');

extract($_POST);

if(isset($_POST['readrecord'])) {
    $data = '<table id="exampleTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th class="text-center">Edit Action</th>
                        <th class="text-center">Delete Action</th>
                    </tr>
                </thead>
                <tbody>';
    $query = "SELECT * FROM employees";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        $number = 1;
        while($row = mysqli_fetch_array($result)) {
            $data .= '
            <tr>
                <td class="text-center">'.$number.'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone_number'].'</td>
                <td class="text-center">
                    <button onclick="getUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
                </td>
                <td class="text-center">
                    <button onclick="deleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
        $number++;
        }
    }
    $data .= '</tbody></table>';
    echo $data;
}

if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phoneNumber'])) {
    $query = "INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone_number`) VALUES (NULL, '$firstName', '$lastName', '$email', '$phoneNumber')";
    mysqli_query($conn, $query);
}

if(isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $query = "DELETE FROM `employees` WHERE `employees`.`id` = $id";
    mysqli_query($conn, $query);
}

if(isset($_POST['id']) && isset($_POST['id']) != "") {
    $user_id = $_POST['id'];
    $query = "SELECT * FROM `employees` WHERE `id` = '$user_id'";
    
    if(!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }

    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    } else {
        $response['status'] = 200;
        $response['message'] = "Sorry, data not found";
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

if(isset($_POST['userIdUpdate'])) {
    $userIdUpdate = $_POST['userIdUpdate'];
    $firstNameUpdate = $_POST['firstNameUpdate'];
    $lastNameUpdate = $_POST['lastNameUpdate'];
    $emailUpdate = $_POST['emailUpdate'];
    $phoneNumberUpdate = $_POST['phoneNumberUpdate'];

    $query = "UPDATE `employees` SET `first_name` = '$firstNameUpdate', `last_name` = '$lastNameUpdate', `email` = '$emailUpdate', `phone_number` = '$phoneNumberUpdate' WHERE `employees`.`id` = $userIdUpdate";
    mysqli_query($conn, $query);
}