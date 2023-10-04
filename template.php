<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->addExternalJS("https://unpkg.com/react@18/umd/react.development.js");
$this->addExternalJS("https://unpkg.com/react-dom@18/umd/react-dom.development.js");
$this->addExternalJS("/local/components/gineff/news.list/templates/bitrix-news.list-template/slider.js");
$this->addExternalCSS("/local/components/gineff/news.list/templates/bitrix-news.list-template/slider.css");
$this->setFrameMode(true);
?>

<?php
function mapSlide($slide) {
    return [
        'DETAIL_PICTURE' => $slide['DETAIL_PICTURE'],
        'TITLE' => $slide['PROPERTIES']['TITLE']['VALUE'],
        'SUBTITLE' => $slide['PROPERTIES']['SUBTITLE']['VALUE'],
        'DESCRIPTION' => $slide['PROPERTIES']['DESCRIPTION']['VALUE'],
        'MAIN_BUTTON' => array_map('trim', explode(' : ', $slide['PROPERTIES']['MAIN_BUTTON']['VALUE'])),
        'SECONDARY_BUTTON' => array_map('trim', explode(' : ', $slide['PROPERTIES']['SECONDARY_BUTTON']['VALUE'])),
        'STATUS' => $slide['PROPERTIES']['STATUS']['VALUE'],        
    ];
}

$slides = array_reverse( array_map('mapSlide', $arResult["ITEMS"]));
?>
<div class="news-list bitrix-slider">
  <div class="slider-content">
  <?php foreach ($slides as $slide): ?>
    <div class="slide">
      <div class="row"> 
        <div class="col col-md-6 col-sm-12 order-md-0 order-sm-1" >
            <div class="slide-subtitle">
                <?=$slide["SUBTITLE"];?>
            </div> 
            <div class="slide-title">
                <?=$slide["TITLE"];?>
            </div>
            <div class="slide-description">
                <?=$slide["DESCRIPTION"];?>
            </div>
            <div class="slide-status">
                <?=$slide["STATUS"];?>
            </div>
             
        </div>
        <div class="col col-md-6 col-sm-12 order-md-1 order-sm-0">
            <div class="slide-image">
                <img src="<?=$slide["DETAIL_PICTURE"]["SRC"];?>" />
            </div>
        </div>
      </div>
      <div class="slide-btn-pannel">
        <a href="<?=$slide["MAIN_BUTTON"][1];?>">
          <div class="btn main-btn" data-url="<?=$slide["MAIN_BUTTON"][1];?>">
            <?=$slide["MAIN_BUTTON"][0];?>
          </div>
        </a>
        <a href="<?=$slide["SECONDARY_BUTTON"][1];?>">
          <div class="btn secondary-btn" data-url="<?=$slide["SECONDARY_BUTTON"][1];?>">
            <?=$slide["SECONDARY_BUTTON"][0];?>
          </div>
        </a>  
      </div>     
    </div>  
  <?php endforeach; ?>
  </div>
</div>
