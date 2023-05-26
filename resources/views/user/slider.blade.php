
  <style>
    .carousel {
      width: 100%;
      overflow: hidden;
      position: static;
    }
    
    .carousel-item {
      display: none;
    }
    
    .carousel-item:first-child {
      display: block;
    }
    
    .carousel-item img {
      width: 100%;
      height: auto;
    }
    
    .carousel-indicators {
      text-align: center;
      margin-top: 10px;
    }
    
    .carousel-indicators li {
      display: inline-block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: gray;
      margin: 0 5px;
      cursor: pointer;
    }
    
    .carousel-indicators li.active {
      background-color: black;
    }
    
    .carousel-control {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 30px;
      color: black;
      cursor: pointer;
      padding: 5px;
      background-color: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
    }
    
    .carousel-control.prev {
      left: 10px;
    }
    
    .carousel-control.next {
      right: 10px;
    }
  </style>

  <div class="carousel">
    <div class="carousel-item">
      <img src="{{asset('images/user/slider/slider1.jpg')}}" alt="Image 1" style="height:600px; object-fit: cover">
    </div>
    <div class="carousel-item ">
      <img src="{{asset('images/user/slider/slider3.jpg')}}" alt="Image 2" style="height:600px; object-fit: cover">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/user/slider/slider2.jpg')}}" alt="Image 3" style="height:500px; object-fit: cover">
    </div>
    
    <div class="carousel-indicators">
      <ul>
        <li class="active"></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    
    <div class="carousel-control prev">&#9001;</div>
    <div class="carousel-control next">&#9002;</div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var carouselItems = $('.carousel-item');
      var carouselIndicators = $('.carousel-indicators li');
      var currentIndex = 0;
      
      function showCurrentItem() {
        carouselItems.hide();
        carouselItems.eq(currentIndex).show();
        carouselIndicators.removeClass('active');
        carouselIndicators.eq(currentIndex).addClass('active');
      }
      
      function showNextItem() {
        currentIndex++;
        if (currentIndex >= carouselItems.length) {
          currentIndex = 0;
        }
        showCurrentItem();
      }
      
      function showPreviousItem() {
        currentIndex--;
        if (currentIndex < 0) {
          currentIndex = carouselItems.length - 1;
        }
        showCurrentItem();
      }
      
      function goToSlide(index) {
        currentIndex = index;
        showCurrentItem();
      }
      
      $('.carousel-control.next').click(function() {
        showNextItem();
      });
      
      $('.carousel-control.prev').click(function() {
        showPreviousItem();
      });
      
      $('.carousel-indicators li').click(function() {
        var index = $(this).index();
        goToSlide(index);
      });
      
      setInterval(showNextItem, 3000);
    });
  </script>
