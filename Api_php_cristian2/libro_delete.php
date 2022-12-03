<!-- HEADER -->

<?php include_once './View/base/header.php';?>


<div class="container mt-5 ">

<h3 class="display-4 text-center text-danger">ELIMINAR LIBRO POR ID</h3>

<form  action="./router.php?controller=libro&action=delete" method="post">

<STRONG>ID LIBRO A ELIMINAR</STRONG>

<input class="form-control my-3" type="number" name="id" placeholder="id autor" value="<?php echo $_GET['id'] ?>">

<input class="form-control btn btn-danger" type="submit" value="delete">

</form>


</div>



<!-- FOOTER -->

<?php include_once './View/base/footer.php';?>