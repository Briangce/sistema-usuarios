<div id="data_get"></div>


<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

function fetch_data(page){
  $.ajax({
    type: "POST",
    url:"index.php?&acao=getUsers",
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