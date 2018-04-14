<div class="container">
<h1 class="text-center">Import Management</h1>
<a class="btn btn-default" onclick="window.history.go(-1); return false;">Return Back <i class="fa fa-backward"></i></a>
<?php
if(isset($_GET['page']) && $_GET['page']=="ie")
{
    if(isset($_GET['ie']) && $_GET['ie']=="importpersonnel")
    {
        include "../resource/immigration/ImportFilePersonnel.php";
    }
    // else if(isset($_GET['iof']) && $_GET['iof']=="exportemployee")
    // {
    //     header("Location: '../Src/InputOutputFile/OutputFileEmployee.php'");
    // }
    else if(isset($_GET['ie']) && $_GET['ie']=="importstudent")
    {
        include "../resource/immigration/ImportFileStudent.php";
    }
    // else if(isset($_GET['iof']) && $_GET['iof']=="exportwine")
    // {
    //     header("Location: '../Src/InputOutputFile/OutputFileWine.php'");
    // }
    else
    {
        echo '
        <a class="btn btn-default" href="?page=ie&ie=importstudent">Import Student <i class="fa fa-upload"></i></a>
        <a class="btn btn-default" href="?page=ie&ie=importpersonnel">Import Peersonnel <i class="fa fa-upload"></i></a>
        ';
    }
}

?>
</div>
