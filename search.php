<html>
<body>


<?php
require_once 'settings.php' ;
include('template/header.php');
if(isset($_GET['keywords'])) {
      $keywords = $db->escape_string($_GET['keywords']);
	  $query = $db->query("
	      SELECT  sn,fname,mname,lname,pn,context,date,file,image
	      FROM sample
          WHERE   sn LIKE '%{$keywords}%'
		  or fname LIKE '%{$keywords}%'
	      or mname LIKE '%{$keywords}%'
		  or lname LIKE '%{$keywords}%'
		  or pn LIKE '%{$keywords}%'
		  or context LIKE '%{$keywords}%'
		  or date LIKE '%{$keywords}%'
		  or file LIKE '%{$keywords}%'
		  or image LIKE '%{$keywords}%'
	  ");
}
     ?>     
   <div class="result-count">
        found <?php echo $query->num_rows; ?> results.
     </div>			
<?php
if($query->num_rows) {
     while($row = $query->fetch_object()) {
?>
   <table width='100%' border='1' bgcolor=#CCCCCC>
			<tr align='center'>
				<th>Serial Number:</th>
				<th>First Name:</th>
				<th>Mothers Name:</th>
				<th>Last Name:</th>
				<th>Phone Number:</th>
				<th>Context:</th>
				<th>Date:</th>
				<th>image:</th>
				<th>Document:</th>				

			</tr>	
	<br> <br>

      <div class="result">
	  <tr align='center'>
				<td><?php echo $row->sn; ?></td>
				<td><?php echo $row->fname; ?></td>
				<td><?php echo $row->mname; ?></td>
				<td><?php echo $row->lname; ?></td>
				<td><?php echo $row->pn; ?></td>
				<td><?php echo $row->context; ?></td>
				<td><?php echo $row->date; ?></td>
				<td><a href='../uploads/' target='_blank'><?php echo $row->image; ?></a></td>
		        <td><a href='../uploads/' target='_blank'><?php echo $row->file; ?></a></td>
				
			
				
				

			</tr>

		  
      </div>
  <?php

	 }
}
?>	 
</body>
</html>