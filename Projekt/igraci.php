<!doctype html>
<html lang="hr">

<?php
  $xml_igraci = simplexml_load_file('igraci.xml');
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>XML programiranje</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/4df37066a8.js" crossorigin="anonymous"></script>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body fs-4"
    data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand"><i class="fa-solid fa-futbol"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Nogometni klubovi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="igraci.php">Igrači</a>
          </li>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <div class="table-responsive">
      <table class="table table-striped table-danger">
        <thead>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Datum Rođenja</th>
          <th>Pozicija</th>
          <th>Trenutni klub</th>
          <th>Prošli klubovi</th>
          <th>Statistika</th>
        </thead>
        <tbody>
          <?php foreach ($xml_igraci as $igrac){?>
          <tr>
            <td>
              <?php echo $igrac->ime ?>
            </td>
            <td>
              <?php echo $igrac->prezime ?>
            </td>
            <td>
              <?php echo $igrac->datum_rodenja ?>
            </td>
            <td>
              <?php echo $igrac->pozicija ?>
            </td>
            <td>
              <?php echo $igrac->trenutni_klub ?>
            </td>
            <td>
              <?php foreach($igrac->prosli_klubovi->klub as $prosli_klub){echo $prosli_klub."<br>"; } ?>
            </td>
            <td>
              <?php foreach($igrac->statistika as $statistika)
              {echo "Broj golova: ".$statistika->broj_golova."<br> Broj asistencija:".$statistika->broj_asistencija."<br> Broj nastupa".$statistika->broj_odigranih_utakmica; } ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
  <footer class="footer mt-auto py-3 bg-dark text-light text-center">
    <div class="container">
      <span class="text-light">
        <p>Marija Barišić 2024</p>
      </span>
    </div>
  </footer>
</body>

</html>