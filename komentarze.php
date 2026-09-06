<?php
	session_start();

	require_once("./php_pizza/laczenie.php");
	$polaczenie = new mysqli($host, $uzytkownik, $haslo, $baza);

	$_SESSION["token"] = bin2hex(random_bytes(32));
?>
<!doctype html>
	<html lang="pl">
		<head>
			<meta charset="UTF-8"/>
			<meta name="author" content="Przemysław Szułczyński"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<meta name="robots" content="index, follow"/>
			<meta name="description" content="Projekt Pizza - przykład strony internetowej wymyślonej pizzerii."/>

			<meta property="og:type" content="website"/>
      		<meta property="og:url" content="https://szulczyk.pl/projekt-19/komentarze"/>
      		<meta property="og:title" content="Szulczyk.pl | Projekt 19: Komentarze"/>
      		<meta property="og:description" content="Pizzeria Mr. Pizza - Komentarze"/>
      		<meta property="og:image" content="../favicon-512x512.webp"/>

			<title>Pizzeria Mr. Pizza - Komentarze</title>
			<link rel="stylesheet" media="(width >= 1100px)" href="./css_pizza/pizza_domyslne.css"/>
			<link rel="stylesheet" media="(640px <= width < 1100px)" href="./css_pizza/pizza_tablet.css"/>
			<link rel="stylesheet" media="(width < 640px)" href="./css_pizza/pizza_telefon.css"/>
			<link rel="apple-touch-icon" sizes="180x180" href="../favicon-touch-icon.webp"/>
      		<link rel="icon" type="image/webp" sizes="32x32" href="../favicon-32x32.webp"/>
      		<link rel="icon" type="image/webp" sizes="16x16" href="../favicon-16x16.webp"/>
			<link rel="shortcut icon" href="../favicon.ico"/>
			<script src="./skrypty_pizza/jquery.js" defer></script>
			<script type="text/javascript" src="./skrypty_pizza/pizza.js" defer></script>
		</head>
			<body>
				<div>
					<div id="tlo">
						<div id="cale_menu">
							<div id="logo">
								<a href="pizza">
									<picture>
										<source srcset="./obrazki_pizza/logo.webp" media="(width < 640px)" width="80px" height="65px"/>
										<source srcset="./obrazki_pizza/logo.webp" media="(width < 1100px)" width="100px" height="75px"/>
										<img id="tutaj" src="./obrazki_pizza/logo.webp" width="120px" height="85px" loading="eager" alt="Logo Mr. Pizza"/>
									</picture>
								</a>
							</div>

							<div id="opcje">
								<div id="menu"><a href="pizza#lista"><b>&gt;</b> Menu</a></div>
								<div id="galeria"><a href="galeria"><b>&gt;</b> Galeria</a></div>
								<div id="komentarze"><a href="komentarze"><b>&gt;</b> Komentarze</a></div>
							</div>
						</div>
					</div>

					<div id="opis">
						<div class="info2">Regulamin Dodawania Komentarzy</div>
						<div class="info2"><i>Niniejszy regulamin określa zasady dodawania komentarzy na stronie internetowej naszej pizzerii:<br/>1. Zachowaj kulturę osobistą<br/>2. Nie nadużywaj dużych liter<br/>3. Nie zamieszczaj linków do stron zewnętrznych<br/>4. Nie rozpowszechniaj treści reklamowych<br/>5. Nie używaj wulgaryzmów/treści obraźliwych<br/>6. Nie rób spamu<br/>7. Nie wzywaj do nienawiści/hejtu</i></div>
						<div class="info2"><b>Podziel się z nami Swoją opinią!</b></div>
						
						<div class="info">
							<picture>
								<source srcset="./obrazki_pizza/osoba.webp" media="(width < 640px)" width="18px" height="18px"/>
								<source srcset="./obrazki_pizza/osoba.webp" media="(width < 1100px)" width="20px" height="20px"/>
								<img src="./obrazki_pizza/osoba.webp" width="22px" height="22px" loading="eager" alt="Osoba"/>
							</picture>
							<i>Autor komentarza:</i><br/><form action="dodaj" method="post"><input type="text" name="imie" minlength="3" maxlength="20" pattern="[0-9A-Za-zżźćńółęąśŻŹĆŃÓŁĘĄŚ\s_\-]{3,20}" autocomplete="off" required/>

							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>"/>
							
							<div id="garnek">
								<input type="email" name="email" minlength="3" maxlength="50" autocomplete="off" tabindex="-1"/>
							</div>
						</div>

						<div id="info3">
							<picture>
								<source srcset="./obrazki_pizza/zawartosc.webp" media="(width < 640px)" width="18px" height="18px"/>
								<source srcset="./obrazki_pizza/zawartosc.webp" media="(width < 1100px)" width="20px" height="20px"/>
								<img src="./obrazki_pizza/zawartosc.webp" width="22px" height="22px" loading="eager" alt="Zawartość"/>
							</picture>
							<i>Treść komentarza:</i><br/><textarea name="tresc" minlength="3" maxlength="200" spellcheck="on" autocomplete="off" required></textarea>
						</div>
						<div id="mniejsze">Maksymalnie 200 znaków.
							<?php
								if(isset($_SESSION["decyzja"])){
									if($_SESSION["decyzja"] === false){
										echo "<span class='nieokej'></span>";
										unset($_SESSION["decyzja"]);
									}elseif($_SESSION["decyzja"] === true){
										echo "<span class='okej'></span>";
										unset($_SESSION["decyzja"]);
									}
								}
							?>
						</div>

						<div class="info">
							<?php
								if($polaczenie->connect_error){
									echo "<div class='brak'>Błąd połączenia z bazą danych!</div>";
								}else{
									echo "<input type='submit' value='Dodaj komentarz'/>";
								}
							?>
							</form>
						</div>

						<div>
							<picture>
								<source srcset="./obrazki_pizza/linia.webp" media="(width < 640px)" width="90%" height="25px"/>
								<source srcset="./obrazki_pizza/linia.webp" media="(width < 1100px)" width="80%" height="35px"/>
								<img src="./obrazki_pizza/linia.webp" width="75%" height="45px" loading="eager" alt="Linia ozdobna"/>
							</picture>
						</div>

						<div class="info">
							<picture>
								<source srcset="./obrazki_pizza/dymek.webp" media="(width < 640px)" width="18px" height="18px"/>
								<source srcset="./obrazki_pizza/dymek.webp" media="(width < 1100px)" width="20px" height="20px"/>
								<img src="./obrazki_pizza/dymek.webp" width="22px" height="22px" loading="eager" alt="Dymek"/>
							</picture>
							<i>KOMENTARZE:</i>
						</div>
						
						<div>
							<?php
								if($polaczenie->connect_error){
									echo "<div class='brak'>Błąd połączenia z bazą danych!</div>";
								}else{
									$sql = "SELECT `autor`,`zawartosc`,`czas` FROM `opinie` ORDER BY `id` DESC;";
									$wynik = $polaczenie->query($sql);

									if($wynik->num_rows>0){
										while($kolumna = $wynik->fetch_row()){
											echo "<div class='opinie'>
											<div class='autor'>".$kolumna[0]."</div><div class='czas'>".$kolumna[2]."</div>
											<div class='wynik'>".$kolumna[1]."</div>
											</div>";
										}
									}else{
										echo "<div class='brak'>Brak dodanych komentarzy.</div>";
									}
								}
								$polaczenie->close();
							?>
						</div>
					</div>

					<div id="tlo2">
						<div id="zakonczenie">
							<div class="info2">
								<picture>
									<source srcset="./obrazki_pizza/telefon.webp" media="(width < 640px)" width="18px" height="18px"/>
									<source srcset="./obrazki_pizza/telefon.webp" media="(width < 1100px)" width="20px" height="20px"/>
									<img src="./obrazki_pizza/telefon.webp" width="22px" height="22px" loading="lazy" alt="Telefon"/>
								</picture>
								<i>Telefon:</i> <b>+48 673 279 142</b>
							</div>

							<div class="info2">
								<picture>
									<source srcset="./obrazki_pizza/znacznik.webp" media="(width < 640px)" width="18px" height="18px"/>
									<source srcset="./obrazki_pizza/znacznik.webp" media="(width < 1100px)" width="20px" height="20px"/>
									<img src="./obrazki_pizza/znacznik.webp" width="22px" height="22px" loading="lazy" alt="Znacznik"/>
								</picture>
								<i>Nasz adres:</i><br/><b>Kazimierza Wielkiego 37, 64-920 Piła</b>
							</div>

							<div class="info2">
								<picture>
									<source srcset="./obrazki_pizza/mapa.webp" media="(width < 640px)" width="18px" height="18px"/>
									<source srcset="./obrazki_pizza/mapa.webp" media="(width < 1100px)" width="20px" height="20px"/>
									<img src="./obrazki_pizza/mapa.webp" width="22px" height="22px" loading="lazy" alt="Mapa"/>
								</picture>
								<i>Mapa dojazdu:</i><br/><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4782.612947149569!2d16.755246!3d53.176482!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4703e6bb8a236997%3A0x91148cc5636e3d92!2sKazimierza%20Wielkiego%2037%2C%2064-920%20Pi%C5%82a%2C%20Polska!5e0!3m2!1spl!2sde!4v1748635140621!5m2!1spl!2sde" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>

							<div id="stopka">&copy; 2025 Szulczyk - Przemysław Szułczyński</div>
						</div>
					</div>
				</div>
			</body>
	</html>