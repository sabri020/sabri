<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Example</title>
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
        <div class="col-lg-5 mr-auto">
            <form action="index.php?controller=retour&action=modifier" method="post">
                <h3>Retour details</h3>
                <hr/>
                date_achat : <input name="date_achat" value="<?php echo $data['retour']->date_achat ?>" type="date" class="form-control" />
date_retour : <input name="date_retour" value="<?php echo $data['retour']->date_retour ?>" type="date" class="form-control" />
statut : <input name="statut" value="<?php echo $data['retour']->statut ?>" type="text" class="form-control" />
nom_article : <input name="nom_article" value="<?php echo $data['retour']->nom_article ?>" type="text" class="form-control" />
motif_retour : <input name="motif_retour" value="<?php echo $data['retour']->motif_retour ?>" type="text" class="form-control" />
montant_article : <input name="montant_article" value="<?php echo $data['retour']->montant_article ?>" type="text" class="form-control" />
id_client : <input name="id_client" value="<?php echo $data['retour']->id_client ?>" type="text" class="form-control" />
id_enseigne : <input name="id_enseigne" value="<?php echo $data['retour']->id_enseigne ?>" type="text" class="form-control" />
                <input type="submit" value="Send" class="btn btn-success"/>
            </form>
            <a href="index.php" class="btn btn-info">Return</a>
        </div>
       
    </body>
</html>