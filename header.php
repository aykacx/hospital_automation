<?php
include_once 'db.php';
ob_start();
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/hospital_automation">HOSPITAL AUTOMATION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/hospital_automation">LOGIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">SIGN UP</a>
      </li>
    </ul>
  </div>
</nav>