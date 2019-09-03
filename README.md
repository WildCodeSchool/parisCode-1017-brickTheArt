##How to install the project

Install composer: https://getcomposer.org/download/

Clone project and run *composer install* to install all the project depedencies.

Make sure the interactive map works : replace the variable ``YOUR_GOOGLE_API_KEY`` with an actual, working Google API key in the following templates :
+ ``src/Views/user/bricktour.html.twig``
+ ``src/Views/admin/add_marker.html.twig``

``<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&callback=initMap" type="text/javascript"></script>``

You can find more info in [Google API Documentation](https://developers.google.com/maps/documentation/?hl=fr).
