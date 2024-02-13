function popup(popup_name){
    get_popup =document.getElementById(popup_name);
    if(get_popup.style.display=="flex"){
        get_popup.style.display="none";
    }
    else{
        get_popup.style.display="flex";
    }
}

const video = document.getElementById("myVideo");

function skipBackward() {
  video.currentTime -= 10;
}

function skipForward() {
  video.currentTime += 10;
}


