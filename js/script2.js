function show(){
    var mdp=document.getElementById("mdp");
    if(mdp.checked==1){
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("password-confirm").setAttribute("type","text");
    }
    else{
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("password-confirm").setAttribute("type","password");
    }
}



