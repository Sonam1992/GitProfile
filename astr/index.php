<?php
    session_start();
    include 'functions.inc.php';
    $currenttime = time();
    if (empty($_SESSION['userid'])) {
        header("Location: signin.php");
        exit();
    } elseif ($currenttime > $_SESSION["expire"]) {
        session_unset();
        session_destroy();
        header("Location: signin.php");
        exit();
    }
?>


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
    <!-- New Ones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/31149d48b0.js" crossorigin="anonymous"></script>
    <!-- Java Script -->
    <link rel="stylesheet" href="cust/main/script.js">
    <script src="https://cdn.jsdelivr.net/npm/papaparse@5.2.0/papaparse.min.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- For Icons In Footer -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- HighChart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<style>
    .progress_container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }


    .progress-bar__container {
        width: 100%;
        height: 1rem;
        border-radius: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.5s;
        will-change: transform;
        box-shadow: 0 0 5px #000000;
    }

    .progress-bar {
        position: absolute;
        height: 100%;
        width: 100%;
        content: "";
        background-color: #7d7978;
        top: 0;
        bottom: 0;
        left: -100%;
        border-radius: inherit;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-family: sans-serif;
    }

    .progress-bar__text {
        display: none;
    }
</style>

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
                        <form method="POST" class="text-center">
                            <button class="btn" name="logout">Logout</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Uploaddata">Uploaddata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardv1.php">Dashboard-V1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardv2.php">Dashboard-V2</a>
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

    <!-- Upload Data -->
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <section id="Uploaddata">
            <div class="container">
                <h1 class="text-center">Upload Data</h1>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "Failedtablemissmatch") {
                            echo "<p class='text-center' style = 'color: #ad2c0c;font-weight: bold;' > Upload Failed! Table Miss Matched</p>";
                        } else if ($_GET["error"] == "Failedtablemissmatch") {
                            echo "<p> Upload Failed !</p>";
                        } else if ($_GET["error"] == "UploadSuccessful") {
                            // Need to Redirect to Index.html
                            echo "<p class='text-center' style = 'color: #1bab31;font-weight: bold;'> Upload Successfull.</p>";
                        } else if ($_GET["error"] == "Failed") {
                            // Need to Redirect to Index.html
                            echo "<p class='text-center' style = 'color: #ad2c0c;font-weight: bold;' >Upload Failed. Unknown error.</p>";
                        }else if ($_GET["error"] == "dateissue") {
                            // Need to Redirect to Index.html
                            echo "<p class='text-center' style = 'color: #ad2c0c;font-weight: bold;' >Upload Failed. Upload Date cannot be in future.</p>";
                        }
                    }
                ?>
                <!-- <div class="progress_container">
                    <div class="progress-bar__container">
                        <div class="progress-bar">
                            <span class="progress-bar__text">Uploaded Successfully!</span>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <!-- Adding the New Date Picker for the user -->
                    <div class="col mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">Upload Date</h4>
                                <input type="date" id="datepicker" name="uploadDate">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">Project</h4>
                                <select id="level1" name="project">
                                    <option>Loading...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">Tower</h4>
                                <select id="level2" name="tower">
                                    <option>Loading...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">SBU</h4>
                                <select id="level3" name="SBU">
                                    <option>Loading...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">Table</h4>
                                <select id="level4" name="table_name">
                                    <option>Loading...</option>
                                </select>
                                <div class="button-cont">
                                    <button class="button button2" name="download_button" value='templet'>Download Templet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="card uploadOptions">
                            <div class="card-body">
                                <h4 class="upload-title mt-3">Upload Data</h4>
                                <input type="file" id="csvFileInput" style="padding-bottom : 0px" accept=".csv" name="Upload_File">
                                <div class="button-cont">
                                    <button class="button button2" type="submit" name="submit_button" value='upload'>Upload Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!-- Table for Upload Data -->
    <section class="uploadTable">
        <div class="outer-wrapper-table">
            <div class="table-wrapper">
                <table id="csvRoot" class="center"></table>
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
    document.getElementById('datepicker').valueAsDate = new Date();
    const header = document.querySelector('.navbar');
    window.onscroll = function() {
        var top = window.scrollY;
        if (top >= 100) {
            header.classList.add('navbarDark');
        } else {
            header.classList.remove('navbarDark');
        }
    }
