<?php

$test = 'Selam Dünya';

//parameters in the Javascript
$polygonZoomLevel = 750000;  //this is the zoom level at which points switch to polygons
$layerIDList = array("TurkeySites1_shapefile_1005", "TurkeySites2_shapefile_3824"); //this is the list of Layer ids
//that contain the points on the map.  You can get layer ids from uncommenting the lines
/*for (var i = 0; i < allLayers.length; i++) {
console.log(allLayers[i].id);
}*/
//in the Javascript.  The layer id will contain its name in AGOL but it will also contain additional numbers

$translatedPage = 'http://104.131.176.181/bibmap/map.php';

//text values in the HTML (from top to bottom)
$test = 'hello world';
$pageTitle = 'Test Title';
$about = 'About';
$abouttext = 'This is a map';
$viewPageIn = 'View page in Turkish';
$enterSearchTerm = 'Enter search term';
$search = 'Search';
$clear = 'Clear';
$hide = 'Hide';
$showAll = 'Show All';
$clearSelection = 'Clear selection';
$selectDistance = 'Select distance';
$kilometers = 'kilometers';
$select = 'Select';
$by = 'by';
$circle = 'circle';
$polygon = 'polygon';
$geometrySearch = 'Geometry search';
$introduction = 'Introduction';
$introText = 'This site contains a collection of journal articles related to Turkish archaeology.  You can search by language, publication or author.
You can also search by drawing a line between two points on the map, by drawing a polygon on the map, or by searching an address and selecting a proximity.';
$searchByLanguage = 'Search by language';
$searchByPublication = 'Search by publication';
$searchByAuthor = 'Search by author';
$results = 'Results';
$sortByField = 'Sort by field';
$title = 'Title';
$author = 'Author';
$date = 'Date';

//text values in the Javascript (from top to bottom)
$show = 'Show';
$authors = 'Authors';
$publication = 'Publication';
$textStartsOnPage = 'Text starts on page ';
//the possible languages are gotten from the Language field of the table, which gives the languages in English.  To translate
//these, put the English word for the language in $languages (which will recognize it in the table) and then the Turkish
//word for the language in $languagesTranslated, which will translate the language for display.  The languages should go
//in the same order in both arrays.
$languages = array('English', 'Turkish', 'German', 'French'); //these are all possible values of the language field (in English)
$languagesTranslated = array('English', 'Turkish', 'German', 'French'); //these are the Turkish or English words for those languages
$noResultsMatched = 'No results matched your search.  Please search again.';
$clickOnEntry = 'Click on an entry to see its location on the map.';
$EnglishTitle = 'English title';
$TurkishTitle = 'Turkish title';
$OtherTitle = 'Other title';
$distance = 'Distance';
$exportCitation = 'Export citation';



?>





?>
