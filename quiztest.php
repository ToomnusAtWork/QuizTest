<?php

require('condb.php');
$query = $conn->query("SELECT * FROM `eadesign_romregion` ORDER BY `entity_id` ASC") or die("Failed to fetch province!");
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Global Quiz</title>
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-whiteselection:bg-red-500 selection:text-white">
        <div class="w-full h-screen bg-white flex justify-center items-center">
            <form id="create-address" method="POST" action="submitInfo.php" class="max-w-sm mx-auto align-middle text-center grid grid-cols-2 space-x-2 gap-y-5">
                <div>
                    <label for="firstname" class="block text-left mt-2 text-lg font-medium text-blue-700 dark:text-blue-800">First Name</label>
                </div>
                <div> 
                    <input id="firstname" name="fname" type="text"
                    class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required >
                </div>
                <div>
                    <label for="lastname" class="block mt-2 text-lg text-left font-medium text-blue-700 dark:text-blue-800">Last Name</label>
                </div>
                <div>
                    <input id="lastname" name="lname" type="text"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required >
                </div>
                <div>   
                    <label for="province-dropdown"
                    class="block mt-2 text-lg text-left font-medium text-blue-700 dark:text-blue-800">จังหวัด</label>
                </div>
                <div>
                    <select required id="province-dropdown" name="province"
                    class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>จังหวัด</option>
                    <?php while($province = $query->fetchArray()): ?>
                        <option value="<?=$province['region_id']?>"><?=$province['region']?></option>
                    <?php endwhile; ?>
                </select>
                </div>
                <div>
                    <label for="city-dropdown"
                    class="block mb-2 text-lg text-left font-medium text-blue-700 dark:text-blue-800">เขต</label>
                </div>
                <div>
                    <select required id="city-dropdown" name="city"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div>  
                    <label for="district-dropdown"
                        class="block mb-2 text-lg text-left font-medium text-blue-700 dark:text-blue-800">แขวง</label>
                </div>
                <div>
                    <select required id="district-dropdown" name="district"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div >  
                    <label for="postcode-dropdown" class="block mb-2 text-left text-lg font-medium text-blue-700 dark:text-blue-800">รหัสไปรษณีย์</label>
                </div>
                <div>
                    <select required id="postcode-dropdown" name="postcode"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div class="col-span-2 my-5 flex items-center justify-center gap-x-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                    <a href="#" id="reset-button" class="flex-shrink-0 border-transparent border-4 bg-blue-500 hover:text-gray-400 text-white text-lg py-1 px-2 rounded">
                        Reset
                    </a>
                </div>
            </form>
            <div class="inset-x-1/2 inset-y-3/4 absolute text-green-600" id="response-message"></div>
        </div>
    </div>
      
</body>


<script type="text/javascript">
    var firstnameObject = $('#firstname');
    var lastnameObject = $('#lastname');
    var regionObject = $('#province-dropdown');
    var cityObject = $('#city-dropdown');
    var districtObject = $('#district-dropdown');
    var postcodeObject = $('#postcode-dropdown');
    var resetObject = $('#reset-button');

    $(document).ready(function() {
        regionObject.on('change', function() {
            var regionID = $(this).val();

            cityObject.html('<option value="">อำเภอ</option>');
            districtObject.html('<option value="">ตำบล</option>');
            postcodeObject.html('<option value="">รหัสไปรณีษย์</option>');

            $.ajax({
                type: 'GET',
                url: 'getDistrict.php',
                dataType: 'json',
                data: { 
                    region_id: regionID
                },
                success: function(res){
                    console.log(res);
                    $.each(res, function(index, item){
                    cityObject.append(
                        $('<option></option>').val(item.city_id).html(item.city)
                    );
                });
                }
            });
        });

        // ----- City -----
        $('#city-dropdown').on('change', function() {
            var cityID = $(this).val();

            districtObject.html('<option value="">ตำบล</option>');
            postcodeObject.html('<option value="">รหัสไปรณีษย์</option>');

            $.ajax({
                url: 'getSubdistrict.php',
                type: "GET",
                dataType: 'json',
                data: {
                    city_id: cityID,
                },
                success: function(res) {
                    $.each(res, function(key, value) {
                        $("#district-dropdown").append('<option value="' + value
                            .district_code + '">' + value.district + '</option>');
                    });
                }
            });
        });

        // ----- District -----
        $('#district-dropdown').on('change', function() {
            var districtCode = $(this).val();

            postcodeObject.html('<option value="">รหัสไปรณีษย์</option>');
            
            $.ajax({
                type: "GET",
                url: "getPostcode.php",
                dataType: 'json',
                data: {
                    district_code: districtCode,
                },
                success: function(res) {
                    $.each(res, function(key, value) {
                        $("#postcode-dropdown").append('<option value="' + value
                            .entity_id + '">' + value.postcode + '</option>');
                    });
                }
            });
        });

        // Reset Button
        $('#reset-button').on('click', function(e) {
            e.preventDefault();
            $("#create-address").get(0).reset();
        });

        // Request form to show data
        // $('#create-address').submit(function(e) {
        //     e.preventDefault();
        //     var form = $(this);
        //     var url = form.attr('action');
        //     var method = form.attr('method');
        //     var data = $('#create-address').serialize();
            
        //     $.ajax({
        //         type: method,
        //         url: url,
        //         // dataType: "json",
        //         data: {
        //            data: data
        //         },
        //         success: function(response) {
        //             alert(response);
        //             console.log('Submission was successful sent.');
        //             window.location.href = url + '?' + data;
        //         },
        //         error: function(xhr, status, error){
        //             alert('An error occurred.');
        //             console.log(xhr);
        //             console.log('An error occurred.');
        //         },
        //     });
        // });

    });
    </script>
</html>