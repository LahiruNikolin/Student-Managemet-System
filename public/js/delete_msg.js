function myFunction() {
    var txt;
    var r = confirm("do you want delete this account!");
    if (r == true) {
        txt = "You chose OK!";

        document.getElementById("delStForm").submit(); 
    } else {
        txt = "You Cancelled!";
    }
    document.getElementById("conf").innerHTML = txt;
}