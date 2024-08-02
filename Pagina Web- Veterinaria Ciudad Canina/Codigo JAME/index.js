function tema(){
    var index = document.getElementById('html');
    var icon = document.getElementById('botont');
        if (index.getAttribute("data-bs-theme") === "light") {
          index.setAttribute("data-bs-theme", "dark");
          icon.setAttribute("class","bi bi-moon-fill")
        }
        else {
          index.setAttribute("data-bs-theme", "light");
          icon.setAttribute("class","bi bi-sun-fill")
        }
      }

      /*alert para la cancelacion del servicio en agendamientos de grooming y medicina*/

      