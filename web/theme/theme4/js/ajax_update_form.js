function getHttpRequest() {
   var receiveReq = false;
   if(window.XMLHttpRequest) {
       return new XMLHttpRequest();
   }else if(window.ActiveXObject) {
       try{
           return new ActiveXObject("Microsoft.XMLHTTP");
       }catch(e) {
           return new ActiveXObject("Msxml2.XMLHTTP");
       }
   }
}
function check_data(email,user) {
    
    var cancle = false;
    
    //ducument.getElementById("msgmail").innerHTML = "Now is Loading..";
    //document.getElementById("msgmail").innerHTML = "Hello world";
    
    if(cancle == false ) {
        var url = '/yii2basic/controllers/verifemail.php';
        var pmeters = "tEmail=" + encodeURI(email) + "&tUser_id=" + encodeURI(user);
        
        receiveReq = new getHttpRequest();
        receiveReq.open("POST",url,true);
        receiveReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        receiveReq.setRequestHeader("contect-length",pmeters.length);
        receiveReq.setRequestHeader("connection","close");
        receiveReq.send(pmeters);
        
        receiveReq.onreadystatechange = function() {
            if(receiveReq.readyState == 3 ) {
                
                document.getElementById("msgmail").innerHTML = "new is loading";
                
            }
            if(receiveReq.readyState == 4 ) {
                if(receiveReq.status == 200) {
                    
                    document.getElementById("msgmail").innerHTML = receiveReq.responseText;
                }
                
                
            }
            
        }
    }
    
    return false;
}
