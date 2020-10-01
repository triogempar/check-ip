<?php
function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("https://extreme-ip-lookup.com/json/");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Check IP</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
	

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<?php
	include("menu.html");
	?>
    </nav>

   <br>
   

    <!-- Page Content -->
	  <div class="row justify-content-center">
      <form action="oh.php" method="GET" class="form-inline my-1 my-lg-3">
      <input class="form-control mr-sm-2" type="text" name="ip" placeholder="Search" value="<?php echo $profile["query"] ?>">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Track</button>
      </form>
	  </div>
	  
   <br>
	
    <div class="container">
 
             <div class="rubber-container result" style="display: block">
                <div class="central-column">
                    <table class="table result-table no-script">
                        <tr>
                            <th class="ip_header">IP Address</th>
                            <td><b class="ip"><?php echo $profile["query"] ?></b></td>
                        </tr>     
                        <tr>
                            <th class="ip_header">ISP</th>
                            <td><b class="ip"><?php echo $profile["isp"] ?></b></td>
                        </tr> 						
                        <tr>
                            <th>Daerah</th>
                            <td><span class="region_name"><?php echo $profile["city"] ?></span></td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td><span class="city"><?php echo $profile["region"] ?></span></td>
                        </tr>
                        <tr>
                            <th>Negara</th>
                            <td class="country_name"><?php echo $profile["country"] ?></td>
                        </tr>
                         <tr>
                            <th>Benua</th>
                            <td class="continent_name"><?php echo $profile["continent"] ?></td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td class="lat"><?php echo $profile["lat"] ?></td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td class="lng"><?php echo $profile["lon"] ?></td>
                        </tr>
                    </table>
                </div>
            </div>



 

    </div>
    <!-- /.container -->

    <!-- Footer -->
	<?php
	include("kaki.html");
	?>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
