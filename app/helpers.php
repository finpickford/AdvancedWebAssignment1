<?php

/* Flash a message to the page to show the user some information. */
function flash($message, $level = 'info')
{
  session()->flash('flash_message', $message); // Set the session flash message as a variable.
  session()->flash('flash_message_level', $level); // Set the session level as a variable.
}
