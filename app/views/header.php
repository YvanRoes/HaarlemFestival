<?php
$headerTextColorValue = '#F7F7FB'; // white
global $unselected;
global $selected;
$unselected = '#F7F7FB'; //white
$selected = '#FC5B84'; // pink
global $colours;
$colours = array("yummie" => '', "tour" => '', "dance" => '');

function generateHeader($pageName)
{
  global $colours;
  $colours = pickColours($colours, $pageName);
  loadHTML();
}

function pickColours($colours, $var)
{

  foreach ($colours as $key => $value) {
    if ($key == $var)
      $colours[$key] = $GLOBALS['selected'];
    else
      $colours[$key] = $GLOBALS['unselected'];
  }
  return $colours;
}

function loadHTML()
{
  echo "<body class=''>
  <div class='absolute top-0 w-[100vw] h-[100px] flex items-center justify-center pl-[50px] pr-[50px]' id='header'>
    <div class='relative w-[1280px] flex flex-row' id='content'>
      <div class='relative w-max text-[{" . $GLOBALS['unselected'] . "}] font-sans text-[48px]' id='HeadTitle'>
        <span class='text-[#42BFDD]'>H</span>aarlem
      </div>
      <div class='absolute flex items-center right-0 gap-[25px]' id='list'>
        <div class='flex items-center text-[20px] float-right'>
          <ul class='flex flex-row gap-[25px] mt-[15px]'>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['yummie'] . "]'>
              <a>Yummie!</a>
            </li>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['tour'] . "]'>
              <a>Haarlem tour</a>
            </li>
            <li class='transition ease-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['dance'] . "]'>
              <a>Dance</a>
            </li>
          </ul>
        </div>
        <button class='w-max p-3 text-[20px] text-[{$GLOBALS['unselected']}] bg-[#42BFDD] mt-[15px] transition ease-out hover:translate-y-[-5px]'>
          Plan your trip!
        </button>
      </div>
    </div>
  </div>
    </body>";
}

?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

  #HeadTitle {
    font-family: 'Inter', sans-serif;
  }
</style>


<!-- <body class=''>
  <div class='absolute top-0 w-[100vw] h-[100px] flex items-center justify-center pl-[50px] pr-[50px]' id='header'>
    <div class='relative w-[1280px] flex flex-row' id='content'>
      <div class='relative w-max text-[{" . $GLOBALS[' unselected'] . "}] font-sans text-[48px]' id='HeadTitle'>
        <span class='text-[#42BFDD]'>H</span>aarlem
      </div>
      <div class='absolute flex items-center right-0 gap-[25px]' id='list'>
        <div class='flex items-center text-[20px] float-right'>
          <ul class='flex flex-row gap-[25px] mt-[15px]'>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['yummie'] . "]'>
              <a>Yummie!</a>
            </li>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['tour'] . "]'>
              <a>Haarlem tour</a>
            </li>
            <li class='transition ease-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['dance'] . "]'>
              <a>Dance</a>
            </li>
          </ul>
        </div>
        <button class='w-max p-3 text-[20px] text-[{$GLOBALS['unselected']}] bg-[#42BFDD] mt-[15px] transition ease-out hover:translate-y-[-5px]'>
          Plan your trip!
        </button>
      </div>
    </div>
  </div>
</body> -->