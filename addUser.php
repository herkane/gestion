<?php 
    session_start();
    if (!$_SESSION['started']) {
        header('Location: 404.php');
}?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter employé</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./addUser.css">
</head>

<body>
    <?php include 'sidebar.php' ?>
    <div class="addUser">
        <form action="./addUserToDB.php" method="POST" enctype='multipart/form-data'>
            <h1>Ajouter un nouveau employé</h1>
            <div class="input">
                <div class="form1">
                    <div>
                        <label for="nom">Nom employé :</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>
                    <div>
                        <label for="prenom">Prenom employé :</label>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>
                    <div>
                        <label for="CIN">CIN employé :</label>
                        <input type="text" name="CIN" id="cin" required>
                    </div>
                    <div>
                        <label for="date_naissance">Date de naissance :</label>
                        <input type="date" name="date_naissance" id="date_naissance" required>
                    </div>
                    <div>
                        <label for="fonction">Fonction employé :</label>
                        <select name="fonction" id="fonction">
                            <option value="admin">Administrateur</option>
                            <option value="fonctionnaire">Fonctionnaire</option>
                        </select>
                    </div>
                    <div>
                        <label for="salaire">Salaire employé :</label>
                        <input type="number" name="salaire" id="salaire" required>
                    </div>
                </div>
                <div class="form2">
                    <div class="add-image">
                        <img src="./add-image.png" alt="" id="imagePreview">
                        <input type="file" name="image" id="image" value="Ajouter image" accept="image/gif, image/jpeg, image/png" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="add" id="output">Ajouter</button>
            <?php if (isset($_SESSION['add_status'])) {
                if ($_SESSION['add_status']) {
                    echo '<h2>Employé bien ajouté</h2>';
                } else echo '<h2>Employé existe déja</h2>';
                unset($_SESSION['add_status']);
            }?>
        </form>
    </div>
    <script>
        var inputFile = document.getElementById('image')
        var previewImage = document.getElementById('imagePreview')
        inputFile.addEventListener('change',function() {
            var file = this.files[0]
            if (file) {
                var reader = new FileReader();
                reader.addEventListener('load',function() {
                    previewImage.setAttribute('src', this.result)
                })
                reader.readAsDataURL(file);
            }
        })
  </script>
</body>

</html>