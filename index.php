<?php 
include_once('./models/Student.php');

$students = student::index();

if(isset($_POST['submit'])) {
    $response = Student::create([
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

   setcookie('message', $response, time() + 10);
    header("location: index.php");
}

if(isset($_POST['delete'])){
    $response = Student::delete($_POST['id']);

    setcookie('message', $response, time() + 10);

    header("location: index.php");
}
?>

<?php include('./layouts/top.php');?>
<?php include('./layouts//header.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS RANK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
        <!-- header -->
        <div class="bg-blue-300 text-center p-1 text-xl text-black">DATA RANKS</div>
        <?php include('./layouts/alert.php');?>
        <!-- main -->
        <div class="flex">
            <!-- sidebar -->
            <div class="basis-1/4 p-2">
                <div class="bg-slate-300 m-3 p-3 rounded-xl">
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
                    
                </form>
            </div>
            </div>
            <!-- content -->
            <div class="basis-3/4 p-2">
                <div class="bg-slate-200 p-3 m-3 rounded-lg">DATA RANKS
                    <div class="">
                        <table class="w-full">
                            <thead class="text-center border border-slate-300 bg-slate-300 text-black">
                                <tr>
                                    <th class="px-6 py-3">No.</th>
                                    <th class="px-6 py-3">Nama</th>
                                    <th class="px-6 py-3">NIS</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="text-center border border-slate-400 ">
                                <?php foreach($students as $key => $student) : ?>
                                <tr class="border border-slate-500">
                                    <td class="px-6 py-3"><?= $key + 1 ?></td>
                                    <td class="px-6 py-3"><?= $student['name'] ?></td>
                                    <td class="px-6 py-3"><?= $student['nis'] ?></td>
                                    <td>
                                        <!-- detail -->
                                   <a href="detail.php?id=<?=$student['id'] ?>" class="text-white hover:bg-blue-300 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-blue-400">detail</a>
                                        <!-- edit -->
                                   <a href="edit.php?id=<?=$student['id'] ?>" class="text-white hover:bg-green-600 pt-2 pb-2 pl-3 pr-3 rounded-xl  bg-green-400">edit</a>
                                   <!-- hapus -->
                                        <form action="" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                            <button class="bg-red-500 hover:bg-red-800 pt-2 pb-2 pl-3 pr-3 rounded-xl  text-white" name="delete" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="bg-slate-300 text-center">copyright nabilahc_</div>
    </div>
</body>
</html>