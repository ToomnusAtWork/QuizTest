<?php
include('condb.php');

$fname = $_POST['fname'];
$lname =  $_POST['lname'];
$regionID =  $_POST['province'];
$cityID = $_POST['city'];
$districtID = $_POST['district'];
$postcodeID = $_POST['postcode'];

$provincequery = $conn->query(query: "SELECT * FROM `eadesign_romregion` WHERE `region_id` = $regionID");
$provincerow = $provincequery->fetchArray();
$province = $provincerow['region'];

$cityquery = $conn->query(query: "SELECT * FROM `eadesign_romcity` WHERE `city_id` = $cityID");
$cityrow = $cityquery->fetchArray();
$city = $cityrow['city'];

$districtquery = $conn->query(query: "SELECT * FROM `eadesign_romdistrict` WHERE `district_code` = $districtID");
$districtrow = $districtquery->fetchArray();
$district = $districtrow['district'];

$postcodequery = $conn->query(query: "SELECT * FROM `eadesign_rompostcode` WHERE `entity_id` = $postcodeID");
$postcoderow = $postcodequery->fetchArray();
$postcode = $postcoderow['postcode'];

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Global Quiz - Success!</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-gray-100 h-screen w-full">
      <div class="flex flex-col items-center justify-center bg-white p-6 md:mx-auto h-full ">
        <svg viewBox="0 0 24 24" class=" text-green-600 w-16 h-16 mx-auto my-6">
            <path fill="currentColor"
                d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>
        <div class="text-center block">
            <h3 class="md:text-3xl text-base text-gray-900 font-semibold text-center">Form Has Been Sent!</h3>
            <div class="flex flex-col text-left p-4 mt-2 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400">
                <div class="flex jusity betweem">
                    <p class="font-bold">First Name: &nbsp;</p>
                    <p> <?php echo $fname; ?> </p>
                </div>
                <div class="flex jusity betweem">
                    <p class="font-bold">Last Name: &nbsp;</p>
                    <p> <?php echo $lname; ?> </p>
                </div>
                <div class="flex jusity betweem">
                    <p class="font-bold">District: &nbsp;</p>
                    <p> <?php echo $district; ?> </p>
                </div>
                <div class="flex jusity betweem">
                    <p class="font-bold">City: &nbsp;</p>
                    <p> <?php echo $city; ?> </p>
                </div>
                <div class="flex jusity betweem">
                    <p class="font-bold">Province: &nbsp;</p>
                    <p> <?php echo $province; ?> </p>
                </div>
                <div class="flex jusity betweem">
                    <p class="font-bold">Postcode: &nbsp;</p>
                    <p> <?php echo $postcode; ?> </p>
                </div>
            </div>
            <p class="text-gray-600 my-2">Thank you for checking into this repo.</p>
            <p class="text-gray-300">Made By Peranut Toomnus </p>
            <p class="text-cyan-500"> Have a great day! </p>
        </div>
    </div>
  </div>
</body>
