$(document).ready(function() {
    alert("Selamat Datang!");
    // const nav = document.getElementById ('about-open');
    // nav.addEventListener("click", function(){
    //     document.getElementById("about").style.display = "initial";
    // })
    const darkmodeToggle = document.getElementById('darkmode-toggle')
    darkmodeToggle.addEventListener('click', function() {
      const theme = $('html').attr('data-theme');
      if(theme == 'light') {
        alert("Ganti ke Negative Mode?");
        $('html').css({'filter': 'invert(1)'});
        $('html').attr('data-theme', 'dark');
        darkmodeToggle.innerHTML = 'Negative Mode'
        
      } else {
        alert("Ganti ke Light Mode?");
        $('html').removeAttr('style');
        $('html').attr('data-theme', 'light');
        darkmodeToggle.innerHTML = 'Light Mode'  
      }
    });
  });
