<?php
require_once __DIR__ . '/../../services/ticketService.php';
require_once __DIR__ . '/../../models/cartObject.php';
require_once __DIR__ . '/../../models/ticket.php';
require_once __DIR__ . '/../../services/eventService.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

class CartController
{
  private $service;
  private $eventService;

  function __construct()
  {
    $this->service = new TicketService();
    $this->eventService = new EventService();
  }
  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      header('Content-type: Application/JSON');


      $id = $_GET["id"];
      $result = $this->service->get_TicketsByUserIdAndStatus($id, "pending");


      $cartObjects = [];
      for($i = 0; $i < sizeof($result); $i++){

       
        $resultObject = new CartObject(
          $result[$i]->getId(),
          $result[$i]->getStatus(),
          $result[$i]->getPrice(),
          $result[$i]->get_UserId(),
          $result[$i]->getOrderId(),
          $result[$i]->get_IsAllAccess()
        );




        $resultObject->session = $this->getSession($result[$i]->getEvent_id());
        array_push($cartObjects, $resultObject);
      }

      
      echo json_encode($cartObjects);
      return;
    }
  }


  function getSession($id){
    $session = $this->eventService->get_EventYummieById($id);
    if($session != null)
      return $session;
    $session = $this->eventService->get_EventEDMById($id);
    if ($session != null)
      return $session;
    $session = $this->eventService->get_EventStrollById($id);
    return $session;
  }



  
}
