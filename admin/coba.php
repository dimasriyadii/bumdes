<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="col-12">
        <div class="card">
            <div class="row row-0">
                <div class="col">
                    <div class="card-body">
                        <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>

                        <?php
                        $query = $koneksi->query("SELECT * FROM profil WHERE id_profil = '1'");
                        foreach ($query as $data):
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">

                            <textarea class="ckeditor" id="ckeditor2" name="visimisi" rows="7"
                                placeholder="Content.."><?= $data['isiprofil'] ?></textarea>

                            <br>
                            <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                            <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                onclick="self.history.back()">
                        </form>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>