</script>
<script>
    // call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "data.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    //sending ajax request
    ajax.send();

    //receiving response from data.php

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // converting JSON Back to an array
            var data = JSON.parse(this.responseText);
            var myData = [];
            for (var i = 0; i < data.length; i++) {
                var temp = [];
                for (var k in data[i]) {
                    // console.log('Repeated')
                    // console.log(temp);
                    if (!temp.includes(data[i][k]) || data[i][k] == 'Overall') {
                        temp.push(data[i][k]);
                    }
                }
                myData.push(temp);
            }
            // Here is the completed data base
            // console.log("1");

            function makeDropDown(data, filtersAsArray, targetElement) {

                const filteredArray = filterArray(data, filtersAsArray);
                const uniqueList = getUniqueValues(filteredArray, filtersAsArray.length);
                populateDropDown(targetElement, uniqueList);
            }

            function applyDropDown() {
                const selectLevel1Value = document.getElementById("level1").value;
                const selectLevel2 = document.getElementById("level2");
                makeDropDown(myData, [selectLevel1Value], selectLevel2);
                applyDropDown2();
            }

            function applyDropDown2() {
                const selectLevel1Value = document.getElementById("level1").value;
                const selectLevel2Value = document.getElementById("level2").value;
                const selectLevel3 = document.getElementById("level3");
                makeDropDown(myData, [selectLevel1Value, selectLevel2Value], selectLevel3);
                applyDropDown3();
            }

            function applyDropDown3() {
                const selectLevel1Value = document.getElementById("level1").value;
                const selectLevel2Value = document.getElementById("level2").value;
                const selectLevel3Value = document.getElementById("level3").value;
                const selectLevel4 = document.getElementById("level4");
                makeDropDown(myData, [selectLevel1Value, selectLevel2Value, selectLevel3Value], selectLevel4);
                // applyDropDown4();
            }

            function afterDocumentLoads() {
                populateFirstLevelDropDown();
                applyDropDown();
            }

            function getUniqueValues(data, index) {
                const uniqueOptions = new Set();
                data.forEach(r => uniqueOptions.add(r[index]));
                return [...uniqueOptions];
            }

            function populateFirstLevelDropDown() {
                const uniqueList = getUniqueValues(myData, 0);
                const el = document.getElementById("level1");
                populateDropDown(el, uniqueList);
            }

            function populateDropDown(el, listArray) {
                el.innerHTML = "";
                listArray.forEach(item => {
                    const option = document.createElement("option");
                    option.textContent = item;
                    el.appendChild(option);
                });
            }

            function filterArray(data, filtersAsArray) {
                return data.filter(r => filtersAsArray.every((item, i) => item === r[i]));
            }

            document.getElementById("level1").addEventListener("change", applyDropDown);
            document.getElementById("level2").addEventListener("change", applyDropDown2);
            document.getElementById("level3").addEventListener("change", applyDropDown3);
            afterDocumentLoads();
            // document.addEventListener("DOMContentLoaded", afterDocumentLoads);
        }
    }
</script>
<script>
    class TableCsv {
        /**
         * @param {HTMLTableElement} root The table element which will display the CSV data.
         */
        constructor(root) {
            this.root = root;
        }

        /**
         * Clears existing data in the table and replaces it with new data.
         *
         * @param {string[][]} data A 2D array of data to be used as the table body
         * @param {string[]} headerColumns List of headings to be used
         */
        update(data, headerColumns = []) {
            this.clear();
            this.setHeader(headerColumns);
            this.setBody(data);
        }

        /**
         * Clears all contents of the table (incl. the header).
         */
        clear() {
            this.root.innerHTML = "";
        }

        /**
         * Sets the table header.
         *
         * @param {string[]} headerColumns List of headings to be used
         */
        setHeader(headerColumns) {
            this.root.insertAdjacentHTML(
                "afterbegin",
                `
            <thead>
                <tr>
                    ${headerColumns.map((text) => `<th>${text}</th>`).join("")}
                </tr>
            </thead>
        `
            );
        }

        /**
         * Sets the table body.
         *
         * @param {string[][]} data A 2D array of data to be used as the table body
         */
        setBody(data) {
            const rowsHtml = data.map((row) => {
                return `
                <tr>
                    ${row.map((text) => `<td>${text}</td>`).join("")}
                </tr>
            `;
            });

            this.root.insertAdjacentHTML(
                "beforeend",
                `
            <tbody>
                ${rowsHtml.join("")}
            </tbody>
        `
            );
        }
    }

    const tableRoot = document.querySelector("#csvRoot");
    const csvFileInput = document.querySelector("#csvFileInput");
    const tableCsv = new TableCsv(tableRoot);

    csvFileInput.addEventListener("change", (e) => {
        Papa.parse(csvFileInput.files[0], {
            delimiter: ",",
            skipEmptyLines: true,
            complete: (results) => {
                tableCsv.update(results.data.slice(1), results.data[0]);
            }
        });
    });
</script>
<script>
    const progressBarContainer = document.querySelector('.progress-bar__container');
    const progressBar = document.querySelector('.progress-bar');
    const progressBarText = document.querySelector('.progress-bar__text');

    const progressBarStates = [0, 7, 27, 34, 68, 80, 95, 100];

    let time = 0;
    let endState = 100;

    progressBarStates.forEach(state => {
        let randomTime = Math.floor(Math.random() * 3000);
        setTimeout(() => {
            if (state == endState) {
                gsap.to(progressBar, {
                    x: `${state}%`,
                    duration: 2,
                    backgroundColor: '#149132',
                    onComplete: () => {
                        progressBarText.style.display = "initial";
                        progressBarContainer.style.boxShadow = '0 0 5px #149132';
                    }
                });
            } else {
                gsap.to(progressBar, {
                    x: `${state}%`,
                    duration: 2,
                });
            }
        }, randomTime + time);
        time += randomTime;
    })
</script>

</html>