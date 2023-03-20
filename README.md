hallo
	<nav>


		  <ul>
			<li><a href="#about">Über uns</a></li>
			<li><a href="#services">Unsere Leistungen</a></li>
			<li><a href="#portfolio">Portfolio</a></li>
			<li><a href="#contact">Kontakt</a></li>
		</ul>
	</nav>




     .slider {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
  }
  
  .slider input[type=radio] {
    display: none;
  }
  
  .slider .slides {
    display: flex;
    height: 100%;
    width: 300%;
    transition: transform 0.5s ease-in-out;
  }
  
  .slider .slider-image {
    width: 33.33%;
    height: 100%;
    background-size: cover;
    background-position: center;
    float: left;
    border-radius: 15px;
  }
  
  #slide1-img {
    background-image: url(images/Schwarz\ und\ Weiß\ Linien\ Architektur\ Logo\ \(1\).jpg);
  }
  
  #slide2-img {
    background-image: url(images/post.png);
  }
  
  #slide3-img {
    background-image: url(images/webdesign.png);
  }
  
  .slider input[type=radio]:checked + .slider .slides {
    transform: translateX(-33.33%);
  }
  
  .slider .slider-navigation {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    justify-content: center;
  }
  
  .slider .slider-navigation label {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #ccc;
    margin-right: 10px;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }
  
  .slider .slider-navigation label:hover {
    background-color: #999;
  }
  
  .slider input[type=radio]:checked + .slider .slider-navigation label {
    background-color: #333;
  }
  