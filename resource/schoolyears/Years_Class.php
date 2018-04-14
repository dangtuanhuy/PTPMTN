<script type="text/javascript">
	function deleteConfirm()
	{
		if(confirm("Are you sure delete!")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
<!-- Lệnh Delete -->

<?php 
if(isset($_GET["ma"]))
{
	$SchoolYears_Class = $_GET["ma"];
	mysqli_query($conn,"DELETE FROM `SchoolYears_Class` WHERE SchoolYearsId = $SchoolYears_Class AND ClassId = $SchoolYears_Class");
}
?>
<?php
if (isset($_POST['btnDelete'])&&isset($_POST['checkbox'])) 
{
	for ($i = 0; $i < count($_POST['checkbox']); $i++) 
	{
		$SchoolYears_Class1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `SchoolYears_Class` WHERE SchoolYearsId = $SchoolYears_Class1 AND ClassId = $SchoolYears_Class1");
	}
}
?>
<div class="container">

<form name="frmXoa" method="post" action="">
    <h1 class="text-center">Manage School Years - Class</h1>
    <p>
        <a  class="btn btn-default" href="?page=AddYears_Class">
            <i class="fa fa-plus"></i>
        </a>
    </p>
    <table class="table-striped table-responsive table-bordered" id="myTable">
        <thead>
            <tr>
                <th ><strong>Choice</strong></th>
                <th  ><strong>No</strong></th>
                <th class="col-md-2"><strong>School Years</strong></th>
                <th class="col-md-6"><strong>Class</strong></th>
                <th ><strong>Delete</strong></th>
                <th ><strong>Update</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $num=1;
            $result = mysqli_query($conn,"SELECT  SchoolYears, ClassName FROM `SchoolYears_Class` 
            JOIN Class ON Class.ClassId = SchoolYears_Class.ClassId
            JOIN SchoolYears ON SchoolYears.SchoolYearsId = SchoolYears_Class.SchoolYearsId");
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                ?>
                <tr>
                    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="form-control" value="<?php echo $row["SchoolYearsId"] ?>"></td>
                    <td><?php echo $num ?></td>
                    <td><?php echo $row["SchoolYears"] ?></td>
                    <td><?php echo $row["ClassName"] ?></td>
                 
                    <td align='center'>
                        <a class="btn btn-default"   href="?page=Years_Class&ma=<?php echo $row['SchoolYearsId']; ?>&ma=<?php echo $row['ClassId']; ?>" onclick="return deleteConfirm()">
                            <i class="fa fa-remove"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-default" href="?page=UpdateYears_Class&ma=<?php
                            echo $row['SchoolYearsId'];?>"><i class="fa fa-share"></i></a>
                        </td>
                    </tr>
                    <?php
                    $num++;
                }
                ?>
            </tbody>
        </table>
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
                <input type="submit" value="Delete Choice" name="btnDelete" id="btnDelete" onclick='return deleteConfirm()' class="btn btn-info"/>

            </div>
        </div>
    </form>
</div>