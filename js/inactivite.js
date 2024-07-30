var inactivityTime = function(){
    var time;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;
    window.ontouchstart = resetTimer;
    window.onclick = resetTimer;
    window.onkeypress = resetTimer;
    window.addEventListener('scroll', resetTimer, true);

    function logOut() {
        alert("Vous êtes inactif depuis trop longtemps. Vous allez être déconnecté.");
        window.location.replace('../pages/logadmin.pages.php');
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(logOut, 180000);
    }
};

inactivityTime();
