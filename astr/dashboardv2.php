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
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
</head>


<style>
    /* Head */
    .head-basic {
        padding: 10px 0;
        background-color: black;
        color: #fff;
        height: 5vh;
    }

    .head-basic ul {
        padding: 0;
        list-style: none;
        text-align: center;
        font-size: 1em;
        line-height: 2vh;
        margin-bottom: 0;
    }

    .head-basic li {
        padding: auto;
    }

    .head-basic ul a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }

    .head-basic ul a:hover {
        opacity: 1;
    }

    /* Footer Making */
    .footer-basic {
        padding: auto;
        background-color: gray;
        color: #fff;
        height: 5vh;
    }

    .footer-basic ul {
        padding: 0;
        /* list-style: none; */
        text-align: center;
        font-size: 0.7em;
        line-height: 1vh;
        margin-bottom: 0;
    }

    .footer-basic li {
        padding: 0 1.5em;
    }

    .footer-basic ul a {
        color: inherit;
        text-decoration: none;
        opacity: 0.8;
    }

    .footer-basic ul a:hover {
        opacity: 1;
    }

    .footer-basic .social {
        text-align: center;
        padding-bottom: 15px;
        padding-top: 15px;

    }

    .footer-basic .social>a {
        font-size: 1.5em;
        width: 30px;
        height: 20px;
        line-height: 10px;
        display: inline-block;
        /* text-align: center;
        border-radius: 100%;
        border: 1px solid #fff; */
        margin: 0 1em;
        color: inherit;
        opacity: 0.75;

    }

    .footer-basic .social>a:hover {
        opacity: 0.9;
    }

    .list-inline {
        /* background-color: red; */
        margin-left: 50%;
    }
</style>

<style>
    /* Dashboard */
    /* Dashboard */
    .box {
        background-color: black;
        /* height: 85vh; */
        padding: 0.3em 0.3em 0.3em 0.3em;
    }
