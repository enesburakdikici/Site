<script type="module">
    var themetext = document.getElementById("themetext");
    themetext.onclick = function(){
      document.body.classList.toggle("light-theme");
      if(document.body.classList.contains("light-theme")){
        theme.classList = "fa-regular fa-moon";
      }
      else{
        theme.classList = "fa-regular fa-sun";
      }
    }

    // var themetext = document.getElementById("themetext");
    
    // function darkMode() {
    //   localStorage.setItem("tema","dark");
    //   document.body.classList.toggle("light-theme");
    //   theme.classList = "fa-regular fa-sun";
    // }
    // function lightMode() {
    //   localStorage.setItem("tema","light");
    //   document.body.classList.toggle("light-theme");
    //   theme.classList = "fa-regular fa-moon";
    // }

    // if(localStorage.getItem("tema") == "dark"){
    // darkmode();
    // }

    // themetext.onclick = function(){
    //   if(localStorage.getItem("tema") == "dark"){
    //     lightMode();
    //   }
    //   else if(localStorage.getItem("tema") == "light"){
    //     darkmode();
    //   }
    // }
</script>