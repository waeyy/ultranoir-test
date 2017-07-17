$(document).ready(function() {
    $.get("factory/script-get.php", "false", getData, "text");
});

function getData(data) {

  var array = JSON.parse(data);
  var elem = null;

  array.forEach(function(row) {
    elem = JSON.parse(row);

    if (elem.fcid == 3) {
      $("#soustitre-input").val(elem.soustitre);
    }

    $("#table-data tr:last").after('  <tr><td>' + elem.titre + '</td><td>' + elem.accroche + '</td><td>' + elem.description + '</td><td>' + elem.online + '</td><td>' + elem.priorite + '</td><td>' + elem.soustitre + '</td><td>' + elem.dateStart + '</td><td>' + elem.dateEnd + '</td><td>' + elem.fcid + '</td><td>' + elem.id_fiche_index + '</td><td>' + elem.id_langue + '</td><td>' + elem.id_rubrique + '</td></tr>');
  });
}

$("#updateFiche").click(function() {

  var soustitre = $("#soustitre-input").val();
  var data = { "soustitre": soustitre};

  $.ajax({
      url: "factory/script-put",
      type: 'PUT',
      data: JSON.stringify(data),
      contentType: "application/json",
      dataType: "html",
      success: function(res, status) {
        alert("success");
      }
    });

});

/**
 * Show list of data
 */
$("#showList").click(function() {
  $("#dataList").css("display", "block");
});

/**
 * Hide list of data
 */
$("#hideList").click(function() {
  $("#dataList").css("display", "none");
});
