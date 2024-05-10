<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/seller_css/seller_best.css')}}">

    <script src="https://kit.fontawesome.com/6b5367918d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
</head>
<body>

    {{-- {{$totalAmounts[0]}} --}}

    <div class="products_page" id="products_page">

        <div class="products_sidebar_menu">
            <div class="menu_header">
                <i class="fa-brands fa-squarespace"></i>
                MultiStore
            </div>

            <div class="menu_options">
                <span class="menu_option "><a href="{{url('enter_store/'.$id)}}" ><i class="fa-solid fa-box"></i> Products</a></span>
                <span class="menu_option" id="go_create_product" ><a href="{{url('store_create_products/'.$id)}}"><i class="fa-solid fa-plus"></i> Create Product</a></span>
                {{-- <span class="menu_option" id="menu_option"><i class="fa-solid fa-cart-shopping"></i> Orders</span> --}}
                <span class="menu_option" id="menu_option"><a href="{{url('store_revenue/'.$id)}}"><i class="fa-solid fa-arrow-up"></i> Revenue</a></span>
                <span class="menu_option choosen" id="menu_option"><a href="{{url('best_seller/'.$id)}}"  id="chose"><i class="fa-solid fa-boxes-stacked"></i> Best Product</a></span>
                <span class="menu_option" id="menu_option"><a href="{{url('enter_store_setting/'.$id)}}"><i class="fa-solid fa-gear"></i> Setting</a></span>
                <span class="menu_option" id="menu_option"></span>
            </div>

            <div class="menu_footer">
                <img src="{{asset('assets/images/whi.png')}}" alt="" class="menu_footer_img">
                <span class="home_option" id="home_option"><a href="{{url('mystore/'.$sellerId)}}"><i class="fa-solid fa-house"></i> Home</a></span>

            </div>
        </div>
    </div>

    <div class="best_body">

        <h1 style="text-align: center; color: red;">Bar chart of Products in Laravel</h1>
        <div style="width: 900px; margin: auto;"> <!-- Corrected width styling -->
            <canvas id="chart"></canvas>
        </div>


        <script>
            // console.log({!! json_encode($labels) !!})
            var ctx = document.getElementById('chart').getContext('2d');
            var productChart = new Chart(ctx, {
                type: 'bar',  // Specifies the chart type
                data: {
                    labels: {!! json_encode($labels) !!},  // Product names as labels on the x-axis
                    datasets: {!! json_encode($datasets) !!}  // Data for the chart
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true  // Ensures the y-axis scale starts at zero
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,  // Adjusts the bar width
                            categoryPercentage: 0.5  // Adjusts the category width within the chart
                        }]
                    }
                }
            });
        </script>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- <script src="{{asset('js/seller_js/products.js')}}"></script> --}}
</body>
</html>
