# Mapped Bibliography

This project creates a simple interface that can be applied on top of a ArcGIS webmap which contains polygons which spatially represent a publication. The necessary structure of the webmap's attribute table is described below. The interface includes built in functionality to display the map in several different languages (our project developed this for Turkish and English).

_At present, this webmap is not optimized for mobile access_

### Prerequisites

- ArcGIS Online account
- LAMP set-up with a location to host and serve project code (with LAMP, it can be unzipped directly in the `html` folder or in any subfolder). _Note that for this project, MySQL is actually not necessary since the data lives in ArcGIS Online._
- Shapefiles containing spatial bibliography (see next section to prep your data)
- git (if cloning)

#### _Prepping Your Data_
This code gets data from a webmap in ArcGIS online, which serves as the database.

1. All layers should be generated in ArcGIS for Desktop as shapefiles. AGOL can only accept shapefiles of 1000 features or less, so files with more features than that need to be split into sets of 1000.  The application is designed to accommodate as many layers as you need and users won't be able to tell.  Split the shapefile numerically by unique ID (i.e. numbers 1-1000, 1001-2000, etc.).  The layers can be either points or polygons, or a mix of the two. The attribute table should contain the following fields (All layers should have the same fields in the same order.  All fields should be text, except the unique ID field):
    - IMPORTANT: Your layers should include an integer field that starts at 1 and that is not reset when you split the layer (i.e. don't use FID because each layer will restart the FID values at 0, so there will be more than one feature with the same FID).  The best way to do this is to add a new field before you split the layer, then set it equal to FID + 1.  If you want to do both point and polygon layers together, ensure that all of them have a unique value in this field.
    - At least one field with the author's full name (if there are multiple authors, one field per author)
    - At least one field with the author's first name (if there are multiple authors, one field per author)
    - At least one field with the author's last name (if there are multiple authors, one field per author)
    - English title
    - Turkish title
    - Other language title
    - Publication title
    - Language the article is in
    - Page on which the article starts
    - Page on which the article ends
    - Volume of the publication
    - Number of the publication volume (if not applicable, leave blank)
    - Date of publication
    - IMPORTANT: The language, publication, and author fields should be all be different from each other.
2. Compress all files that make up the shape file (eg .shp, .dbf, etc...) for each layer into a zip file. Make sure each layer is a separate zip file. If you ever need to re upload the layers, even if the layers have the same name in ArcGIS, they will be given a new layer name (specifically the number at the end of the layer name) in ArcGIS Online.  You can view the full layer name by looking at the console.  
3. In your ArcGIS Online account, create a new WebMap and add a layer "from a File", then upload the zipped shapefiles.  Do NOT select the default, which is to generalize features for web display; select the option to keep original features.   _For the map to be viewed by the public, all layers and the map itself must be made public using the sharing settings in AGOL._
4. When selecting "a drawing style", choose "Location (Single Symbol)".

## Getting Started

1. Upload zipped Github repo to the location where you would like to serve the files OR `cd` to folder where you would like to serve the map and `git clone https://github.com/upenndigitalscholarship/bibmap.git`.
2. Structure of Project:
    - `index.php` - map interface
    - `en-dist.php` - English dictionary of text appearing on interface (THIS FILE IS MANDATORY, loaded in index.php if no language given)
    - `tr-dist.php` - Turkish dictionary of text appearing on interface (additional language files could be added, see below)
    - `config-dist.php` - general site configurations
    - `style.css` - styles
4. *Filling out config.php* Begin by renaming config-dist.php to config.php. Next, to link to a map, the webmap ID, which can be found at the end of the URL in AGOL, needs to be referenced as the portalItem when a new webmap is created. All layers that are set as visible in AGOL will appear on the map as soon as you link to the webmap as a portal item, but the individual layers must also be input using the variable $layerIDList described above (for the searching to work).  When you first add the layers to the map, you will get errors and the map won't display properly, but you can get the layer IDs out of the developer's console in your browser.  Once you enter the layer IDs, the map should display properly, but you'll get errors until you put in the fields, which will appear in the developer's browser console once you enter the layer IDs.  
5. Indices of the relevant fields should be input into config.php.  Indices of the fields can be found by setting the value of $showFieldsInConsole to true, which will print the field names and indices to the console.  The indices of the fields to be used in the code don't necessarily correspond to the indices of the fields as they appear in ArcGIS Online, because the fields FID and the shape field (if the file has one) are hidden from the attribute table in ArcGIS Online but will impact the index.  Use the index printed in the console and input that into the relevant field index variable in config.php.
6. There are two additional variables in the config file.  $polygonZoomLevel is the zoom level at which the points change to polygons (the sites are polygons, but will be represented as points when the map is zoomed out past a certain point).  The points change to polygons by changing the layer's renderer between two different symbols.  If all features are points, ignore this value.
7. *Filling out en.php* Begin by renaming en-dist.php to en.php. Then, change any text in that file to your desired wording.
8. *Filling out additional language files, such as tr.php* tr-dist.php is an example of an additional language file. If you do not want additional files, then do nothing. To add additional language files, copy en.php and rename to _xLANGUAGE_.php, translate all text fields, and then put *file name only* WITHOUT .php file extension in config file.

_Please Note! There is a limited amount of editing, such as adding features or modifying existing features, that can be done in AGOL.  Other changes such as adding fields needs to be done in ArcGIS for Desktop. You will then need to re upload the layers, which will mean they will have new IDs that need to be changed in the code._  

## Built With

- [ArcGIS API for Javascript version 4.4](https://developers.arcgis.com/javascript/latest/guide/)
- [Bootstrap 4.0.0](https://getbootstrap.com/)

## Authors

* **Rachel Cohen** - *Project Developer*
* **Sasha Renninger** - *Project Supervisor*

## Acknowledgments

The ArcGIS API for Javascript 4.4 API Reference website was essential for the creation of this site:
https://developers.arcgis.com/javascript/latest/api-reference/index.html

The code for drawing a spatial query was taken from the ArcGIS Javascript for API Sandbox:
https://developers.arcgis.com/javascript/latest/sample-code/sandbox/index.html?sample=draw-spatial-query

The code for watching for changes in extent was also taken from the ArcGIS Javascript for API Sandbox:
https://developers.arcgis.com/javascript/latest/sample-code/sandbox/index.html?sample=watch-for-changes

The citation formats come from Purdue's Online Writing Lab:
https://owl.english.purdue.edu/owl/

This bootstrap code that was used to create the accordion search bar:
https://getbootstrap.com/docs/4.0/components/collapse/

The code for copying to clipboard can be found here:
https://jsfiddle.net/jdhenckel/km7prgv4/3/
