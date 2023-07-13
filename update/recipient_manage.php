<?php 
include ('src/conection.php'); 
if(isset($_GET['id'])){

}
?>
<div class="container-fluid">
	<form action="" id="manage-donor">
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" class="form-control" name="name"  value="<?php echo ($name) ? $name :'' ?>" required>
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
	
	$('#manage-donor').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_donor',
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