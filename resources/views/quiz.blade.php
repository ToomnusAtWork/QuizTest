<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Siam Global Quiz</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-whiteselection:bg-red-500 selection:text-white">
        <div class="w-full h-screen bg-white flex justify-center items-center">
            <form id="create-address-form" class="max-w-sm mx-auto align-middle text-center grid grid-cols-2 space-x-2 gap-y-5" method="POST" enctype="multipart/form-data" >
                @csrf
                <div>
                    <label for="firstname" class="block text-left mt-2 text-lg font-medium text-blue-700 dark:text-white">First Name</label>
                </div>
                <div> 
                    <input id="firstname"
                    class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required />
                </div>
                <div>
                    <label for="lastname" class="block mt-2 text-lg text-left font-medium text-blue-700 dark:text-white">Last Name</label>
                </div>
                <div>
                    <input required type="lastname" id="lastname"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Doe" required />
                </div>
                <div>   
                    <label for="province-dropdown"
                    class="block mt-2 text-lg text-left font-medium text-blue-700 dark:text-white">จังหวัด</label>
                </div>
                <div>
                    <select required id="province-dropdown"
                    class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>region</option>
                    @foreach ($regions as $data)
                        <option value="{{ $data->region_id }}">{{ $data->region }}</option>
                    @endforeach
                </select>
                </div>
                <div>
                    <label for="city-dropdown"
                    class="block mb-2 text-lg text-left font-medium text-blue-700 dark:text-white">เขต</label>
                </div>
                <div>
                    <select required id="city-dropdown"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div>  
                    <label for="district-dropdown"
                        class="block mb-2 text-lg text-left font-medium text-blue-700 dark:text-white">แขวง</label>
                </div>
                <div>
                    <select required id="district-dropdown"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div >  
                    <label for="postcode-dropdown" class="block mb-2 text-left text-lg font-medium text-blue-700 dark:text-white">รหัสไปรษณีย์</label>
                </div>
                <div>
                    <select required id="postcode-dropdown"
                        class="bg-gray-50 border border-gray-300 text-blue-700 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </select>
                </div>
                <div class="col-span-2 my-5 flex items-center justify-center gap-x-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button value="Reset!" id="reset-button">
                    <button class="flex-shrink-0 border-transparent border-4 bg-blue-500 hover:text-gray-400 text-white text-lg py-1 px-2 rounded" type="button">
                        Reset
                    </button>
                </div>
            </form>
            <div class="inset-x-1/2 inset-y-3/4 absolute text-green-600" id="response-message"></div>

        </div>
    </div>
      
</body>


<script type="text/javascript">
    $(document).ready(function() {
        $('#province-dropdown').on('change', function() {
            var regionID = $(this).val();
            console.log(regionID);
            $("#city-dropdown").html('');
            $('#postcode-dropdown').html('');
            $.ajax({
                url: "/test/fr",
                type: "POST",
                data: {
                    region_id: regionID,
                    _token: '{{ csrf_token() }}',
                },
                dataType: 'json',
                success: function(response) {
                    $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    $('#postcode-dropdown').html('<option value="">-- Select Postcode --</option>');
                    console.log(response.cities);
                    $.each(response.cities, function(key, value) {
                        $("#city-dropdown").append('<option value="' + value
                            .city_id + '">' + value.city + '</option>');
                    });
                    $('#district-dropdown').html('<option value="">-- Select City --</option>');
                },
            });
        });

        $('#city-dropdown').on('change', function() {
            var cityID = $(this).val();
            $("#district-dropdown").html('');
            $('#postcode-dropdown').html('<option value="">-- Select Postcode --</option>');
            $.ajax({
                url: "/test/fc",
                type: "POST",
                data: {
                    city_id: cityID,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#district-dropdown').html('<option value="">-- Select City --</option>');
                    $.each(res.districts, function(key, value) {
                        $("#district-dropdown").append('<option value="' + value
                            .district_code + '">' + value.district + '</option>');
                    });
                }
            });
        });

        $('#district-dropdown').on('change', function() {
            var districtCode = $(this).val();
            console.log(districtCode);
            $("#postcode-dropdown").html('');
            $.ajax({
                url: "/test/fd",
                type: "POST",
                data: {
                    district_code: districtCode,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    $.each(res.postcodes, function(key, value) {
                        $("#postcode-dropdown").append('<option value="' + value
                            .entity_id + '">' + value.postcode + '</option>');
                    });
                }
            });
        });

        $('#create-address-form').submit(function(e) {
            e.preventDefault();
            form = document.getElementById('create-address-form')
           const formData = new FormData(form);
        //    console.log(formData);
            $.ajax({
                type: 'POST',
                url: '/sumbit-test',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                enctype: 'multipart/form-data',
                success: function(response) {
                    $('#response-message').text(response.message);
                },
            });
        });
    });

</script>

</html>
