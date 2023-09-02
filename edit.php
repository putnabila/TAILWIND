<?php 
include_once('./models/Student.php');

$students = student::show($_GET['id']);

if(isset($_POST['submit'])) {
    $response = Student::update([
        'id'=> $_POST['id'],
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);
    header("location: index.php");
}
?>

<?php include('./layouts/top.php');?>
<?php include('./layouts/header.php');?>

<!--content-->
<div class="bg-slate-300 m-3 p-3 rounded-lg">
                <form action="" method="POST">FORM INPUT
                    <!-- nama -->
                    <div class="mb-3 m-2">
                        <label for="">Nama</label>
                        <input type="text" name="name" id="name" placeholder="Masukkan nama anda" class="rounded-lg block" >
                    </div>
                    <!-- nis -->
                    <div class="mb-3 m-2">
                        <label for="" >NIS</label>
                        <input type="number" name="nis" id="nis" placeholder="Masukkan NIS anda" class="rounded-lg block">
                    </div>
                    <!-- button -->
                    <div class="grid gap-2">
                        <button type="submit" name="submit" class="bg-blue-500 rounded-lg hover:bg-blue-200 p-1 text-white">SUBMIT</button>
                    </div>
                    </div>
                </form>
        <?php include('./layouts/footer.php');?>
        <?php include('./layouts/bottom.php');?>

