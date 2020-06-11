function myFunction(x){
    var links = document.getElementsByClassName("nav-link");
    var trigger = document.getElementById("hamburger-menu-link");
    var i;
    
    for (i = 0; i < links.length; i++) {     
      if (links[i].style.display === "block") {
        links[i].style.display = "none";
      } else {
        links[i].style.display = "block";  
      }    
    } 
    trigger.classList.toggle("trigger-close");
  }
  
  var x = window.matchMedia("(min-width: 768px)");
  myFunction(x); // Call listener function at run time
  x.addListener(myFunction); // Attach listener function on state changes