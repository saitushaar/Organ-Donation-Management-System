<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM organdonors where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage-donor">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div class="form-group">
			<label for="" class="control-label">Full Name</label>
			<input type="text" class="form-control" name="name"  value="<?php echo isset($name) ? $name :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows = "2" required="" name="address" class="form-control"><?php echo isset($address) ? $address :'' ?></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" class="form-control" name="email"  value="<?php echo isset($email) ? $email :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact #</label>
			<input type="text" class="form-control" name="contact"  value="<?php echo isset($contact) ? $contact :'' ?>" required>
		</div>
        <div class="form-group">
			<label for="" class="control-label">Relative Name</label>
			<input type="email" class="form-control" name="relative"  value="<?php echo isset($relative) ? $relative :'' ?>" required>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Relation</label>
			<input type="text" class="form-control" name="relation"  value="<?php echo isset($relation) ? $relation :'' ?>" required>
		</div>
        <div class="form-group">
			<label for="" class="control-label">Medical History</label>
			<input type="text" class="form-control" name="medical_history"  value="<?php echo isset($medical_history) ? $medical_history :'' ?>" required>
		</div>
        <div class="form-group">
	        <label for="" class="control-label">Organ</label>
			<select name="organ" id="" class="custom-select select2" required>
				<option <?php echo isset($organ) && $organ == 'Eyes' ? ' selected' : '' ?>>Eyes</option>
				<option <?php echo isset($organ) && $organ == 'Heart' ? ' selected' : '' ?>>Heart</option>
				<option <?php echo isset($organ) && $organ == 'Lungs' ? ' selected' : '' ?>>Lungs</option>
				<option <?php echo isset($organ) && $organ == 'Kidney' ? ' selected' : '' ?>>Kidney</option>
				<option <?php echo isset($organ) && $organ == 'Liver' ? ' selected' : '' ?>>Liver</option>
				<option <?php echo isset($organ) && $organ == 'Pancreas' ? ' selected' : '' ?>>Pancreas</option>
				<option <?php echo isset($organ) && $organ == 'Tissue' ? ' selected' : '' ?>>Tissue</option>
				<option <?php echo isset($organ) && $organ == 'All' ? ' selected' : '' ?>>All</option>
			</select>
		</div>
		<div class="form-group">
	        <label for="" class="control-label">Blood Group</label>
			<select name="blood_group" id="" class="custom-select select2" required>
				<option <?php echo isset($blood_group) && $blood_group == 'A+' ? ' selected' : '' ?>>A+</option>
				<option <?php echo isset($blood_group) && $blood_group == 'B+' ? ' selected' : '' ?>>B+</option>
				<option <?php echo isset($blood_group) && $blood_group == 'O+' ? ' selected' : '' ?>>O+</option>
				<option <?php echo isset($blood_group) && $blood_group == 'AB+' ? ' selected' : '' ?>>AB+</option>
				<option <?php echo isset($blood_group) && $blood_group == 'A-' ? ' selected' : '' ?>>A-</option>
				<option <?php echo isset($blood_group) && $blood_group == 'B-' ? ' selected' : '' ?>>B-</option>
				<option <?php echo isset($blood_group) && $blood_group == 'O-' ? ' selected' : '' ?>>O-</option>
				<option <?php echo isset($blood_group) && $blood_group == 'AB-' ? ' selected' : '' ?>>AB-</option>
			</select>
		</div>
	</form>
</div>
<script>
	
	$('#manage-organdonor').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_organdonor',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully saved.",'success')
						setTimeout(function(){
							location.reload()
						},1000)
				}
			}
		})
	})
</script>