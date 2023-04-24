<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Example PHP+PDO+POO+MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <form action="index.php?controller=retour&action=ajout" method="post" class="col-lg-5">
            <h3>Ajouter un retour</h3>
            <hr/>
            date_achat : <input type="date" name="date_achat" class="form-control" />
date_retour : <input type="date" name="date_retour" class="form-control" />
statut : <input type="text" name="statut" class="form-control" />
nom_article : <input type="text" name="nom_article" class="form-control" />
motif_retour : <input type="text" name="motif_retour" class="form-control" />
montant_article : <input type="text" name="montant_article" class="form-control" />
id_client : <input type="text" name="id_client" class="form-control" />
id_enseigne : <input type="text" name="id_enseigne" class="form-control" />
            <input type="submit" value="Send" class="btn btn-info"/>
        </form>
        
        <div class="col-lg-7">
            <h3>Retours</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($data["retour"] as $retour) {?>
   
<?php echo $retour["date_retour"]; ?>
<?php echo $retour["statut"]; ?>
<?php echo $retour["nom_article"]; ?>
<?php echo $retour["motif_retour"]; ?>
<?php echo $retour["montant_article"]; ?>
<?php echo $retour["id_client"]; ?>
<?php echo $retour["id_enseigne"]; ?>
                <div class="right">
                    <a href="index.php?controller=retour&action=details&id=<?php echo $retour['id']; ?>" class="btn btn-info">detailss</a>
                </div>
                <hr/>
            <?php } ?>
        </section>
		
        
    </body>
</html>