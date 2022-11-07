<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Sobha Business Excellence</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- linking css file -->
<link rel="stylesheet" href="style.css">
<!-- bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- font awesome -->
<script src="https://kit.fontawesome.com/de99b4da04.js" crossorigin="anonymous"></script>
</head>

    <body>
      <nav class="navbar navbar-expand-lg fixed-top navbarScroll">
        <div class="container">
            <a class="navbar-brand" href="https://www.sobharealty.com/">Sobha Constructions</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#SignIn">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#SignIn">Dashboards</a>
                    </li>
                </ul>
              </div>
          </div>
      </nav>

       <!-- main banner -->
     <section class="bgimage" id="home">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero-text">
                <!-- <h2 class="hero_title">Sobha Business Excellence</h2>
                <p class="hero_desc">This Webpage is Intended to house the Business Intellengence efforts. The page will help the user to upload the data to a data base which inturn will be used to create reporting structures.</p> -->
            </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h1 class="text-center">Website Features</h1>
            <div class="row">
                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class="fas servicesIcon fa-cloud-upload"></i>
                            <h4 class="card-title mt-3">Data Upload</h4>
                            <p class="card-text mt-3">The data for each project will be uploaded by different departments involved in the form of specific templates which will then be processed further for visualization.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class='fas servicesIcon fa-database'></i>
                            <h4 class="card-title mt-3">Data Storage</h4>
                            <p class="card-text mt-3"> The data uploaded will be stored in the database for all future needs and requirements in order to have it accessible as and when necessary.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class='far servicesIcon fa-check-circle'></i>
                            <h4 class="card-title mt-3">Data Wrangling</h4>
                            <p class="card-text mt-3">The data will be transformed, mapped and cleaned into another format with the intent of making it more appropriate and valuable for a variety of downstream purposes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class='fas servicesIcon fa-pie-chart'></i>
                            <h4 class="card-title mt-3">Data Visualization</h4>
                            <p class="card-text mt-3"> The stored data from various departments will be connected to Power BI and then it will be visualized in the form of “Interactive Dashboards” as per the formats shared by departments in line with HOD's.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class='fas servicesIcon fa-desktop'></i>
                            <h4 class="card-title mt-3">Reporting Structure</h4>
                            <p class="card-text mt-3">Each department will have their own sub selections which can be used to navigate from one report to another. All these sub selections will have a filter option for both Projects & SBU's based on the applicability.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-3">
                    <div class="card servicesText">
                        <div class="card-body">
                            <i class='fas servicesIcon fa-road'></i>
                            <h4 class="card-title mt-3">Future</h4>
                            <p class="card-text mt-3"> Even though there is no direct analytics and forecast involved, the aim is to provide detailed Insights, Trends, Analytics & Forecasts along with risk factors. The platform will be made sustainable and most of the manual entries for tracking progress will be made autonomous / semi autonomous.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="SignIn">
        <div class="container">
            <h1 class="text-center">Sign in</h1>
            <?php 
                if (isset($_GET["error"])) {
                if ($_GET["error"] == "Notfound") {
                    echo "<h4>User Not Found </h4>";
                } else if ($_GET["error"] == "loginfailed") {
                    echo "<h4> Login Failed Incorrect Password</h4>";
                } else if ($_GET["error"] == "Loggedin") {
                    header("Location: index.php");
                }
                else if ($_GET["error"] == "emptyinput") {
                    echo "<h4> Please enter User ID and Password</h4>";
                }
                }
            ?>
            <div class="row">
                <div class="col-lg-12 mt-4"></div>
                    <div class="card signinIcon">
                        <div class="form-body">
                            <form class= 'formClass' action="login.inc.php" method="post">
                                <label>Employee ID</label>
                                <input type="text" name="emp_id" placeholder="EMP ID....">
                                <label>Password</label>
                                <input type="password" name="pwd" placeholder="Password....">
                                <button type="submit" class="button button2"name="signin-submit">Log in</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section-->
    <footer id="footer">
        <div class="container-fluid">
            <!-- social media icons -->
            <div class="social-icons mt-4">
                <a href="#home"><i class="fab fa-facebook"></i></a>
                <a href="#home"><i class="fab fa-youtube"></i></a>
                <a href="#home"><i class="fab fa-linkedin"></i></a>
                <a href="#home"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
  </body>

  <script>
    const header = document.querySelector('.navbar');
    window.onscroll = function() {
        var top = window.scrollY;
        if(top >=100) {
            header.classList.add('navbarDark');
        }
        else {
            header.classList.remove('navbarDark');
        }
    }
  </script>
</html>