</style>
<body>
    <div class="box">
        <div pbi-resize="powerbi" pbi-resize-src="https://app.powerbi.com/reportEmbed?reportId=622219d6-65a9-47a9-b26f-fd0ffb655fd6&amp;autoAuth=true&amp;ctid=48affa70-828c-4a3a-8c85-381663b7463b&amp;config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLWV1cm9wZS1ub3J0aC1iLXJlZGlyZWN0LmFuYWx5c2lzLndpbmRvd3MubmV0LyJ9" pbi-resize-min-width="600" pbi-default-width="600px" pbi-default-height="488" pbi-resize-width="1700" pbi-resize-height="900" pbi-resize-load-event="page-load" pbi-resize-header="true" style="position: relative;">
            <iframe frameborder="0" allowfullscreen="true"></iframe>
        </div>
        <script type="text/javascript">
            ! function() {
                if ("undefined" == typeof window.powerbiresizescript) {
                    window.powerbiresizescript = 1;
                    window.onmessage = function(event) {
                        var isReportPageLoadedEvent = function(event) {
                            try {
                                if (event && event.data && event.data.url === '/reports/undefined/events/pageChanged') {
                                    return !0
                                }
                            } catch (error) {
                                return undefined
                            }
                        };
                        if (isReportPageLoadedEvent(event)) {
                            var iframe = getIframeElement(event.source)
                            setTimeout(function() {
                                if (iframe && iframe.parentNode.children.length > 1) {
                                    switch (iframe.parentNode.getAttribute('pbi-resize-load-event')) {
                                        case 'click':
                                            showElement(iframe);
                                            break;
                                        case 'page-load':
                                        case 'seconds-timeout':
                                        case 'in-view':
                                            var button = getChildByTag(iframe.parentNode, 'div');
                                            setButtonState(button, 'readynow');
                                            break
                                    }
                                }
                            }, (iframe.parentNode.getAttribute('pbi-resize-delay-show') || 1) * 1000)
                        }
                    };

                    function getChildByTag(parent, tagName) {
                        if (parent) {
                            for (var i = 0; i < parent.children.length; i++) {
                                if (parent.children[i].tagName.toLowerCase() === tagName.toLowerCase()) {
                                    return parent.children[i]
                                }
                            }
                        }
                        return null
                    }

                    function getIframeElement(srcWindow) {
                        var frames = document.getElementsByTagName('iframe');
                        for (var i = 0; i < frames.length; i++) {
                            if (frames[i].contentWindow === srcWindow) {
                                return frames[i]
                            }
                        }
                    }

                    function showElement(iframe) {
                        if (!iframe) {
                            return
                        }
                        var parent = iframe.parentNode;
                        var button = getChildByTag(parent, 'div');
                        if (button) {
                            parent.removeChild(button)
                        }
                        var spinner = getChildByTag(parent, 'span');
                        if (spinner) {
                            parent.removeChild(spinner)
                        }
                        iframe.style.position = 'static';
                        iframe.style.visibility = 'visible';
                        var img = getChildByTag(parent, 'img');
                        if (img) {
                            parent.removeChild(img)
                        }
                    }

                    function setButtonState(button, state) {
                        button.setAttribute('data-state', state);
                        var states = [{
                            state: 'waiting',
                            text: button.getAttribute('pbi-resize-wait-txt')
                        }, {
                            state: 'loading',
                            text: button.getAttribute('pbi-resize-load-txt')
                        }, {
                            state: 'loadingnow',
                            text: button.getAttribute('pbi-resize-load-txt')
                        }, {
                            state: 'ready',
                            text: button.getAttribute('pbi-resize-rdy-txt')
                        }, {
                            state: 'readynow',
                            text: button.getAttribute('pbi-resize-load-txt')
                        }]
                        var text = '';
                        for (var i = 0; i < states.length; i++) {
                            if (states[i].state === state) {
                                text = states[i].text
                            }
                        }
                        var spinner = getChildByTag(button, 'span');
                        button.innerHTML = text + spinner.outerHTML;
                        switch (state) {
                            case 'loading':
                                button.onclick = function() {
                                    setButtonState(button, 'loadingnow')
                                }
                                button.parentNode.onclick = function() {
                                    setButtonState(button, 'loadingnow')
                                }
                                break;
                            case 'readynow':
                                resize();
                                var iframe = getChildByTag(button.parentNode, 'iframe');
                                showElement(iframe)
                                break;
                            case 'ready':
                                resize();
                                var spinner = getChildByTag(button, 'span');
                                spinner.style.display = 'none';
                                button.style.width = 'auto';
                                button.onclick = function(e) {
                                    var iframe = getChildByTag(e.target.parentNode, 'iframe');
                                    showElement(iframe)
                                }
                                button.parentNode.onclick = function(e) {
                                    var iframe = getChildByTag(e.target.parentNode, 'iframe');
                                    showElement(iframe)
                                }
                                break
                        }
                    }
                    var e = function() {
                        for (var e = document.querySelectorAll('[pbi-resize="powerbi"]'), i = 0; i < e.length; i++) {
                            e[i].style.width = '100%';
                            var actualWidth = e[i].clientWidth;
                            var contentMinWidth = e[i].getAttribute("pbi-resize-min-width");
                            var height = e[i].getAttribute('height');
                            var webImg = e[i].getAttribute('pbi-resize-img');
                            var mobileImg = e[i].getAttribute('pbi-resize-m-img') || webImg;
                            var webWidth = e[i].getAttribute("pbi-resize-width");
                            var webHeight = e[i].getAttribute("pbi-resize-height");
                            var webSrc = e[i].getAttribute("pbi-resize-src");
                            var mobileWidth = e[i].getAttribute("pbi-resize-m-width");
                            var mobileHeight = e[i].getAttribute("pbi-resize-m-height");
                            var mobileSrc = e[i].getAttribute("pbi-resize-m-src");
                            var loadEvent = e[i].getAttribute('pbi-resize-load-event');
                            var header = e[i].getAttribute('pbi-resize-header');
                            var img = getChildByTag(e[i], 'img');
                            var iframe = getChildByTag(e[i], 'iframe');
                            var currentSrc = iframe ? iframe.getAttribute('src') : null;
                            var mobileRatio = mobileWidth / mobileHeight;
                            var webRatio = webWidth / webHeight;
                            var isWebSize = actualWidth > contentMinWidth;
                            var newSrc = !(webSrc && mobileSrc) ? webSrc : (isWebSize ? webSrc : mobileSrc);
                            var resizedToWeb = ((iframe && iframe.src == mobileSrc) || (img && img.src == mobileImg)) && isWebSize && mobileSrc != webSrc;
                            var resizedToMobile = ((iframe && iframe.src == webSrc) || (img && img.src == webImg)) && !isWebSize && mobileSrc != webSrc;
                            var currentSrcIsImage = e[i].children.length > 1 ? !0 : !1;
                            if (!currentSrc) {
                                if (iframe) {
                                    iframe.style.position = 'absolute';
                                    iframe.style.top = 0;
                                    iframe.style.left = 0;
                                    iframe.style.visibility = 'hidden'
                                }
                                if (img) {
                                    img.setAttribute('src', (!isWebSize && mobileImg) ? mobileImg : webImg)
                                }
                                if ((!webImg && webSrc && isWebSize) || (!mobileImg && mobileSrc && !isWebSize)) {
                                    iframe.setAttribute('src', (!isWebSize && mobileSrc) ? mobileSrc : webSrc);
                                    showElement(iframe);
                                    resize();
                                    break
                                } else if ((webImg && webSrc) || (mobileImg && mobileSrc)) {
                                    var button = getChildByTag(e[i], 'div');
                                    setButtonState(button, 'waiting');
                                    switch (loadEvent) {
                                        case 'page-load':
                                            loadIframe(iframe.parentNode, newSrc);
                                            break;
                                        case 'seconds-timeout':
                                            var timeout = parseInt(e[i].getAttribute('pbi-resize-seconds')) * 1000;
                                            t = setTimeout(function() {
                                                loadIframe(iframe.parentNode, newSrc)
                                            }, timeout);
                                            break;
                                        case 'in-view':
                                            if (currentSrcIsImage && !iframe.src && isInViewport(img)) {
                                                loadIframe(iframe.parentNode, newSrc)
                                            }
                                            window.addEventListener('scroll', function() {
                                                if (currentSrcIsImage && !iframe.src && isInViewport(img)) {
                                                    loadIframe(iframe.parentNode, newSrc)
                                                }
                                            }, !1);
                                            break;
                                        case 'click':
                                            button.onclick = function() {
                                                loadIframe(iframe.parentNode, newSrc)
                                            }
                                            e[i].firstChild.onclick = function() {
                                                loadIframe(iframe.parentNode, newSrc)
                                            }
                                            break
                                    }
                                }
                            }
                            if ((currentSrc == webImg && !webImg && webSrc && isWebSize) || (currentSrc == mobileImg && !mobileImg && mobileSrc && !isWebSize)) {
                                showElement(iframe)
                            } else if (resizedToMobile || resizedToWeb) {
                                changeCurrentSrc(e[i].children[0], isWebSize, currentSrcIsImage ? webImg : webSrc, currentSrcIsImage ? mobileImg : mobileSrc, newSrc)
                            }
                            if (currentSrcIsImage && ((resizedToMobile && !mobileImg && mobileSrc) || (resizedToWeb && !webImg && webSrc))) {
                                showElement(iframe)
                            } else if (!currentSrcIsImage && ((resizedToMobile && mobileImg && !mobileSrc) || (resizedToWeb && webImg && !webSrc))) {
                                showElement(iframe)
                            }
                            if (img && img.parentNode) {
                                resizeElement(img, header, actualWidth, isWebSize, webRatio, mobileRatio, webHeight, mobileHeight)
                            }
                            if (iframe) {
                                resizeElement(iframe, header, actualWidth, isWebSize, webRatio, mobileRatio, webHeight, mobileHeight)
                            }
                        }
                    };

                    function resizeElement(element, header, actualWidth, isWebSize, webRatio, mobileRatio, webHeight, mobileHeight) {
                        var warn = !1;
                        if (mobileRatio && mobileHeight) {
                            var pageSize = isWebSize ? webRatio : mobileRatio;
                            var pageHeight = isWebSize ? webHeight : mobileHeight
                        } else {
                            var pageSize = webRatio;
                            var pageHeight = webHeight
                        }
                        var p169 = 16.0 / 9.0;
                        var p43 = 4.0 / 3.0;
                        var heightOffset = header.toLowerCase() == "true" ? 36 : 56;
                        if (actualWidth < 569 && pageSize === p169) {
                            element.parentNode.style.width = "568.88px";
                            element.style.width = "568.88px";
                            element.style.height = 320 + heightOffset + "px";
                            warn = !0
                        } else if (actualWidth <= 437 && pageSize === p43) {
                            element.parentNode.style.width = "426.66px";
                            element.style.width = "426.66px";
                            element.style.height = 320 + heightOffset + "px";
                            warn = !0
                        } else if (actualWidth < 320 || actualWidth / pageSize < 320 || (pageHeight < 320 && pageSize !== p169 && pageSize !== p43)) {
                            var height = Math.max(actualWidth, 320) / pageSize;
                            if (height < 320) {
                                element.parentNode.style.width = 320 * pageSize + "px";
                                element.style.width = 320 * pageSize + "px";
                                element.style.height = 320 + heightOffset + "px"
                            } else if (actualWidth < 320) {
                                element.parentNode.style.width = 320 + "px";
                                element.style.width = 320 + "px";
                                element.style.height = height + heightOffset + "px"
                            } else {
                                element.parentNode.style.width = actualWidth + "px";
                                element.style.width = actualWidth + "px";
                                element.style.height = height + heightOffset + "px"
                            }
                            warn = !0
                        } else {
                            element.parentNode.style.width = "100%";
                            element.style.width = "100%";
                            element.style.height = Math.max(element.clientWidth / pageSize, 320) + heightOffset + "px"
                        }
                        if (warn) {
                            console.warn("pbi-resize: requested iframe dimension is below the minimum supported dimensions. Minimum supported width is 320px. Minimum supported height is 376px. Change your Power BI report page size to ensure your content looks great when embedded in your web page or blog.")
                        }
                    }
                    document.addEventListener("DOMContentLoaded", e);
                    window.addEventListener("resize", e);
                    window.addEventListener("orientationchange", e);

                    function isInViewport(e) {
                        var bounding = e.getBoundingClientRect();
                        return (bounding.top >= 0 && bounding.left >= 0 && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) && bounding.right <= (window.innerWidth || document.documentElement.clientWidth))
                    };

                    function changeCurrentSrc(e, isWebSize, web, mobile, newSrc) {
                        if (web && mobile) {
                            var iframe = e.nextElementSibling;
                            if (e instanceof HTMLImageElement && iframe.src && (newSrc != iframe.src)) {
                                iframe.setAttribute('src', newSrc);
                                setButtonState(iframe.nextElementSibling, 'loading')
                            }
                            var currentSrc = isWebSize ? web : mobile;
                            e.setAttribute('src', currentSrc)
                        }
                    }

                    function resize() {
                        if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
                            var evt = document.createEvent('UIEvents');
                            evt.initUIEvent('resize', !0, !1, window, 0);
                            window.dispatchEvent(evt)
                        } else {
                            window.dispatchEvent(new Event('resize'))
                        }
                    }

                    function loadIframe(parent, src) {
                        var iframe = getChildByTag(parent, 'iframe');
                        var button = getChildByTag(parent, 'div');
                        var spinner = getChildByTag(button, 'span');
                        spinner.style.display = 'block';
                        var style = document.createElement('style');
                        style.type = 'text/css';
                        var keyFrames = '@keyframes pbi-resize-spinner {\
                0% {\
                    transform: rotate(0deg);\
                }\
                100% {\
                    transform: rotate(360deg);\
                }\
            }';
                        style.innerHTML = keyFrames;
                        document.getElementsByTagName('head')[0].appendChild(style);
                        iframe.setAttribute('src', src);
                        iframe.setAttribute('frameborder', '0');
                        iframe.setAttribute('allowFullScreen', 'true');
                        setButtonState(button, 'loading')
                    }
                }
            }();
        </script>

    </div>
</body>

<script>
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


</html>