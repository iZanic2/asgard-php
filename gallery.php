<?php
    print '
        <h1>Take a look.</h1>

        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 15</div>
                <img src="images/main.jpg" style="width:100%">
                <div class="text">Exterior</div>
            </div>
            
            <div class="mySlides fade">
                <div class="numbertext">2 / 15</div>
                <img src="images/booking.com-images/stubiste.jpg" style="width:100%">
                <div class="text">Stairway closet</div>
            </div>
            
            <div class="mySlides fade">
                <div class="numbertext">3 / 15</div>
                <img src="images/booking.com-images/soba1.jpg" style="width:100%">
                <div class="text">Bedroom</div>
              </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 15</div>
                <img src="images/booking.com-images/soba2.jpg" style="width:100%">
                <div class="text">Bedroom</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">5 / 15</div>
                <img src="images/booking.com-images/soba3.jpg" style="width:100%">
                <div class="text">Bedroom</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">6 / 15</div>
                <img src="images/booking.com-images/dnevni1.jpg" style="width:100%">
                <div class="text">Living Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">7 / 15</div>
                <img src="images/booking.com-images/dnevni2.jpg" style="width:100%">
                <div class="text">Living Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">8 / 15</div>
                <img src="images/booking.com-images/dnevni3.jpg" style="width:100%">
                <div class="text">Living Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">9 / 15</div>
                <img src="images/booking.com-images/dnevni4.jpg" style="width:100%">
                <div class="text">Living Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">10 / 15</div>
                <img src="images/booking.com-images/kuhinja1.jpg" style="width:100%">
                <div class="text">Kitchen / Dining Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">11 / 15</div>
                <img src="images/booking.com-images/kuhinja2.jpg" style="width:100%">
                <div class="text">Kitchen / Dining Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">12 / 15</div>
                <img src="images/booking.com-images/kuhinja3.jpg" style="width:100%">
                <div class="text">Kitchen / Dining Room</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">13 / 15</div>
                <img src="images/booking.com-images/kupaonica1.jpg" style="width:100%">
                <div class="text">Bathroom</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">14 / 15</div>
                <img src="images/booking.com-images/kupaonica2.jpg" style="width:100%">
                <div class="text">Bathroom</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">15 / 15</div>
                <img src="images/booking.com-images/kupaonica3.jpg" style="width:100%">
                <div class="text">Bathroom</div>
            </div>




            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span>
              <span class="dot" onclick="currentSlide(6)"></span>
              <span class="dot" onclick="currentSlide(7)"></span>
              <span class="dot" onclick="currentSlide(8)"></span>
              <span class="dot" onclick="currentSlide(9)"></span>
              <span class="dot" onclick="currentSlide(10)"></span>
              <span class="dot" onclick="currentSlide(11)"></span>
              <span class="dot" onclick="currentSlide(12)"></span>
              <span class="dot" onclick="currentSlide(13)"></span>
              <span class="dot" onclick="currentSlide(14)"></span>
              <span class="dot" onclick="currentSlide(15)"></span>
            </div>
            <br>
        


    <script>

        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
    </script>';
?>