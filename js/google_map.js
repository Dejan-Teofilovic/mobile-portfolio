function initMap() {
        var myLatLng = {lat: 14.4812799, lng: 121.0456698};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'My Home'
        });
      }