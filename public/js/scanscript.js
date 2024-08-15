const date = new Date();
let typeThing = date.getHours() <= 12?"time_in":"time_out";
function scanData() {
    return {
        logType: 'time_in',
        setLogtype(){
            this.logType = date.getHours() <= 12? "time_in":"timecanout";
        },
        dateToday(){
            return new Date().toDateString();
        }
    };
}

function domReady(fn) {
    if (
        document.readyState === "complete" ||
        document.readyState === "interactive"
    ) {
        setTimeout(fn, 1000);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

domReady(function () {
    // If found you qr code
    function onScanSuccess(decodeText, decodeResult) {
        const formContorl = document.getElementById("form-control");
        const idInput = document.createElement("input");
        const timeInput = document.createElement("input");
        const date = new Date();
        const timeString = date.toLocaleTimeString();
        const postButton = document.getElementById("postattendance");

        idInput.setAttribute("name", "student_id");
        idInput.setAttribute("value", decodeText);

        timeInput.setAttribute("name", typeThing);
        timeInput.setAttribute("value", timeString);
        formContorl.insertBefore(idInput, formContorl.children[1]);
        formContorl.insertBefore(timeInput, formContorl.children[1]);
        //go back to form csrf is needed
        postButton.click();

        formContorl.removeChild(idInput);
        formContorl.removeChild(timeInput);
        htmlscanner.pause();


    }
    document.getElementById('existbutton').addEventListener('click', ()=>{htmlscanner.resume();});

    let htmlscanner = new Html5QrcodeScanner("my-qr-reader", {
        fps: 10,
        qrbos: 250,
    });
    htmlscanner.render(onScanSuccess);
});
