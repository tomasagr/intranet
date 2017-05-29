<?php

function getCount($type) {
  $user = Auth::user();
  
   if ($type == 'voting') {
     $notifications = $user->unreadNotifications->filter(function($element) {
        return $element->type == 'Intranet\Notifications\VotingNotify';
     });
   }

   return count($notifications); 
}

?>