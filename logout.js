document.getElementById('LogOut').onclick = function(){
    document.getElementById('LogoutConfirm').style.opacity = 0.95 ;
    document.getElementById('LogoutConfirm').style.pointerEvents = "auto";
    }
document.getElementById('yes').onclick = function(){
    document.getElementById('LogoutConfirm').style.opacity = 0 ;
    document.getElementById('LogoutConfirm').style.pointerEvents = "none";
    }
document.getElementById('no').onclick = function(){ 
    document.getElementById('LogoutConfirm').style.opacity = 0 ;
    document.getElementById('LogoutConfirm').style.pointerEvents = "none";
    }
