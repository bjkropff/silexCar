<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return '<!DOCTYPE html>
        <html>
            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
                <title>Find a car</title>
            </head>
            <body>
                <div class="container">
                    <h1>Find a car!</h1>
                    <form action="/cars">
                        <div class="form-group">
                            <label for="price">Enter Maximum Price:</label>
                            <input id="price" type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="miles">Enter Maximum Mileage:</label>
                            <input id = "miles" type="number" name="miles" class="form-control">
                        </div>
                        <button type="submit" class="btn-success">Submit</button>
                    </form>
                </div>
            </body>
        </html>';
    });

    $app->get("/cars", function() {
        $porsche_img = "http://hdwallpapersd.com/wp-content/uploads/2014/09/awesome-porsche-911-turbo-picture.jpg";
        $ford_img = "http://www.thedieselstop.com/forums/attachments/f122/9386d1293229464-ford-f450-22-5-rims-dsc00114.jpg";
        $lexus_img = "http://static.usnews.rankingsandreviews.com/images/Auto/izmo/367633/2015_lexus_rx_350_sideview.jpg";
        $mercedes_img = "http://www.blogcdn.com/www.autoblog.com/media/2011/08/02-2012-mercedes-benz-cls550-review.jpg";
        $porsche = new Car("2014 Porsche 911", 114991, 7864, $porsche_img);
        $ford = new Car("2011 Ford F450", 55995, 14241, $ford_img);
        $lexus = new Car("2013 Lexus RX 350", 44700, 20000, $lexus_img);
        $mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, $mercedes_img);

        $cars = array($porsche, $ford, $lexus, $mercedes);

        //blank array to store matching cars
        $cars_matching_search = array();

        foreach ($cars as $car) {
             if ($car->getPrice() < $_GET["price"] && $car->getMiles() < $_GET["miles"]) {
                array_push($cars_matching_search, $car);
            }
        }

        $output = '<!DOCTYPE html>
        <html>
            <head>
                <title>Your Car Dealership\'s Homepage</title>
            </head>
            <body>
                <h1>Your Car Dealership</h1>
                <ul>';
                    foreach ($cars_matching_search as $car) {
                        $output .= "<li>" . $car->getMake_model() . "</li>";
                        $output .= "<ul>";
                            $output .= "<li> $" . $car->getPrice() . "</li>";
                            $output .= "<li> Miles: " . $car->getMiles() . "</li>";
                            $output .= "<img src=" . $car->getImg() . ">";
                        $output .= "</ul>";
                    }
                    if (empty($cars_matching_search)) {
                        $output .= "<h3>No cars match these criteria.</h3>";
                    }
            $output .= '</ul>
            </body>
        </html>';

        return $output;

    });

    return $app;

 ?>
