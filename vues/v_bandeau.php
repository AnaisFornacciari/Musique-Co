<?php if($menu['id'] = 1)
{
  ?> <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../public/images/page1.jpg" alt="Musique&Co">
      <div class="carousel-caption">
        <h3>Musique & Co</h3>
        <p>Une ambiance musicale pour tous.</p>
      </div> 
    </div>

    <div class="item">
      <img src="../public/images/page2.jpg" alt="Musique&Co">
      <div class="carousel-caption">
        <h3>Diversifié</h3>
        <p>De la guitare à la batterie, ou encore du saxo à la trompette.</p>
      </div> 
    </div>

    <div class="item">
      <img src="../public/images/page3.jpg" alt="Musique&Co">
      <div class="carousel-caption">
        <h3>Entrepreneur</h3>
        <p>Des stages et spectacles à gogo.</p>
      </div> 
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> <?php
}
else
{
  ?> <div id="myBandeau" data-ride="bandeau">
	<div class="bandeau-inner">
		<img src="bandeau.jpg" alt="Random Name">
	</div>
</div> <?php
}?>