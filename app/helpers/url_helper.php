<?php

// Simple page redirect 

function urlRedirect($page)
{
  header('Location: ' . URLROOT . '/' . $page);
}