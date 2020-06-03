// QRCODE reader Copyright 2011

var gCtx = null;
var gCanvas = null;
var c = 0;
var stype = 0;
var gUM = false;
var webkit = false;
var moz = false;
var v = null;

var imghtml =
    '<div id="imghelp">Si la cam ou le scanner ne fonctionne pas glisser ici le QRCode' +
    '<br>Ou selectionner le depuis le stockage' +
    '<input type="file" onchange="handleFiles(this.files)"/>' +
    '</div>' +
    '</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
}

function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
}

function drop(e) {
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var files = dt.files;
    if (files.length > 0) {
        handleFiles(files);
    } else
        if (dt.getData('URL')) {
            qrcode.decode(dt.getData('URL'));
        }
}

function handleFiles(f) {
    var o = [];

    for (var i = 0; i < f.length; i++) {
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

                qrcode.decode(e.target.result);
            };
        })(f[i]);
        reader.readAsDataURL(f[i]);
    }
}

function initCanvas(w, h) {
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if (stype != 1)
        return;
    if (gUM) {
        try {
            gCtx.drawImage(v, 0, 0);
            try {
                qrcode.decode();
            } catch (e) {
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        } catch (e) {
            console.log(e);
            setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function read(a) {
    var html = "";
    if (a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
        html += "<a target='_blank' href='" + a + "'>" + a + "</a>";

    html += "<b>" + htmlEntities(a) + "</b>";
    document.getElementById("apo").value = htmlEntities(a);
    document.getElementById("result").innerHTML = "Code Apgogée : " + html;
    document.getElementById("pre").innerHTML = "Présent";

    if (htmlEntities(a) === 'error decoding QR Code') {
        document.getElementById("pre").innerHTML = "Erreur";
    }

    if (document.getElementById("pre").textContent == "Présent") {
        sleep(300).then(() => {
            document.getElementById("up").click();
            document.getElementById("webcamimg").click();
        });
    }
}

function isCanvasSupported() {
    var elem = document.createElement('canvas');
    return !!(elem.getContext && elem.getContext('2d'));
}

function success(stream) {

    v.srcObject = stream;
    v.play();

    gUM = true;
    setTimeout(captureToCanvas, 500);
}

function error(error) {
    gUM = false;
    return;
}

function load() {
    if (isCanvasSupported() && window.File && window.FileReader) {
        initCanvas(800, 600);
        qrcode.callback = read;
        setwebcam();
    } else {
        document.getElementById("mainbody").style.display = "inline";
        document.getElementById("mainbody").innerHTML = '<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>' +
            '<br><p id="mp2">sorry your browser is not supported</p><br><br>' +
            '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
    }
}

function setwebcam() {

    var options = true;
    if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
        try {
            navigator.mediaDevices.enumerateDevices()
                .then(function (devices) {
                    devices.forEach(function (device) {
                        if (device.kind === 'videoinput') {
                            if (device.label.toLowerCase().search("back") > -1)
                                options = {
                                    'deviceId': {
                                        'exact': device.deviceId
                                    },
                                    'facingMode': 'environment'
                                };
                        }
                        console.log(device.kind + ": " + device.label + " id = " + device.deviceId);
                    });
                    setwebcam2(options);
                });
        } catch (e) {
            console.log(e);
        }
    } else {
        console.log("no navigator.mediaDevices.enumerateDevices");
        setwebcam2(options);
    }

}

function setwebcam2(options) {
    console.log(options);
    document.getElementById("result").innerHTML = " Scan en cours ...";
    document.getElementById("pre").innerHTML = "";

    if (stype == 1) {
        setTimeout(captureToCanvas, 500);
        return;
    }
    var n = navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v = document.getElementById("v");

    if (n.mediaDevices.getUserMedia) {
        n.mediaDevices.getUserMedia({
            video: options,
            audio: false
        }).
            then(function (stream) {
                success(stream);
            }).catch(function (error) {
                error(error)
            });
    } else
        if (n.getUserMedia) {
            webkit = true;
            n.getUserMedia({
                video: options,
                audio: false
            }, success, error);
        } else if (n.webkitGetUserMedia) {
            webkit = true;
            n.webkitGetUserMedia({
                video: options,
                audio: false
            }, success, error);
        }

    document.getElementById("qrimg").style.opacity = 0.2;
    document.getElementById("webcamimg").style.opacity = 1.0;

    stype = 1;
    setTimeout(captureToCanvas, 500);
}

function setimg() {
    document.getElementById("result").innerHTML = "";
    document.getElementById("pre").innerHTML = "";

    if (stype == 2)
        return;

    stype = 2;
    document.getElementById("outdiv").innerHTML = imghtml;
    document.getElementById("qrimg").style.opacity = 1.0;
    document.getElementById("webcamimg").style.opacity = 0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);
    qrfile.addEventListener("dragover", dragover, false);
    qrfile.addEventListener("drop", drop, false);
}