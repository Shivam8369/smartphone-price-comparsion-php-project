<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "database123";

$conn = new mysqli($server_name, $username, $password, $database_name);
//now check the connection
if ($conn->connect_error) {
    die("Connection Failed:" . mysqli_connect_error());

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create a Search Bar using HTML and CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.2/examples/headers/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./search.css" />
</head>

<body>
    <header class="site-header">
        <div class="table-responsive">
            <div id="navlist">
                <a href="login.html">Login</a>
                <a href="about.html">About</a>
                <a href="contact-us.html">Contact Us</a>
                <a href="index.html">Home</a>

                <!-- search bar right align -->
                <form action="search2.php" method="GET">
                    <div class="search">
                        <input type="text" placeholder=" Search Products" name="search" required>
                        <button>
                            <i class="fa fa-search" style="font-size: 18px"> </i>
                        </button>

                    </div>
            </div>

            <div class="content">
                <h1 style="color: green; padding-top: 0px; font-size: 30px">
                    CompareKaro.com
                </h1>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
            </div>

            <!-- implementation  -->

            <div class="container">
                <?php
                if (isset($_GET['search'])) {
                    $filtervalues = $_GET['search'];
                    $result = $conn->query("SELECT product_name, Price , PLATFORM, product_url
                               from amazon WHERE product_name
                               LIKE  '%$filtervalues%'
                                        UNION
                                SELECT product_name, Price , PLATFORM, product_url from filpkart WHERE product_name LIKE  '%$filtervalues%'");

                    if ($result->num_rows > 0) {

                        echo '<table class="table table-striped table-hover table-bordered border-primary table-lg">';
                        echo "<thread>";
                        echo "<tr>";
                        echo "<th>Product_name</th>";
                        echo "<th>Price</th>";
                        echo "<th>Platform</th>";
                        echo "<th>Visit-Here</th>";
                        echo "</tr>";
                        echo "</thread>";
                        echo "<tbody>";
                        // no of results 
                        $res = $result->num_rows;
                        echo "$res" . " results";
                        while ($row = $result->fetch_assoc()) {

                            echo "<tr class = 'table-active'>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . $row["Price"] . "</td>";
                            echo "<td>" . $row["PLATFORM"] . "</td>";
                         echo "<td>" . "<a href='" . $row["product_url"] . "'>Visit </a>" . "</td>";
                            echo "</tr>";
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo "<h1> No record found</h1>";
                    }
                } else {
                    echo "please enter what you want to search ";
                }
                ?>
            </div>






            <!-- echo "<td>" .'<a "row clickable" href='.$row["product_url"].'">' .$visit .'</a>'."</td>";
             echo "<td>" .'<a "row clickable" href="$row["product_url"]"> Visit </a>'."</td>";
             echo "<td>" . $row["product_url"] . "</td>"; -->