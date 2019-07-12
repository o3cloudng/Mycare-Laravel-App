
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MYCARE ADMIN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style/bootstrap-select.min.css">
   
    <!-- Custom styles for this template -->
    <link href="css/style/style.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
<div id="main" class="mt-5">
    <section>
        <div class="container">
          <div class="row">
            <div class="col-md-4 ml-5"><a href="/subscription"><img class="rounded mr-5" src="img/svg/logo.svg" /></a>  Hi +234 8045654325,</div>
            <div class="col-md-2 mt-2"></div>
            <div class="col-md-1 mt-2 pull-right"><small>3 Services </small></div>
            <div class="col-md-1 mt-1">
                <span class="pull-right">
                  <form name="form1">
                    <select name="jumpmenu" class="selectpicker bg-light list-inline" onChange="jumpto(document.form.jumpmenu.options[document.form1.jumpmenu.options.selectedIndex].value)" style="width: 60px !important;">
                      <option value="mybp">MYBP</option>
                      <option value="mybg">MYBG</option>
                      <option value="mybump">MYBUMP</option>
                    </select>
                  </form>
                    <!-- <select name="menu" id="menu_jump" class="selectpicker bg-light list-inline" style="width: 60px !important;" OnChange="location.href=menu.options[selectedIndex].value">
                      <option value="/mybp">MYBP</option>
                      <option value="/mybg">MYBG</option>
                      <option value="/mybump">MYBUMP</option>
                    </select> -->
                </span>
            </div>
            <div class="col-md-3 text-right mt-2"><img src="img/svg/icons/settings.svg" id="cog" />  <small>Settings</small></div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
            <div class="row">
              <div class="col-md-3 shadow text-center my-3 ml-5 mybox">
                <img src="img/svg/mybp.svg" class="my-4" />
                <h3>My Blood Pressure</h3>
                <p class="p-2">My Blood Pressure (MYBP) 
                    Monitor your blood pressure and avoid the risk of Hypertension</p>
                    <p>
                        <a href="dashboard" class="btn btn1 btn-warning">Continue</a>
                      </p>
              </div>
              <div class="col-md-3 shadow offset-md-1 text-center my-3 mybox">
                <img src="img/svg/mybg.svg" class="my-4" />
                <h3>My Blood Glucose</h3>
                <p class="p-2">My Blood Glucose (MYBG) 
                    Monitor your blood glucose level and avoid the risk of Diabetes</p>
                    <p>
                        <a href="mybg" class="btn btn1 btn-info">Continue</a>
                      </p>
              </div>
              <div class="col-md-3 shadow offset-md-1 text-center my-3 mybox">
                <img src="img/svg/mybump.svg" class="my-4" />
                  <h3>MYBUMP</h3>
                  <p class="p-2">My BUMP 
                      Important and regular updates for you during pregnancy.
                    </p>
                    <p>
                      <a href="mybump" class="btn btn1 btn-success mt-2">Continue</a>
                    </p>
                </div>
            </div>
        </div>
        
      </section>
</div>

<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0">
  <div class="container">
      
  </div>
</main> -->

<!-- <footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/bootstrap-select.min.js"></script>


    </body>
</html>
