document.addEventListener("keydown", keydown_ivent);
function keydown_ivent(e) {
    let redirectTo = "";

    switch (e.key) {
        case "ArrowLeft":
            redirectTo = document.getElementById("next");
            break;
        case "ArrowRight":
            redirectTo = document.getElementById("prev");
            break;
        default:
            redirectTo = null;
    }
    if (redirectTo === null) {
        console.log("undefined key event");
    } else {
        location.href = redirectTo.href;
    }
    return false;
}
