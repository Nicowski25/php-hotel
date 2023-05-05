<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (!empty($_GET['parkingplace']) && !empty($_GET['minrating'])) {
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'] && $hotel['vote'];
    });
}
if (!empty($_GET['parkingplace'])) {
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'] == $_GET['parkingplace'];
    });
} elseif (!empty($_GET['minrating'])) {
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['vote'] >= $_GET['minrating'];
    });
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>

<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" colspan="6" class="text-center fs-1">HOTELS</th>
            </tr>
            <tr>
                <th scope="col" colspan="6">
                    <form method="get" class="d-flex">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="parkingplace" value="1">
                            <label class="form-check-label">
                            <p>Have parking spot</p>
                        </div>
                        <select name="minrating" class="form-select">
                            <option value="">Select rating</option>
                            <option value="1">1 star</option>
                            <option value="2">2 stars</option>
                            <option value="3">3 stars</option>
                            <option value="4">4 stars</option>
                            <option value="5">5 stars</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </th>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to Center</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel) : ?>
                <tr>
                    <th scope="row"><?= $hotel[''] ?></th>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>

                    <?php if ($hotel['parking'] == 1) : ?>
                        <td>True</td>
                    <?php else : ?>
                        <td>False</td>
                    <?php endif; ?>

                    <td>@<?= $hotel['vote'] ?></td>
                    <td>@<?= $hotel['distance_to_center'] . ' km' ?></td>
                </tr>
            <? endforeach; ?>
        </tbody>

</body>

</html>