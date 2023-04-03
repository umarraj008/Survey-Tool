
function notification(message) {
    var notifCheck = document.getElementById("notification-container");
    
    if (notifCheck == null) {
        var notif = createNotification(message);
        document.getElementsByTagName("header")[0].appendChild(notif);
        // console.log("Created");
        window.setTimeout(() => {
            // console.log("fading");
            document.getElementById("notification-container").style.opacity = 0;
            window.setTimeout(() => {
                // console.log("deleted");
                document.getElementById("notification-container").parentNode.removeChild(document.getElementById("notification-container"));
            }, 1000);
        }, 3000);
    }
}

function createNotification(text) {
    var container = document.createElement("div");
    container.setAttribute("id", "notification-container");
    container.style.opacity = 1;

    var innerContainer = document.createElement("div");
    innerContainer.setAttribute("id", "inner-container");

    var message = document.createElement("h3");
    message.setAttribute("id", "message");
    message.innerHTML = text;

    innerContainer.appendChild(message);
    container.appendChild(innerContainer);
    
    return container;
}
