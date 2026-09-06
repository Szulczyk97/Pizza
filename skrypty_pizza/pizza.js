$(document).ready(()=>{
	const ktory = document.getElementsByClassName("ustaw");

	function wymiana(liczba){
		$("#laduj"+liczba).click(()=>{
			const pozostale = document.querySelectorAll("#laduj"+liczba+" > picture > source");
			if(ktory[liczba-1].getAttribute("src") === "./obrazki_pizza/strzalka2.webp" && pozostale[0].getAttribute("srcset") === "./obrazki_pizza/strzalka2.webp" && pozostale[1].getAttribute("srcset") === "./obrazki_pizza/strzalka2.webp"){
				ktory[liczba-1].setAttribute("src","./obrazki_pizza/strzalka1.webp");
				pozostale[0].setAttribute("srcset","./obrazki_pizza/strzalka1.webp");
				pozostale[1].setAttribute("srcset","./obrazki_pizza/strzalka1.webp");
			}else if(ktory[liczba-1].getAttribute("src") === "./obrazki_pizza/strzalka1.webp" && pozostale[0].getAttribute("srcset") === "./obrazki_pizza/strzalka1.webp" && pozostale[1].getAttribute("srcset") === "./obrazki_pizza/strzalka1.webp"){
				ktory[liczba-1].setAttribute("src","./obrazki_pizza/strzalka2.webp");
				pozostale[0].setAttribute("srcset","./obrazki_pizza/strzalka2.webp");
				pozostale[1].setAttribute("srcset","./obrazki_pizza/strzalka2.webp");
			}
			
			$("#obraz"+liczba).slideToggle(1000);
		});
	}

	for(let i=1;i<40;i++){
		wymiana(i);
	}

	if($("span").hasClass("okej")){
		alert("Komentarz został dodany!");
	}else if($("span").hasClass("nieokej")){
		alert("Błąd połączenia z bazą danych!");
	}
});