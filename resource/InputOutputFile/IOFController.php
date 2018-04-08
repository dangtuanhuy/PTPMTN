<div style="width:100%">
<h3 class="w3_inner_tittle two text-center">Import Management</h3>
<a class="btn btn-primary" onclick="window.history.go(-1); return false;">Return Back <i class="fa fa-backward"></i></a>
<?php
if(isset($_GET['page']) && $_GET['page']=="iof")
{
    if(isset($_GET['iof']) && $_GET['iof']=="importemployee")
    {
        include "../Src/InputOutputFile/InputFileEmployee.php";
    }
    // else if(isset($_GET['iof']) && $_GET['iof']=="exportemployee")
    // {
    //     header("Location: '../Src/InputOutputFile/OutputFileEmployee.php'");
    // }
    else if(isset($_GET['iof']) && $_GET['iof']=="importwine")
    {
        include "../Src/InputOutputFile/InputFileWine.php";
    }
    // else if(isset($_GET['iof']) && $_GET['iof']=="exportwine")
    // {
    //     header("Location: '../Src/InputOutputFile/OutputFileWine.php'");
    // }
    else
    {
        echo '
        <a class="btn btn-primary" href="?page=iof&iof=importwine">Import Wine <i class="fa fa-cloud-upload"></i></a>
        <a class="btn btn-primary" href="?page=iof&iof=importemployee">Import Employee <i class="fa fa-cloud-upload"></i></a>
        ';
    }
}

?>
</div>
