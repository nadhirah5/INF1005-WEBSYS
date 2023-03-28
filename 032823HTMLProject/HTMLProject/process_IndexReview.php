<?php

fetchReview();

        function fetchReview() {
            global $errorMsg, $success, $result;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
// Prepare the statement:
                $stmt = $conn->prepare("SELECT * FROM orderReview");
// Bind & execute the query statement:
                $stmt->execute();
                $result = $stmt->get_result();
            }
        }

        function fetchUserinfo($customerID) {
            global $reviewfname, $reviewlname, $errorMsg, $success;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
// Prepare the statement:
                $stmt = $conn->prepare("SELECT fname,lname FROM customers WHERE customerID=?");
// Bind & execute the query statement:
                $stmt->bind_param("s", $customerID);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
                    $row = $result->fetch_assoc();
                    $reviewfname = $row["fname"];
                    $reviewlname = $row["lname"];
                    $stmt->close();
                }
                
            }
        }
        
        while ($row = $result->fetch_assoc()) {
            if ($row["orderReviewApproval"] == 1) {
                            fetchUserinfo($row["customerID"]);
                            echo "<div class='swiper review-slider'>" .
                            "<div class='swiper-wrapper'>" .
                            "<div class='swiper-slide slide'>" .
                            "<i class='fas fa-quote-right'></i>" .
                            "<div class='user'>" .
                            "<img src='images/pet.jpg' alt='profile picture'>" .
                            "<div class='user-info'>" .
                            "<h3>" . $reviewfname . " " . $reviewlname . "</h3>" .
                            "<div class='stars'>";
                            while ($starcount < $row["orderReviewRating"]) {
                                echo "<i class='fas fa-star'></i>";
                                $starcount += 1;
                            }
                            $starcount = 0;

                            echo "</div>" .
                            "</div>" .
                            "</div>" .
                            "<p>" . $row["orderReviewContent"] . "</p>" .
                            "</div>" .
                            "</div>" .
                            "<div class='swiper-pagination'></div>" .
                            "</div>";
                        }
                       
                        
        }
        
        
        

?>
