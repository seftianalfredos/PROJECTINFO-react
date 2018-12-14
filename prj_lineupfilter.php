<div class="col_7">
	<table>
		<tr>
			<td class="right" >Group Project</td>
			<td class="center" >
				<select id="filtergrp_type" name="filtergrp_type" class="inputsel">
					<option value="-" selected disabled>Group Project</option>
					<?php
					include 'config.php';
					$stmt2  = $DBcon->prepare("SELECT *FROM table_group ORDER BY GroupName ASC ");
					$stmt2->execute();
					while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option value="<?php echo $row['grp_id']; ?>"><?php echo $row['GroupName']; ?></option>
						<?php 
					} 
					?>  
				</select>
			</td>
		</tr>
		<tr>
			<td class="right" >Product</td>
			<td class="center" >
				<select id="filterprd_type" name="filterprd_type" class="inputsel">
					<option value="-" selected disabled>Product</option>
					<?php
					include 'config.php';
					$stmt2  = $DBcon->prepare("SELECT *FROM table_product ORDER BY ProductName ASC ");
					$stmt2->execute();
					while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option value="<?php echo $row['prd_id']; ?>"><?php echo $row['ProductName']; ?></option>
						<?php 
					} 
					?>  
				</select>
			</td>
		</tr>
		<tr>
			<td class="right" >Status Project</td>
			<td class="center" >
				<select id="filterstsp_type" name="filterstsp_type" class="inputsel">
					<option value="-" selected disabled>Status</option>
					<?php
					include 'config.php';
					$stmt2  = $DBcon->prepare("SELECT *FROM table_status ORDER BY StatusName ASC ");
					$stmt2->execute();
					while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						?>
						<option value="<?php echo $row['sta_id']; ?>"><?php echo $row['StatusName']; ?></option>
						<?php 
					} 
					?>  
				</select>
			</td>
		</tr>
	</table>
</div>