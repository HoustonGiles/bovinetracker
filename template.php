<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bovine Tracker</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bovine Tracker</a>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Giles Ranch</h1>
        <p>Below is a list of cattle on file.</p>
      </div>
    </div>

    <div class="container">
        <div class="row">
            <form action="index.php" method="post">
                 <input type="submit" name="active" value="Active">
                 <input type="submit" name="notactive" value="Not Active">
                 <input type="submit" name="all" value="All Cows">
            </form>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Active</th>
                        <th>Tag</th>
                        <th>Acquired</th>
                        <th>Type</th>
                        <th>Breed</th>
                        <th>Description</th>
                        <th>Weight</th>
                        <th>Dam</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cows as $key=>$cow){ ?>
                        <tr>
                            <td><?php echo $cow['active']; ?></td>
                            <td>
                                <?php
                                    if(!$cow['tag']){
                                        echo $cow['newtag'];
                                    }else{
                                        echo $cow['tag'];
                                    }
                                ?>
                            </td>
                            <td><?php echo $cow['acquired']; ?></td>
                            <td><?php echo $cow['type']; ?></td>
                            <td><?php echo $cow['breed']; ?></td>
                            <td><?php echo $cow['description']; ?></td>
                            <td><?php echo $cow['weight']; ?></td>
                            <td><?php echo $cow['tagdam']; ?></td>
                            <td><a href='/cows/editcow.php?id=<?php echo $cow['id']; ?>' class="btn btn-primary">Edit</a></td>
                            <td><a href='/cows/deletecow.php?id=<?php echo $cow['id']; ?>' class="btn btn-danger" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-title="Are you sure?" data-content=" This cannot be undone!">Delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        <footer>
            <p>&copy; Giles Ranch 2015</p>
        </footer>
    </div> <!-- /container -->
    <script type="text/javascript">
        $('[data-toggle="popover"]').popover();
    </script>
  </body>
</html>