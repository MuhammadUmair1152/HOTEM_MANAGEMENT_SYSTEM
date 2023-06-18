<?php
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $arrival = $_POST['arrival'];
    $departure = $_POST['departure'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $roomPref = $_POST['room_pref'];

    // Prepare and execute the SQL query to insert the data into the "reservation" table
    $stmt = $conn->prepare("INSERT INTO reservation (arrival, departure, first_name, last_name, email, phone, adults, children, room_preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiss", $arrival, $departure, $firstName, $lastName, $email, $phone, $adults, $children, $roomPref);
    $stmt->execute();

    // Check if the data is inserted successfully
    if ($stmt->affected_rows > 0) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: Failed to submit data.";
    }

    // Close the statement
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1">
    <title>Hotel Reservation Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="reservation.css">
</head>

<body>
    <form class="hotel-reservation-form" method="post" action="reservation.php">
        <h1><i class="far fa-calendar-alt"></i>Hotel Reservation Form</h1>
        <div class="fields">
            <!-- Input Elements -->
            <div class="wrapper">
                <div>
                    <label for="arrival">Arrival</label>
                    <div class="field">
                        <input id="arrival" type="date" name="arrival" required>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for="departure">Departure</label>
                    <div class="field">
                        <input id="departure" type="date" name="departure" required>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div>
                    <label for="first_name">First Name</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input id="first_name" type="text" name="first_name" placeholder="First Name" required>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for="last_name">Last Name</label>
                    <div class="field">
                        <i class="fas fa-user"></i>
                        <input id="last_name" type="text" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
            <label for="email">Email</label>
            <div class="field">
                <i class="fas fa-envelope"></i>
                <input id="email" type="email" name="email" placeholder="Your Email" required>
            </div>
            <label for="phone">Phone</label>
            <div class="field">
                <i class="fas fa-phone"></i>
                <input id="phone" type="tel" name="phone" placeholder="Your Phone Number" required>
            </div>
            <div class="wrapper">
                <div>
                    <label for="adults">Adults</label>
                    <div class="field">
                        <select id="adults" name="adults" required>
                            <option disabled selected value="">--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="gap"></div>
                <div>
                    <label for="children">Children</label>
                    <div class="field">
                        <select id="children" name="children" required>
                            <option disabled selected value="">--</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
            </div>
            <label for="room_pref">Room Preference</label>
            <div class="field">
                <select id="room_pref" name="room_pref" required>
                    <option disabled selected value="">--</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>
           
            <input type="submit" name="submit" value="Reserve"></a>
        </div>
    </form>
</body>

</html>