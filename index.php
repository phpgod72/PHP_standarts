<?php
include "function.php"
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="?menu=home">My Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="?menu=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?menu=wortteil">Wortteilsuche</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=inhalt">DB-Inhalt</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=update">DBupdate</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=inserts">DBinsert</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=delete">DBdelete</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=dropdown">dropdown</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="?menu=zimmer">zimmer</a>
            </li>
            </ul>
        </div>
    </nav>
  </body>
  <main class="container">
    <div class="">
    <?php
        if (isset($_GET["menu"])) 
        {
            switch ($_GET["menu"]) 
            {
            case "wortteil":
                include ("Textsearch.php");
                break;
            case "inhalt":
                include ("DBInhalt.php");
                break;
             case "update":
                    include ("DBupdate.php");
                    break;
            case "inserts":
                        include ("inserts.php");
                        break;
             case "dropdown":
                            include ("dropdown.php");
                            break;
             case "zimmer":
                         include ("zimmer.php");
                         break;
             case "delete":
                        include ("DBdelte.php");
                         break;
            default:
                include ("home.php");
            }
        } else 
        {
            include ("home.php");
        }
        ?>
    </div>
  </main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>