/**
 * Created by mirko on 11.08.16.
 */

var countryId;
var regionId;
var cityId;

function makeCountry () {
    countryId = makeId();

    var countryBuild = '<div class="composite-country-wrapper mdl-shadow--2dp" id="' + countryId +'" style="padding: 10px">' +
        '<div class="mdl-textfield mdl-js-textfield">' +
        '<input class="mdl-textfield__input" type="text" name="country-name' + countryId + '">' +
        '<label class="mdl-textfield__label" for="country-name' + countryId + '">Country Name</label>' +
        '</div>' +
        '</div>';

    $('#country-composite-form').prepend(countryBuild);

}

function makeRegion () {
    regionId = makeId();

    var regionBuild = '<div class="composite-region-wrapper" id="' + regionId + '" style="padding: 10px 10px 10px 25px">' +
        '<div class="mdl-textfield mdl-js-textfield">' +
        '<input class="mdl-textfield__input" type="text" name="region-name' + regionId + '">' +
        '<label class="mdl-textfield__label" for="region-name' + regionId + '">Region Name</label>' +
        '</div>' +
        '</div>';

    $('#country-composite-form .composite-country-wrapper#' + countryId).append(regionBuild);

}

function makeSity () {
    cityId = makeId();

    var cityBuild = '<div class="composite-region-wrapper" id="'+ cityId +'" style="padding: 10px 10px 10px 40px">' +
        '<div class="mdl-textfield mdl-js-textfield">' +
        '<input class="mdl-textfield__input" type="text" name="city-name' + cityId + '">' +
        '<label class="mdl-textfield__label" for="city-name' + cityId + '">City Name</label>' +
        '</div>' +
        '</div>';

    $('#country-composite-form .composite-region-wrapper#' + regionId).append(cityBuild);
}

function generateCompositeInput (type) {
    switch (type) {
        case 'country':
            makeCountry();
            break;
        case 'region':
            makeRegion();
            break;
        case 'city':
            makeSity();
            break;
        default:
            break;
    }
    componentHandler.upgradeDom();
}