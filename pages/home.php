<br>
<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
</ol>
<h1>Top mind</h1>

<table class="table table-bordered responsive nowrap" id="example" width="100%">
	<thead> 
		<tr>
			<th width="3%">No</th>
			<th width="6%">Time</th>
			<th width="6%">Flips</th>
			<th width="15%">User</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th width="3%">No</th>
			<th width="6%">Time</th>
			<th width="6%">Flips</th>
			<th width="15%">User</th>
		</tr>
	</tfoot>
</table>


<script type="text/javascript">
$(document).ready(function() {
	

    //Reading
    var dataTable = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: "pages_exe/top_exe_dt.php",
            type: "POST"
        }
    });

});


</script>