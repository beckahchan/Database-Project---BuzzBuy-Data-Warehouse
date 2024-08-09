<?php
error_reporting(E_ERROR | E_PARSE); // Show only errors
ini_set('display_errors', 0); // Do not display errors on the web page

session_start();
require 'includes/database.php';
require 'includes/auth.php';
$conn = getDB();
$cookieuserID = $_COOKIE['UserID'];
require 'includes/updateauditlog.php';
?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="report5State.js"></script>
</head>

<?php require 'includes/header.php'; ?>

<body>
    <div id = "main_container">
        <div class = "center_content">
            <div class = "cneter_left">
                <div class = "features">
                    <div class = "profile_section p-5">
                        <h1>Report 5</h1>
                        <label>Select a State:</label>
                            <?php
                            $sql = "SELECT DISTINCT StateName FROM city ORDER BY StateName";
                            $result = mysqli_query($conn, $sql);
                            ?>
                 
                            <select id = "city" onchange = "SelectState()">
                            <option value = ""> - Select - </option>

                                <?php
                                while($rows = $result -> fetch_assoc()) {
                                        $StateName = $rows['StateName'];
                                        echo "<option value = '$StateName'>$StateName</option>";
                                }
                                ?>
                            </select>
             
                            <table class = "table">
                                <thead>
                                    <tr>
                                    <th class = "heading">Year</th>
                                    <th class = "heading">Store Number</th>
                                    <th class = "heading">City Name</th>
                                    <th class = "heading">Total Revenue</th>
                                </thead>
                                <tbody id = "ans">
                                     
                                </tbody>
                            </table>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php require 'includes/footer.php'; ?>