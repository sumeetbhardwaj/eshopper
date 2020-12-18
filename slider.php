<div class="container">
<a href="index.php"><div class="w3-content w3-section " style="max-width:100%;">
  <img class="mySlides" src="images/Banner-1.jpg" style="width:100%;">
  <img class="mySlides" src="images/Banner-2.jpg" style="width:100%">
  <img class="mySlides" src="images/Banner-3.jpg" style="width:100%">
</div></a>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2500); // Change image every 2 seconds
}
</script>
