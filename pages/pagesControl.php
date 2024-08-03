<?php
include_once "./version.php";
?>
<div id="data_get"></div>


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})


function fetch_data(page){
  $.ajax({
    type: "POST",
    url:"index.php",
    data: {
      acao: "getCampanhas",
      page: page,
    },
    beforeSend: function () {
    },
    success: function (resp) {
      $("#data_get").html(resp)
    },
    error: function (resp) {
      console.log(resp)
    },
  })
}

fetch_data()

</script>
<script src="/assets/js/custom.js?v=<?=$version?>"></script>