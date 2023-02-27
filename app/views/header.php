<?php
global $headerTextColorValue;
$headerTextColorValue = '#F7F7FB'; // white
global $unselected;
global $selected;
$unselected = '#F7F7FB'; //white
$selected = '#FC5B84'; // pink
global $colours;
$colours = array("yummie" => '', "tour" => '', "dance" => '', "login" => '');

function generateHeader(string $pageName, string $mode)
{
  global $unselected;
  global $selected;
  global $headerTextColorValue;
  switch ($mode) {
    case 'dark':
      $unselected = '#29334E';
      $selected = '#FC5B84';
      $headerTextColorValue = '#F7F7FB';
      break;
    case 'light':
      $unselected = '#F7F7FB';
      $selected = '#FC5B84';
      $headerTextColorValue = '#29334E';
      break;
    default:
      $unselected = '';
      $selected = '#FC5B84';
      break;
  }
  global $colours;
  $colours = pickColours($colours, $pageName);
  loadHTML();
}

function pickColours(mixed $colours, string $var)
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
      <div class='relative w-max text-[" . $GLOBALS['unselected'] . "] font-sans text-[48px]' id='HeadTitle'>
      <a href='/'>
        <span class='text-[#42BFDD]'>H</span>aarlem</a>
      </div>
      <div class='absolute flex items-center right-0 gap-[25px]' id='navigation'>
        <div class='flex items-center text-[20px] float-right'>
          <ul class='flex flex-row gap-[25px] mt-[15px]'>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['yummie'] . "]'>
              <a href='/food'>Yummie!</a>
            </li>
            <li class='transition ease-in-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['tour'] . "]'>
              <a href='/tour'>Haarlem tour</a>
            </li>
            <li class='transition ease-out hover:translate-y-[-5px] text-[" . $GLOBALS['colours']['dance'] . "]'>
              <a href='/dance'>Dance</a>
            </li>
          </ul>
        </div>";
  if (isset($_SESSION["USER_ID"])) {
    echo "
          <a href='/login'>
          <div class='w-max h-[40px] mt-[15px] text-[" . $GLOBALS['unselected'] . "] flex items-center gap-[10px] border-2 border-[" . $GLOBALS['colors']['login'] . "] rounded-md px-4 py-5 transition ease-in-out hover:bg-[" . $GLOBALS['unselected'] . "] hover:border-[" . $GLOBALS['unselected'] . "] hover:text-[" . $GLOBALS['headerTextColorValue'] . "] cursor-pointer'>
          <i class='fa fa-user' style='font-size: 24px;'></i>Account<i class='fa fa-caret-down mt-[5px]'></i></div>
          </a>";
  } else {
    echo "
          <a href='/login'>
          <div class='w-max h-[40px] mt-[15px] text-[" . $GLOBALS['unselected'] . "] flex items-center gap-[10px] border-2 border-[" . $GLOBALS['unselected'] . "] rounded-md px-4 py-5 transition ease-in-out hover:bg-[" . $GLOBALS['unselected'] . "] hover:border-[" . $GLOBALS['unselected'] . "] hover:text-[" . $GLOBALS['headerTextColorValue'] . "] cursor-pointer'>
          <i class='fa fa-user' style='font-size: 24px;'></i>Account<i class='fa fa-caret-down mt-[5px]'></i></div>
          </a>";
  }
  echo
    "
        <div class='w-max h-[40px] mt-[15px] text-[" . $GLOBALS['unselected'] . "] flex items-center gap-[10px] border-2 border-[" . $GLOBALS['unselected'] . "] rounded-md px-4 py-5 transition ease-in-out hover:bg-[" . $GLOBALS['unselected'] . "] hover:border-[" . $GLOBALS['unselected'] . "] hover:text-[" . $GLOBALS['headerTextColorValue'] . "] cursor-pointer'>
        <i class='fa fa-location-arrow' style='font-size: 24px;'></i>
          Plan your trip</div>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <body class=''>
  <div class='absolute top-0 w-[100vw] h-[100px] flex items-center justify-center pl-[50px] pr-[50px]' id='header'>
    <div class='relative w-[1280px] flex flex-row' id='content'>
      <div class='relative w-max text-[{" . $GLOBALS[' unselected'] . "}] font-sans text-[48px]' id='HeadTitle'>
        <span class='text-[#42BFDD]'>H</span>aarlem
      </div>
      <div class='absolute flex items-center right-0 gap-[25px]' id='navigation'>
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