<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Zadatak</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>

    <div id="ispis" class="container">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="my-3">
                        <label for="tbIme" class="form-label">Ime</label>
                        <input type="text" class="form-control" id="tbIme" placeholder="Unesite ime">
                        <p id="imeGreska" class="text-danger"></p>
                    </div>
                    <div class="my-3">
                        <label for="tbPrezime" class="form-label">Prezime</label>
                        <input type="text" class="form-control" id="tbPrezime" placeholder="Unesite prezime">
                        <p id="prezimeGreska" class="text-danger"></p>
                    </div>
                    <p>Pol</p>
                    <div class="form-check">          
                        <input class="form-check-input" type="radio" name="rbPol" id="rbPol1" value="muski">
                        <label class="form-check-label" for="rbPol1">
                          Muški
                        </label>
                    </div>
                    <div class="form-check mb-3">          
                        <input class="form-check-input" type="radio" name="rbPol" id="rbPol2" value="zenski">
                        <label class="form-check-label" for="rbPol2">
                          Ženski
                        </label>
                    </div>
                    <p id="polGreska" class="text-danger"></p>
                    <p>Godina rođenja</p>
                    <select id="ddGodinaRodjenja" class="form-select mb-3" aria-label="Default select example">
                        <option value="0">- Izaberite godinu rođenja -</option>
                    </select>
                    <p id="godinaGreska" class="text-danger"></p>
                    <div class="my-3">
                        <label for="tbAdresa" class="form-label">Adresa</label>
                        <input type="text" class="form-control" id="tbAdresa" placeholder="Unesite adresu">
                        <p id="adresaGreska" class="text-danger"></p>
                    </div>
                    <div class="my-3">
                        <label for="tbGrad" class="form-label">Grad</label>
                        <input type="text" class="form-control" id="tbGrad" placeholder="Unesite grad">
                        <p id="gradGreska" class="text-danger"></p>
                    </div>
                    <p>Dodatni zahtevi</p>
                    <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="Unesite dodatne zahteve" id="taDodatniZahtevi"></textarea>
                        <label for="taDodatniZahtevi">Unesite dodatne zahteve</label>
                        <p id="dodatniGreska" class="text-danger"></p>
                    </div>
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="" id="cbUslovi">
                        <label class="form-check-label" for="cbUslovi">
                          Da li prihvatate naše uslove korišćenja?
                        </label>
                    </div>
                    <p id="usloviGreska" class="text-danger"></p>
                    <button id="btnRegistracija" class="btn btn-success me-3" type="button">Registruj se</button>
                    <input type="reset" class="btn btn-primary" value="Poništi">
                </div>
            </div>        
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>