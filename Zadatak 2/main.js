//Ispisuju se podaci za dropdown listu godina rodjenja godinama od 1900 do trenutne godine
var select = document.getElementById("ddGodinaRodjenja");

for(var i = 1900; i <= new Date().getFullYear(); i++) {
    var el = document.createElement("option");
    el.textContent = i;
    el.value = i;
    select.appendChild(el);
}

//Kada se klikne na dugme Registruj se podaci iz forme se proveravaju sa JS pre slanja
//Ispisuje se posebna greska za svako polje u slucaju da nije uneta neophodna vrednost ili je vrednost nedozvoljena vrednost
document.getElementById("btnRegistracija").addEventListener("click", provera);

function provera(){
    let validno=true;

    //Dohvataju se svi podaci iz forme
    let ime, prezime, pol, godinaRodjenja, adresa, grad, dodatniZahtevi, uslovi;
    ime=document.getElementById("tbIme").value.trim();
    prezime=document.getElementById("tbPrezime").value.trim();
    pol=document.querySelector('input[name="rbPol"]:checked');
    godinaRodjenja=document.getElementById("ddGodinaRodjenja").value;
    adresa=document.getElementById("tbAdresa").value.trim();
    grad=document.getElementById("tbGrad").value.trim();
    dodatniZahtevi=document.getElementById("taDodatniZahtevi").value.trim();
    uslovi=document.getElementById("cbUslovi");

    //Regularni izraz za ime i prezime
    let reImePrezime;
    reImePrezime=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;

    //Dohvataju se elementi, odnosno p tagovi koji su inicijalno prazni, a u koje ce se upisati 
    //poruka u slucaju greske
    let imeGreska, prezimeGreska, polGreska, godinaRodjenjaGreska, adresaGreska, gradGreska, dodatniGreska, usloviGreska;
    imeGreska=document.getElementById("imeGreska");
    prezimeGreska=document.getElementById("prezimeGreska");
    polGreska=document.getElementById("polGreska");
    godinaRodjenjaGreska=document.getElementById("godinaGreska");
    adresaGreska=document.getElementById("adresaGreska");
    gradGreska=document.getElementById("gradGreska");
    dodatniGreska=document.getElementById("dodatniGreska");
    usloviGreska=document.getElementById("usloviGreska");

    //Provera svih podataka
    if (ime == ""){
        validno = false;
        imeGreska.innerHTML = "Molimo unesite ime.";
    }
    else if (!reImePrezime.test(ime)){
            validno = false;
            imeGreska.innerHTML = "Ime nije u ispravnom formatu.";
    }
    else{
            imeGreska.innerHTML = "";
    }

    if (prezime == ""){
        validno = false;
        prezimeGreska.innerHTML = "Molimo unesite prezime.";
    }
    else if (!reImePrezime.test(prezime)){
            validno = false;
            prezimeGreska.innerHTML = "Prezime nije u ispravnom formatu.";
    }
    else{
        prezimeGreska.innerHTML = "";
    }

    if(pol==null){
        validno=false;
        polGreska.innerHTML = "Molimo izaberite pol."
    }
    else{
        pol=pol.value;
        polGreska.innerHTML = ""
    }

    if(godinaRodjenja == "0"){
        validno = false;
        godinaRodjenjaGreska.innerHTML = "Molimo izaberite godinu rođenja";
    }
    else{
        godinaRodjenjaGreska.innerHTML = "";
    }

    if(adresa==""){
        adresaGreska.innerHTML = "Molimo unesite adresu"
    }
    else if(adresa.length>50){
        adresaGreska.innerHTML = "Adresa ne moze biti duža od 50 karaktera."
    }
    else{
        adresaGreska.innerHTML = "";
    }

    if(grad==""){
        gradGreska.innerHTML = "Molimo unesite grad"
    }
    else if(grad.length>50){
        gradGreska.innerHTML = "Ime grada ne moze biti duže od 50 karaktera."
    }
    else{
        gradGreska.innerHTML = "";
    }

    if(dodatniZahtevi.length>50){
        dodatniGreska.innerHTML = "Dodatni zahtevi ne mogu biti duži od 500 karaktera."
    }
    else{
        dodatniGreska.innerHTML = "";
    }

    if(!uslovi.checked){
        validno = false;
        usloviGreska.innerHTML = "Morate čekirati uslove korišćenja";
    }
    else{
        usloviGreska.innerHTML = "";
    }

    //U slucaju da je forma ispravno popunjena, pravi se objekat koji ce biti poslan na server
    if(validno){
        var podaciZaSlanje={
            ime:ime,
            prezime:prezime,
            pol:pol,
            godinaRodjenja:godinaRodjenja,
            adresa:adresa,
            grad:grad,
            dodatniZahtevi:dodatniZahtevi
        }
        console.log(podaciZaSlanje);

        //Slanje AJAX-om na server
        $.ajax({
            url :"storeToDatabase.php",
            method: "post",
            data:podaciZaSlanje,
            dataType: "json",
            success: function(data){
                //Ispisuje se poruka sa servera, odnosno svi podaci koji su uneti u bazu
                $("#ispis").html("<h1>"+data.poruka+"</h1>");
            },
            error:function(xhr,status,error){
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    }
}