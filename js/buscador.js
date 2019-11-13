$( document ).ready(function() {
    $( "#submitButton" ).click(function() {
      getSearch();
    });
    $("#showInfo").click(function(){
      showData();
    });
});

/*Search Data Json*/
function getSearch(){
  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "getSearch",
      City: $("#selectCiudad").val(),
      Type: $("#selectTipo").val(),
    },
    dataType: "html",
    beforeSend: function() {
      $("#initialResults").html("Cargando...");
    },
    success: function(data) {
      $("#initialResults").html(data);
    },
    error: function(oXHR, sStatus, sError) {
      $("#initialResults").html(sError);
    }
  });
}

/*Search Data Json*/
function showData(){
  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "showData",
    },
    dataType: "html",
    beforeSend: function() {
      $("#showResults").html("Cargando...");
    },
    success: function(data) {
      $("#showResults").html(data);
    },
    error: function(oXHR, sStatus, sError) {
      $("#showResults").html(sError);
    }
  });
}

/*Insert Data Json*/
function SaveButton(id){
  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "insertData",
      Address: $("#save"+id).attr("data-address"),
      City: $("#save"+id).attr("data-city"),
      Phone: $("#save"+id).attr("data-phone"),
      Postal: $("#save"+id).attr("data-postal"),
      Type: $("#save"+id).attr("data-type"),
      Price: $("#save"+id).attr("data-price"),
    },
    dataType: "html",
    beforeSend: function() {
      $("#message").html("Cargando...");
    },
    success: function(data) {
      $("#message").html(data);
    },
    error: function(oXHR, sStatus, sError) {
      $("#message").html(sError);
    }
  });
}

/*Download Data Json*/
function getData(){
  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "getGeneralData",
    },
    dataType: "html",
    beforeSend: function() {
      $("#initialResults").html("Cargando...");
    },
    success: function(data) {
      $("#initialResults").html(data);
    },
    error: function(oXHR, sStatus, sError) {
      $("#initialResults").html(sError);
    }
  });

  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "getCities",
    },
    dataType: "html",
    success: function(data) {
      $("#selectCiudad").append(data);
    }
  });

  $.ajax({
    url: "data.php",
    type: "GET",
    cache: false,
    data: {
      Action: "getTypes",
    },
    dataType: "html",
    success: function(data) {
      $("#selectTipo").append(data);
    }
  });
}

getData();
