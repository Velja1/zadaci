<?php
    function skeniraj($imeFoldera){
        //Provera se da li je kao ime foldera unet prazan string, ako jeste ispisuje se obaveštenje
        if($imeFoldera==""){
            echo "Molimo unesite ime foldera.";
        }
        //Proverava se da li zadati folder postoji, ako ne postoji ispisuje se obaveštenje
        else if(is_dir($imeFoldera)){
            $lista = array_diff(scandir($imeFoldera), array('..', '.'));

            //Ako je folder prazan, ispisuje se poruka
            if(empty($lista)){
                echo "Zadati folder je prazan.";
            }
            else{
                echo "Sadržina izabranog foldera - <span class='fw-bold'>$imeFoldera</span>:<br/>";
            }

            foreach($lista as $zapis){
                //Ako je folder ispisuje se folder, ako je bilo šta drugo ispisuje se fajl
                //U oba slučaja se folder ili fajl otvaraju na novoj stranici radi preglednosti
                if(is_dir($imeFoldera."/".$zapis)){
                    echo "Folder: <a target='_blank' href='$imeFoldera/$zapis'>$imeFoldera/$zapis</a> <br/>";
                }
                else{
                    echo "Fajl: <a target='_blank' href='$imeFoldera/$zapis'>$imeFoldera/$zapis</a> <br/>";
                }
            }
        }
        else{
            //Ako je unet folder koji ne postoji ispisuje se obavestenje
            echo "Zadati folder ne postoji.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Zadatak 4</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form method="get" action="<?=$_SERVER['PHP_SELF']?>">
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="pretraga" class="form-label">Unesite ime foldera</label>
                        <input type="text" class="form-control" id="pretraga" name="pretraga" value="<?=$_GET['pretraga'] ?? ""?>" aria-describedby="Pretraga">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <button type="submit" class="btn btn-primary" >Pretraži</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_GET['pretraga'])){
                    skeniraj($_GET['pretraga']);
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>