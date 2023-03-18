function myFunction() {
  // Declare variables
  var searchInput, filter, ul, li, a, i, txtValue;
  searchInput = document.getElementById('search_input');
  filter = searchInput.value.toUpperCase();
  ul = document.getElementById("records");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
      var name = li[i].getElementsByClassName("name")[0];
      var infraction = li[i].getElementsByClassName("infraction");
      var matchFound = false;

      // Check if the search term matches the student name or section
      if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
          matchFound = true;
      }

      // Check if the search term matches any of the infractions
      for (var j = 0; j < infraction.length; j++) {
          var infractionName = infraction[j].getElementsByClassName("infraction-name")[0];
          if (infractionName.innerHTML.toUpperCase().indexOf(filter) > -1) {
              matchFound = true;
              break;
          }
      }

      if (matchFound) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}