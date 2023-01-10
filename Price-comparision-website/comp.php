<!DOCTYPE html>
<html>

<head>
  <title>Create a Search Bar using HTML and CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./search.css" />
</head>

<body>
  <header class="site-header">
    <!-- Navbar items -->
    <div id="navlist">
      <a href="login.html">Login</a>
      <a href="about.html">About</a>
      <a href="contact-us.html">Contact Us</a>
      <a href="index.html">Home</a>

      <!-- search bar right align -->
  <form action="comp.php" method="GET">
        <div class="search">
          <input type="text" placeholder=" Search Products" name="search" required >
          <button>
            <i class="fa fa-search" style="font-size: 18px"> </i>
          </button>

        </div>
    </div>

    <!-- logo with tag -->
    <div class="content">
      <h1 style="color: green; padding-top: 0px; font-size: 30px">
        CompareKaro.com
      </h1>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

      <div class="card-body">
        <div class="row" style = "margin-left: 310px;">
          <div class="col-md-7">
            <div class="col-md-12">
              <div class="card mt-4">
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>product_name</th>
                        <th>Price</th>
                        <th>PLATFORM</th>
                        <th>AMAZON-URL</th>
                        <th>FILPKART-URL</th>
                      </tr>



                    </thead>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>     
  </form>
       <!-- Load icon library -->
       <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  </header>
</body>

</html>
<?php
// $var = $db->query("SELECT * FROM results_1 WHERE CONCAT(product_name) LIKE '%$filtervalues%' ");
$db = new PDO('mysql:host=localhost;dbname=database123;', 'root', '');



if(isset($_GET['search']))
{
    $filtervalues = $_GET['search'];
    // $var = $db->query("SELECT * FROM results_1 WHERE CONCAT(product_name) LIKE '%$filtervalues%'");
    $var = $db->query("SELECT product_name, Price , url, PLATFORM 
                       from results_1 WHERE CONCAT(product_name)
                       LIKE  '%$filtervalues%'
                                UNION
                        SELECT product_name, Price ,product_url, PLATFORM from filp WHERE CONCAT(product_name) LIKE  '%$filtervalues%'");
          

    // echo "<pre>";
    while ($row = $var->fetch(PDO::FETCH_ASSOC)) {
   
        echo $row['product_name'], "<br>";
        echo $row['Price'], "<br>";
        echo $row['url'], "<br>";
        echo $row['PLATFORM'], "<br>";
        // echo $row['Price'], "<br>";
        echo "<br>", "<br>";

        
    }
    
}

?>
<!-- SELECT r.product_name,r.Price,r.Url,r.PLATFORM,f.Price,f.PLATFORM
FROM results_1.r Inner join filp.f
ON results_1.r LIKE '%$filtervalues%' + filp.f LIKE '%$filtervalues%'
WHERE r.product_name = f.product_name  -->

<!-- http://localhost/pbl/project/search.html -->

<!-- show databases;
Use database123;
select * from filp;
select * from results_1

select * 
                       FROM results_1 as r Inner join filp as f 
                       WHERE r.product_name LIKE '%Redmi 10 %'and  f.product_name LIKE '%Redmi 10 %';
                       
select  r.product_name, r.Price, r.Url, r.PLATFORM, f.Price, f.PLATFORM
		FROM results_1 as r Inner join filp as f 
		WHERE r.product_name LIKE '%Redmi%'and f.product_name LIKE '%Redmi%';
                       
                       
SELECT * FROM results_1 WHERE CONCAT(product_name) LIKE '%Redmi note 11 pro %';

select * from  results_1 as r Inner join filp as f  Where r.P_ID = f.P_ID; -->