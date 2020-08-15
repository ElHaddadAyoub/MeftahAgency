(function() {
    var placesAutocomplete = places({
      appId: '4ZF6ZAGM9X',
      apiKey: '31f5362ad2d470201a9f3522817bc774',
      container: document.querySelector('#address'),
      templates: {
        value: function(suggestion) {
          return suggestion.name;
        }
      }
    }).configure({
      type: 'address'
    });
    placesAutocomplete.on('change', function resultSelected(e) {
      document.querySelector('#state').value = e.suggestion.administrative || '';
      document.querySelector('#city').value = e.suggestion.city || '';
      document.querySelector('#zip').value = e.suggestion.postcode || '';
    });
  })();
