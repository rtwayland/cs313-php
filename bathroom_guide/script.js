var gender;
var cleanRating;
var private;
var changeTable;
var petArea;
var soapRating;

function fillPage() {
    var clean = cleanRating;
    document.getElementById('bathClean').innerHTML = clean;

}

function collectInfo() {
    //Get the Gender
    if (document.getElementById('first_toggle').checked) {
        gender = "men";
    } else {
        gender = "women";
    }

    //Get Overall Cleanliness
    if (document.getElementById('first_clean').checked) {
        cleanRating = "Bad";
    } else if (document.getElementById('second_clean').checked) {
        cleanRating = "Decent";
    } else {
        cleanRating = "Good";
    }

    //Private Available?
    if (document.getElementById('first_toggle2').checked) {
        private = "Yes";
    } else {
        private = "No";
    }

    //Changing Table Available?
    if (document.getElementById('first_toggle3').checked) {
        changeTable = "Yes";
    } else {
        changeTable = "No";
    }

    //Pet area Available?
    if (document.getElementById('first_toggle4').checked) {
        petArea = "Yes";
    } else {
        petArea = "No";
    }

    //Get the soap quality
    if (document.getElementById('first_soap').checked) {
        soapRating = "Bad";
    } else if (document.getElementById('second_soap').checked) {
        soapRating = "Decent";
    } else {
        soapRating = "Good";
    }

    fillPage();
}

