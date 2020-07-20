let modal = document.getElementById('authModal');
let modalButtons = document.getElementsByClassName('modalButton');
let search = document.getElementById('title');
let exportBtn = document.getElementById('export');
let table = document.getElementById('table');
let closeButton = document.getElementById('closeButton');
var body = document.getElementsByTagName("BODY")[0];
let codeButton = document.getElementById('codeButton');
var codeFromText, id;
var message ;

codeButton.addEventListener('click', () => {
    var inputCode = document.getElementById('inputCode').value;
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState ==4 && this.status ==200)
            {
                // console.log(this.responseText);
                if(this.responseText == "1"){
                    alert("Success");
                    window.location.href = "single-patient.php?patient_id="+id;
                }else{
                     alert("Please  enter the correct code");
                }
            
            }
        };
        xmlhttp.open("GET",`code.php?patient_id=${id}&inputCode=${inputCode}`, true);
        xmlhttp.send();
        return false;
    });


closeButton.addEventListener('click', () => {
    modal.style.display = 'none';
    table.style.visibility = 'visible';
    title.style.visibility = 'visible';
    exportBtn.style.visibility = 'visible';
});

for (let modalButton of modalButtons) {
    modalButton.addEventListener("click", () => {
        modal.style.display = 'block';
        title.style.visibility = 'hidden';
        table.style.visibility = 'hidden';
        exportBtn.style.visibility = 'hidden';
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState ==4 && this.status ==200)
            {
                codeFromText = this.responseText;
                 console.log(codeFromText);
            }
        };


        id = modalButton.id;
        console.log(id);
        xmlhttp.open("GET",`sms.php?patient_id=${modalButton.id}`, true);
        xmlhttp.send();
    });
}