
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div>
                <a href="/admin/category" class="btn btn-success">Category</a>
                </div>
                <div>
                <a href="#" class="btn btn-success">Product</a>
                </div>
            </div>
            <div class="col-9">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Time ONE </th>
                        <th scope="col">Time Two</th>
                        <th scope="col"><a href="/admin/category/create" class="btn btn-success">Create</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $val=\application\models\Order::table();
                    foreach ($val as $v){
                       ?>
                        <tr>
                            <th scope="row"><?php echo $v["id"]; ?></th>
                            <td><?php echo $v["name"]; ?></td>
                            <td><?php echo $v["create_time"]; ?></td>
                            <td><?php echo $v["update_time"]; ?></td>
                            <td><a href="/admin/category/update/<?= $v["id"];?>" class="btn btn-success">Edit</a></td>
                            <td><a href="" class="btn btn-danger" onclick="deleteInfoTableColom(<?= $v["id"] ?>)">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script>
    function deleteInfoTableColom(deletID) {
        let del = confirm("Delete?");
        if (del === true) {
            console.log(deletID);
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                dataType: 'json',
                data: {a: deletID},
                success: function (data) {
                    if (data===true) {
                        window.location = "index.php";
                    }
                }
            })
        }
    }
</script>