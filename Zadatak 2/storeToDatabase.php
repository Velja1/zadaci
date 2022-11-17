<?php
    //Zastita od pristupa stranici preko url adrese
    if($_SERVER['REQUEST_METHOD']=='POST'){
        try{
            //Dohvataju se svi podaci
            $ime=$_POST["ime"];
            $prezime=$_POST["prezime"];
            $pol=$_POST["pol"];
            $godinaRodjenja=$_POST["godinaRodjenja"];
            $adresa=$_POST["adresa"];
            $grad=$_POST["grad"];
            $dodatniZahtevi=$_POST["dodatniZahtevi"];

          
            //Ovde treba da bude kod za serversku validaciju i kod za unos u bazu podataka


            //Poruka koja ce biti poslata nazad klijentu, ukoliko je unos u bazu uspesan
            $odgovor=["poruka"=>"Uspešno registrovan korisnik:</br> Ime: $ime,</br> Prezime: $prezime,</br> Pol: $pol,</br> Godina rodjenja: $godinaRodjenja,</br> Adresa: $adresa,</br> Grad: $grad,</br> Dodatni zahtevi: $dodatniZahtevi"];
            echo json_encode($odgovor);
            http_response_code(200);

        }
        
        catch(PDOException $exception){
            //Ukoliko je doslo do greske, vraca se poruka o greski
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
            }
        }

    else{
        header('Location: index.php');
    }
?>