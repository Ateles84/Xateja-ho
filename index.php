<!DOCTYPE html>
<html lang="ca">
  <head>
    <meta charset="UTF-8" />
    <title>xateja-ho!</title>
    <link rel="stylesheet" type="text/css" href="estilpag" />
  </head>
  <body>
    <section id="titol">
      <h1>xateja-ho!</h1>
    </section>
    <section id="missatges">
      <?php
        include 'connexioBD.php';
        if (mysqli_connect_errno()) {
          print "Failed to connect to MySQL: ".mysqli_connect_error();
        } 
	$sql = "select * from missatges order by id";
	$result = mysqli_query($con, $sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		 ?> <p><span><?php echo $row['hora'],' - ',$row['usuari'], ': ', $row['text']; ?></span> </p> <?php 
	}
	
	mysqli_free_result($result);

	mysqli_close($con);
      ?>
    </section>
    <section id="formulari">
      <form method="post" action="insertar.php">
        <!-- COMPLETA EL CONTINGUT DEL FORMULARI -->
  		<p align="center"><input type="text" name="usuari" placeholder="El teu usuari"></p>
  		<p align="center"><input type="text" name="missatge" placeholder="El teu missatge"></p>
		<p align="center"><input type="submit" value="Enviar"></p>
      </form>
    </section>
    <section id="errors">
      <p><?php 
	if (isset($_GET['error'])) echo $_GET['error'];
	elseif (isset($_GET['missatge'])) echo $_GET['missatge'];
	else echo "";?></p>
    </section>
  </body>
</html>
