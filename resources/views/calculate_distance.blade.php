<!-- calculate_distance.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Distance</title>
</head>
<body>
    <h1>Calculate Distance</h1>
    <form action="/calculate-distance/store" method="POST">
        @csrf
        <label for="name">Distance Name:</label>
        <input type="text" id="name" name="name" required>
        <!-- Add your logic to draw points here -->
        <!-- You can use HTML canvas or any JS library like Fabric.js -->
        <!-- Upon finishing drawing, collect points data and submit the form -->
        <input type="submit" value="Calculate Distance">
    </form>
</body>
</html>
