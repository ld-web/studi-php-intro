<?php

/**
 * Redirects the client to the specified location
 *
 * @param string $location
 * @return void
 */
function redirect(string $location): void
{
  header('Location: ' . $location);
  exit;
}
