<?php
$db = loadDatabase();

// $maverikId = $_GET["location"];
//$bathId = 1;
$bathId = $_GET['id'];
if (!isset($bathId)) {
  $bathId = 4;
}
$stmt = $db->prepare('SELECT gender, AVG(cleanliness) cleanliness, AVG(private_bath) private_bath, AVG(changing_table) changing_table, AVG(pet_area) pet_area, AVG(soap_quality) soap_quality FROM rating WHERE bathroom_id=:id GROUP BY gender');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
$women_rating = $ratings[0];
$men_rating = $ratings[1];

// Women Rating System
if (isset($women_rating)) {
    if ($women_rating['cleanliness'] >= 4) {
        $women_rating['cleanliness'] = 'Good';
    } elseif ($women_rating['cleanliness'] <= 2) {
        $women_rating['cleanliness'] = 'Bad';
    } else {
        $women_rating['cleanliness'] = 'Decent';
    }

    if ($women_rating['private_bath'] >= 0.5) {
        $women_rating['private_bath'] = 'Yes';
    } else {
        $women_rating['private_bath'] = 'No';
    }

    if ($women_rating['changing_table'] >= 0.5) {
        $women_rating['changing_table'] = 'Yes';
    } else {
        $women_rating['changing_table'] = 'No';
    }

    if ($women_rating['pet_area'] >= 0.5) {
        $women_rating['pet_area'] = 'Yes';
    } else {
        $women_rating['pet_area'] = 'No';
    }

    if ($women_rating['soap_quality'] >= 4) {
        $women_rating['soap_quality'] = 'Good';
    } elseif ($women_rating['soap_quality'] <= 2) {
        $women_rating['soap_quality'] = 'Bad';
    } else {
        $women_rating['soap_quality'] = 'Decent';
    }
}
// Men Rating System
if (isset($men_rating)) {
    if ($men_rating['cleanliness'] >= 4) {
        $men_rating['cleanliness'] = 'Good';
    } elseif ($men_rating['cleanliness'] <= 2) {
        $men_rating['cleanliness'] = 'Bad';
    } else {
        $men_rating['cleanliness'] = 'Decent';
    }

    if ($men_rating['private_bath'] >= 0.5) {
        $men_rating['private_bath'] = 'Yes';
    } else {
        $men_rating['private_bath'] = 'No';
    }

    if ($men_rating['changing_table'] >= 0.5) {
        $men_rating['changing_table'] = 'Yes';
    } else {
        $men_rating['changing_table'] = 'No';
    }

    if ($men_rating['pet_area'] >= 0.5) {
        $men_rating['pet_area'] = 'Yes';
    } else {
        $men_rating['pet_area'] = 'No';
    }

    if ($men_rating['soap_quality'] >= 4) {
        $men_rating['soap_quality'] = 'Good';
    } elseif ($men_rating['soap_quality'] <= 2) {
        $men_rating['soap_quality'] = 'Bad';
    } else {
        $men_rating['soap_quality'] = 'Decent';
    }
}

$stmt = $db->prepare('SELECT * FROM bathroom WHERE id=:id');
$stmt->bindValue(':id', $bathId, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$bathroom = $rows[0];

 ?>
