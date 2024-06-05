<!doctype html>
<html lang="hr">

<?php
$xml_nogometni_klubovi = simplexml_load_file('nogometni_klubovi.xml');
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
  <nav class="navbar bg-dark navbar-expand-lg border-bottom border-body fs-4" data-bs-theme="dark">
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
    <form method="get" action="">
      <div class="row">
        <div class="col">
          <label for="liga" class="form-label">Odaberi ligu:</label>
          <select name="liga" id="liga" class="form-select">
            <?php foreach($xml_nogometni_klubovi->liga as $liga) {?>
            <option value="<?php echo $liga->attributes()['naziv']; ?>">
              <?php echo $liga->attributes()['naziv']; ?>
            </option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-info mt-4">Prikaži klubove</button>
        </div>
      </div>
    </form>
  </div>
  <?php 
    if(isset($_GET['liga'])){
      $odabrana_liga = $_GET['liga'];
      if(empty($odabrana_liga)) {
        echo "<div class='container'><p class='text-danger'>Niste odabrali ligu!</p></div>";
      } else {
    ?>
  <div class="container">
    <div class="table-responsive">
      <table class="table table-striped table-info">
        <thead>
          <th>Naziv kluba</th>
          <th>Grad</th>
          <th>Država</th>
          <th>Godina osnovanja</th>
          <th>Stadion (naziv i kapacitet)</th>
        </thead>
        <tbody>
          <?php 
                    foreach($xml_nogometni_klubovi->liga as $liga) {
                        if($liga->attributes()['naziv'] == $odabrana_liga){
                            foreach($liga->nogometni_klub as $klub) {?>
          <tr>
            <td>
              <?php echo $klub->naziv_kluba; ?>
            </td>
            <td>
              <?php echo $klub->grad; ?>
            </td>
            <td>
              <?php echo $klub->drzava; ?>
            </td>
            <td>
              <?php echo $klub->godina_osnovanja; ?>
            </td>
            <td>
              <?php echo $klub->stadion->naziv_stadiona . ' (' . $klub->stadion->kapacitet . ')'; ?>
            </td>
          </tr>
          <?php }
                        }
                    }
                    ?>
        </tbody>
      </table>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <?php 
      }
    }
    ?>
  <footer class="footer fixed-bottom bg-dark text-light text-center py-3">
    <div class="container">
      <span class="text-light">
        <p>Marija Barišić 2024</p>
      </span>
    </div>
  </footer>
</body>

</html>