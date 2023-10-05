 // validation for e-mail

function multicheck(srchkey,chkname)
{	
	
	var arrval=new Array();
	$('[name='+chkname+']:checked').each(function(mkey,mval)
	{
		arrval.push($(mval).val());
		
	})
	$('#'+srchkey).val(arrval.join(","));	
	
} 
 
function add_qty(ids,avlqty)
{
	var val;
	val=parseInt($('#'+ids).val());
	
	if(parseInt(val)<parseInt(avlqty))
	{
		var newqty=val+1;
		$('#'+ids).val(newqty);
		
	}
	else
	{
		alert('Only '+avlqty+' quantity available.');
		$('#'+ids).val(avlqty);
		$('#'+ids).focus();
		return false;	
	}
	
}

function rem_qty(ids,avlqty)
{
	var val;
	val=parseInt($('#'+ids).val());
	
	if(parseInt(val)>1)
	{
		var newqty=val-1;
		$('#'+ids).val(newqty);
	}
	else
	{
		$('#'+ids).val('1');
		return false;	
	}
	
	
}
 
function shoppingbag()
{
		document.crtf.submit();
}
function checkpinfr(){
	var pin;
	pin=$('#pincode').val();
	
	if(pin=='' || pin=='Enter Pincode')
	{
		$('#pinmsg').html('Please enter pin code.');
		$('#pincode').attr('style','border:1px solid #770029;');
		return false;	
	}
	else if(pin!='' || pin!='Enter Pincode')
	{
		if(isNaN(pin))
		{
			$('#pinmsg').html('Please enter 6-digit numeric value.');
			$('#pincode').attr('style','border:1px solid #770029;');
			return false;	
		}
		else if(pin.length<6 || pin.length>6)
		{
			$('#pinmsg').html('Please enter 6-digit numeric value.');
			$('#pincode').attr('style','border:1px solid #770029;');
			return false;	
		}
	}		
} 

function check_validchar(pattern,str)
{
  var re = new RegExp(pattern,"g");
  var arr = re.exec(str);
  return arr;
}

function isEmailAddr(email)
{
  var regExp	=	/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;  
  return regExp.test(email);
}
function isValidusername(email)
{
  var regExp	=	/^([a-zA-Z0-9])+$/;  
  return regExp.test(email);
}



// this function used to check valid chars
function check_validchar(pattern,str)
{
  var re = new RegExp(pattern,"g");
  var arr = re.test(str);
  return arr;
}  

function check_confirm(type){
	if(!confirm("Are you sure you want to delete this "+type+".")){
			   return false;
	 }else{
				return true;
	 }
}

function CheckBoxValid(name){

	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
		if(chObj[i].checked){
		  result	=	true;
		  break;
		}
	}
	return result;
}

function Trim(s) 
{
  // Remove leading spaces and carriage returns
  
  while ((s.substring(0,1) == ' ') || (s.substring(0,1) == '\n') || (s.substring(0,1) == '\r'))
  {
    s = s.substring(1,s.length);
  }

  // Remove trailing spaces and carriage returns

  while ((s.substring(s.length-1,s.length) == ' ') || (s.substring(s.length-1,s.length) == '\n') || (s.substring(s.length-1,s.length) == '\r'))
  {
    s = s.substring(0,s.length-1);
  }
  return s;
}


// get element value after removing leading and trailing spaces
function RemoveLTSpace(elemval)
{
     var val=elemval.replace(/\s*/,"")
     var val=val.replace(/\s*$/,"")
     return val;
}
function JSvalid_form(formnm)
{
formnm=eval(formnm);
for(var i=0;i<formnm.elements.length;i++)
     {
if(formnm.elements[i].alt){
// START CHECK FOR BLANK
var altval=formnm.elements[i].alt;
var altval1=altval.split("~DM~");
if(altval1[0]=="BC" && RemoveLTSpace(formnm.elements[i].value)=="")
          {
          formnm.elements[i].value=RemoveLTSpace(formnm.elements[i].value);
          alert("Please enter "+altval1[1]);
          formnm.elements[i].focus();
          return false;
          }
// END CHECK FOR BLANK
// VALID CHAR CHECK
if(altval1[2]!="" && formnm.elements[i].value!="")
     {
var re1 = new RegExp ('&q', 'g') ;
var pattern_val = altval1[2].replace(re1,'"') ;
var pattern="["+pattern_val+"]";
var re = new RegExp(pattern,"g");
if(re.test(formnm.elements[i].value)==true)
          {
          alert("Please avoid to enter \""+pattern_val+"\" in "+altval1[1]);
          formnm.elements[i].focus();
          formnm.elements[i].select();
          return false;
          }
     }
//START EMAIL CHECK
if(altval1[0]=="EMC")
{
if(altval1[3]!="NBC")
{
  if (formnm.elements[i].value == "")
  {
    alert("Please enter a valid email id for \"email\" field.");
    formnm.elements[i].focus();
    return (false);
  }
}
if (formnm.elements[i].value != "")
{
  if (!isEmailAddr(formnm.elements[i].value))
  {
    alert("Please enter a complete email address in the form: yourname@yourdomain.com");
    formnm.elements[i].focus();
     formnm.elements[i].select();
    return (false);
  }
  if (formnm.elements[i].value.length < 3)
  {
    alert("Please enter at least 3 characters in the \"email\" field.");
    formnm.elements[i].focus();
     formnm.elements[i].select();
    return (false);
  }
}
}
// END EMAIL CHECK
     }
}
return true;
}

// function for password match
function password_match(pass1,pass2)
{
pass1=eval(pass1);
pass2=eval(pass2);
     if(pass1.value!=pass2.value)
     {
          return false;
     }
return true;
}

// function for email match
function email_match(pass1,pass2)
{
pass1=eval(pass1);
pass2=eval(pass2);
     if(pass1.value!=pass2.value)
     {
          return false;
     }
return true;
}

// function used pop up a window

function window_popup(filename,attr1,winname)
{
     if(winname=="")
     winname="openwin";
     var popupwin=window.open(filename,winname,attr1);
}

// compare date
function date_compare(start_date,end_date)
{
//	alert(start_date);
     var stdate=start_date.split("-");
     var enddate=end_date.split("-");
     if(parseInt(stdate[0],10)>parseInt(enddate[0],10)) return false;
     if(parseInt(stdate[0],10)==parseInt(enddate[0],10) && parseInt(stdate[1],10)>parseInt(enddate[1],10)) return false;
     if(parseInt(stdate[0],10)==parseInt(enddate[0],10) && parseInt(stdate[1],10)==parseInt(enddate[1],10) && parseInt(stdate[2],10)>parseInt(enddate[2],10)) return false;

     return true;
          }
function changeBg(name){
     document.getElementById(name).style.background = '#A5A7FC';
}

function changeBg(name){
     document.getElementById(name).style.background = '#A5A7FC';
}


function NormalBg(name){
     document.getElementById(name).style.background = '#ffffff';
}
function overEffect(obj){
     obj.bgcolor = '#ffffff';
}
function validFloatDigit(key, fieldValue){
     if(key<48 || key>57){
          if(key==46)
               return fieldValue.indexOf('.')== -1 ? key : 0 ;
          else
               return 0;
     }
     else
          return key;
}

function validIntDigit(key, fieldValue){
     return  key<48 || key>57 ? 0 : key;
}

function valid_date(dd,mm,yyyy)
{
     
        if(mm==1 || mm==3 || mm==5 || mm==7 ||  mm==8 || mm==10 || mm==12)
        {
                return true;
        }
        else if((mm==4 || mm==6 || mm==9 || mm==11) && dd>30)
        {
                return false
        }
        else if(mm==2)
        {
        if(yyyy%4==0 && dd>29){return false}
        else if(yyyy%4 !=0 && dd>28){return false}
        }
        return true
}
          //function to check valid date
function check_date(from,to)
{
     var err1;
     var err2;

frmarry =     from.split('-');
toarry =     to.split('-');


HoldDate=new Date();
currdate =  (HoldDate.getMonth()+1)+ "-" + HoldDate.getDate() + "-" + HoldDate.getYear();

if (Date.parse(from) > Date.parse(currdate)) {
alert("From date must be current date or previous date !");
return false;
}

if (Date.parse(to) > Date.parse(currdate)) {
alert("To date must be current date or previous date !");
return false;
}


if(frmarry[0] == "" || frmarry[1] == "" || frmarry[2] == "")
{
     if(frmarry[0] == "") err1 = 1;
     if(frmarry[1] == "") err1 = 1;
     if(frmarry[2] == "") err1 = 1;
     if(frmarry[0] == "" && frmarry[1] == "" && frmarry[2] == "") err1 = 2;
}
else
err1 =0;

if(toarry[0] == "" || toarry[1] == "" || toarry[2] == "")
{
     if(toarry[0] == "") err2 = 3;
     if(toarry[1] == "") err2 = 3;
     if(toarry[2] == "") err2 = 3;
     if(toarry[0] == "" && toarry[1] == "" && toarry[2] == "") err2 = 4;
}
else
err2 =0;

if((err1 == 1 && err2 == 4) || (err1 == 2 && err2 == 3)||(err1 == 0 && err2 == 4) ||(err1 == 1 && err2 == 0))
{
     alert("Both dates must be entered.")
     return false;
}
else if(err1 == 1 || err2 == 3)
{
     alert ("Please select date properly");
     return false;
}

     if( err1 == '2') 
     {
          alert("Please Select From Date");
          return false;
     }

var monthval1 = month_validate(frmarry[0],frmarry[1],frmarry[2]);
if(monthval1 == '0')
return false;

var monthval2 = month_validate(toarry[0],toarry[1],toarry[2]);
if(monthval2 == '0')
return false;

if (Date.parse(from) > Date.parse(to))
{
     alert("To date must occur after the from date.");
     return false;
}
else
{
     return true;
}
}
//please do not write code in this block
// java-script Validation function ver 1.0 
     
function validateForm(formnm){
	
     formnm=eval(formnm);	 
     for(var i=0;i<formnm.elements.length;i++){
		 
          if(formnm.elements[i].id){
               // START CHECK FOR BLANK
               var idval=formnm.elements[i].id;
               var idArray=idval.split("~DM~");
               for(j=0;j<idArray.length;j++){
                    idInnerArray=idArray[j].split("~");
					
					switch(idInnerArray[0]){                         
                         case "NOBLANK" :
							  
                              if(RemoveLTSpace(formnm.elements[i].value)==""){
                                   alert(idInnerArray[1]);
								   formnm.elements[i].focus();
                                   return false;
                              }
                              break;
                          case "CHECKBOX":
								   if(!CheckBoxValid(formnm.elements[i].name)){
									  alert(idInnerArray[1]);
								  	  formnm.elements[i].focus();
									 return false;
								}							  

						  break;	     
						 case "NOBLANKQ" :
                              if(RemoveLTSpace(formnm.elements[i].value)=="" || RemoveLTSpace(formnm.elements[i].value)=="Your Answer"){
                                   alert(idInnerArray[1]);
								   formnm.elements[i].focus();
                                   return false;
                              }
                              break;
                         case "FLOAT" :
                              if(formnm.elements[i].value!=""){
								  if(!floatvalue(formnm.elements[i].value)){
									     alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 return false;
								  }
							  }
                break; 
             case "PRICE" :            
             if(formnm.elements[i].value!=""){
								  if(!validamount1(formnm.elements[i].value)){
									     alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 return false;
								  }
							  }
                break;
             
             case "PASSWORDMIN" :
             	if(formnm.elements[i].value!=""){
	             	var len;
	             	var val;
	             	val=formnm.elements[i].value;
	             	len=val.length;
	             	if(len<6){
		             	alert(idInnerArray[1]);
		             	formnm.elements[i].focus();
		             	return false;
	             	}
	             
		          }
		          break;
		                            
						 case "NUM" :
						 if(formnm.elements[i].value!=""){
								  if(!numvalue(formnm.elements[i].value)){
									     alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 return false;
								  }
							  }
                         break;  
                         case "EMAIL" :
	                        if(formnm.elements[i].value!=""){					 
                              if(!isEmailAddr(formnm.elements[i].value))     {
                                   alert(idInnerArray[1]);
                                   formnm.elements[i].focus();
                                   return false;
                              }
							}
                            break;
						case "PASS" :
	                        if(formnm.elements[i].value!=""){					 
                              if(formnm.elements[i].value.length<6)     {
                                   alert(idInnerArray[1]);
                                   formnm.elements[i].focus();
                                   return false;
                              }
						}
                        break;

						case "CONFIRMPASSWORD":
							  if(!password_match(formnm.elements[i],formnm.elements[i-1])){
								alert(idInnerArray[1]);
									 formnm.elements[i].focus();
									 formnm.elements[i].select();
									 return false;
							  }
						  break;
						case "ALPHA" :
						 if(formnm.elements[i].value!=""){	
                              if(formnm.elements[i].value.search(/\b[A-Za-z\s]+\b$/)){
                                   alert(idInnerArray[1]);
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
						 }
                         break;
                              
                         case "LOGINID" :

                              if(!isValidusername(formnm.elements[i].value)){
                                   alert(idInnerArray[1]);
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
                              break; 
						  case "URL":
						   if(formnm.elements[i].value!=""){
							   if(!checkValidURL1(formnm.elements[i].value)){
								alert(idInnerArray[1]);
								 formnm.elements[i].focus();
								 formnm.elements[i].select();
								 return false;
							   }							  
						   }
						  break;
						  case "MYIMAGE":
							 
							 if(!document.getElementById("upload_photo").checked){
								 if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[jJ][pP][gG]|.[gG][iI][fF]|.[jJ][pP][eE][gG])$/)==-1){
										alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
							  break;
							 case "DOCUMENTS":
							 if(formnm.elements[i].value!=''){
								 if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[jJ][pP][gG]|.[gG][iI][fF]|.[jJ][pP][eE][gG]|.[dD][oO][cC]|.[rR][tT][fF]|.[tT][xX][tT]|.[pP][dD][fF]|.[xX][lL][sS])$/)==-1){
									 alert(idInnerArray[1]);
									 formnm.elements[i].focus();
									 formnm.elements[i].select();
									 return false;
								 }
							}
							  break;  
							 case "EXCELFILE":
							 if(formnm.elements[i].value!=''){
								 alert(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[xX][lL][sS]|.[xX][lL][tT])$/));
								 if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[xX][lL][sS]|.[xX][lL][tT])$/)==-1){
									 alert(idInnerArray[1]);
									 formnm.elements[i].focus();
									 formnm.elements[i].select();
									 return false;
								 }
							}
							  break;    
							  
							  
						  case "IMAGE":
						  if(formnm.elements[i].value!='')
						  {
							 
							  var fileName = getFileName(formnm.elements[i].value);
							  var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
							 if(ext =="GIF" || ext=="gif" || ext =="JPG" || ext=="jpg" || ext =="JPEG" || ext=="jpeg" || ext =="PNG" || ext=="PNG")
							{
								return true;
							}
							else
							{
								alert(idInnerArray[1]);
								formnm.elements[i].focus();
								 formnm.elements[i].select();
								 return false;
							}
							 
							 
						  }
							  break;	
						  case "IMAGEEDIT":
							  if(formnm.elements[i].value!=""){
								  if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[jJ][pP][gG]|.[gG][iI][fF]|.[jJ][pP][eE][gG])$/)==-1){
										 alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
                          break;
						  case "PHOTO":
							  
							  if(formnm.elements[i].value!=""){
								  if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[jJ][pP][gG]|.[gG][iI][fF]|.[jJ][pP][eE][gG])$/)==-1){
										 alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
								if(formnm.elements[i-1].value==""){
										 alert("Please Enter Photo title");
										 formnm.elements[i-1].focus();										 
										 return false;
								}
							  }
							  
                          break;
						  case "Video":
							  if(formnm.elements[i].value=="" && formnm.elements[i+2].value==""){
										 alert("Please upload your video or add video code");
										 formnm.elements[i].focus();										 
										 return false;
							  }
							  if(formnm.elements[i].value!="" && formnm.elements[i+2].value!=""){
										 alert("Either upload video or video code");
										 formnm.elements[i].focus();										 
										 return false;
							  }		  
							  if(formnm.elements[i].value!=""){
								  if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[aA][vV][iI]|.[mM][pP][eE][gG]|.[wW][mM][vV]|.[mM][pP][eE]|.[wW][mM]|.[mM][pP][gG]|.[mM][1][vV])$/)==-1){
										 alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
							  
                          break;
						  case "PHONE" : 
						 if(formnm.elements[i].value!=""){
							  if(formnm.elements[i].value.search(/\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{2})?([0-9]{3})$/)==-1){								  
                                   alert("Please enter 10 digit phone number or +11-111-11111111 format");
                                   formnm.elements[i].focus();
                                   formnm.elements[i].select();
                                   return false;
                              }
						 }
                        break;	 
						 
						 
						  case "ACCEPT":
							   if(!formnm.elements[i].checked){
                                    alert(idInnerArray[1]);
									return false;
						       }
						   break;
						   case "USSTATE":
							   var cou=trim(formnm.elements[i-2].options[formnm.elements[i-2].selectedIndex].value,"");
							   if(cou!="" && cou=="United States"){
								   if(formnm.elements[i-4].value==""){
										alert(idInnerArray[1]);
										formnm.elements[i-4].focus(); 
										return false;
									}
						       }
						   break;
						   case "USZIP":
							   var cou=trim(formnm.elements[i-2].options[formnm.elements[i-2].selectedIndex].value,"");
							   if(cou!="" && cou=="United States"){
                                    if(formnm.elements[i-3].value==""){
										alert(idInnerArray[1]);
										formnm.elements[i-3].focus(); 
										return false;
									}
						       }
						   break;
						   case "EDITVIDEO":
						   if(formnm.elements[i].value!=""){
								  if(getFileName(formnm.elements[i].value).search(/^[0-9A-Za-z\s_ -]+(.[aA][vV][iI]|.[mM][pP][eE][gG]|.[wW][mM][vV]|.[mM][pP][eE]|.[wW][mM]|.[mM][pP][gG]|.[mM][1][vV])$/)==-1){
										 alert(idInnerArray[1]);
										 formnm.elements[i].focus();
										 formnm.elements[i].select();
										 return false;
								  }
							  }
							  
                          break;
						case "ANSWER":
							
							var nam=document.getElementsByName('size_country');							
							var c=0;
							for (var jj=0; jj < nam.length; jj++){
								if (nam[jj].checked){
									c=1;
									exit;
								}
							}
							if (c==0){
								alert('Please select size country.');	
								return false;
							}
							break;
						case "ATLEAST":
                            var chkArray=idInnerArray[1].split(",");
							var nam=document.getElementsByName(chkArray[1]);	
							
							for (var jj=0; jj < nam.length; jj++){
                               if (nam[jj].checked){
								   if(nam[jj].value=="Private"){										
										var myid=document.getElementById(chkArray[0]);
										if(myid.style.display=="block"){
											var len=myid.getElementsByTagName('input');
											
											var chkall=0;
											for(var mm=0;mm < len.length;mm++){
												if(len[mm].checked){
													chkall=1;
													break;
												}
											}

											if(chkall==0){
												alert(chkArray[2]);	
												return false;
											}
										}
								   }
							   }
							}
                            break;
							case "SETPASS":							
							var nam=document.getElementsByName('privacy');							
							
							for (var jj=0; jj < nam.length; jj++){
								if (nam[jj].checked){
									if(nam[jj].value=="Private" && document.getElementById('option1').style.display=="block"){
										if(formnm.elements[i].value=="" && !formnm.elements[i+1].checked){
											alert(idInnerArray[1]);
											formnm.elements[i].focus();                                  
											return false;
										}
									}
								}
							}
							
							break;

							case "MODEL":
							   var cou=trim(formnm.elements[i+1].value);
							   if(cou=="" && formnm.elements[i].value==""){
								  alert(idInnerArray[1]);
								  formnm.elements[i].focus(); 
								  return false;
						       }
						   break;

						   case "VERSION":
							   var cou=trim(formnm.elements[i+1].value);
								var cou2=trim(formnm.elements[i-1].value);
								

							   if(cou=="" && formnm.elements[i].value=="" ){
								  alert(idInnerArray[1]);
								  formnm.elements[i].focus(); 
								  return false;
						       }
						   break;
						   case "CITY":
							   var cou=trim(formnm.elements[i+1].value);
							   if(cou=="" && formnm.elements[i].value==""){
								  alert(idInnerArray[1]);
								  formnm.elements[i].focus(); 
								  return false;
						       }
						   break;
						   case "FINANCE":
							   var cou=trim(formnm.elements[i-1].value);
							   if(cou=="Yes" && formnm.elements[i].value==""){
								  alert(idInnerArray[1]);
								  formnm.elements[i].focus(); 
								  return false;
						       }
						   break;
                    }
               }
          }
     }
     return true;
}

function trim(str, chars) {
    return ltrim(rtrim(str, chars), chars);
}

function ltrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
    chars = chars || "\\s";
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function junkValue(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="\\\"<>~`!#%^*/][{}()";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
function junkValueForDesc(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="\\~`^][{}<>";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
function junkValueForURL(fieldValue){
     //return true if any junk character found in given value otherwise false
     if(fieldValue!=""){
     junkChar="~`^][{}<>";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}

function alphaNumeric(str){
     // return false if given string does not follow variable naming scheme
     for (i=0;i<str.length;i++){
          ascCode=str.charCodeAt(i);
         if(     (ascCode>=65 && ascCode<=90) || 
               (ascCode>=97 && ascCode<=122) || 
               (ascCode>=48 && ascCode<=57) || 
               (ascCode==95) || (ascCode==32)
            );
          else{
               //alert(ascCode);
               //alert("alphe numeric returning false");
               return false;
          }
     }
     //alert("alphe numeric returning true");
     return true;
}
function loginid(str){
     // return false if given string does not follow variable naming scheme
     for (i=0;i<str.length;i++){
          ascCode=str.charCodeAt(i);
         if(     (ascCode>=65 && ascCode<=90) || 
               (ascCode>=97 && ascCode<=122) || 
               (ascCode>=48 && ascCode<=57) || 
               (ascCode==95) 
            );
          else{
               //alert("alphe numeric returning false");
               return false;
          }
     }
     //alert("alphe numeric returning true");
     return true;
}
               

function digit(fieldValue){
     //return true if any digit found in given value otherwise false
     if(fieldValue!=""){
     junkChar="1234567890";
     for(i=0;i<junkChar.length;i++)
          if(fieldValue.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}

function fileNameLength(filePath){
     //return the length of file name from given path
     fPath= new String(filePath);
     fileName= fPath.substring(fPath.lastIndexOf('\\')+1);
     fileName=new String(fileName);
     return fileName.length;
}

function getFileName(filePath){
     //return the length of file name from given path
     fPath= new String(filePath);
     fileName= fPath.substring(fPath.lastIndexOf('\\')+1);
     //alert(fileName);
     return fileName;
}

function fileJunkValue(fieldValue){
     //return true if any junk character found in given file
     //get file name from path
     fileName=getFileName(fieldValue);
     if(fileName!=""){
     junkChar="\\\"<>'~`!@#$%^&*/";
     for(i=0;i<junkChar.length;i++)
          if(fileName.indexOf(junkChar.charAt(i))!=-1)
               return true;
     }
     return false;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function multisub()
{
     if(document.frmCat.chkconfrm.value=="")
     {
          if(validateForm(frmCat))
               return true;
          else
               return false;     
     }
     else
     {
          if(confirm("Are you sure to delete this category"))
               return true;
          else
               return false;     
     }
}
function chkdel()
{
     document.frmCat.chkconfrm.value="xyz";
}
function chkmod()
{
     document.frmCat.chkconfrm.value="";
}

function ResetForm(objForm)
{
     for(var intCounter=0;intCounter<objForm.elements.length;intCounter++)
     {
          if(objForm.elements[intCounter].type!=null)
          {
               if(objForm.elements[intCounter].type=="text")
               {
                   if(!objForm.elements[intCounter].readOnly){
						objForm.elements[intCounter].value="";
					}
               }
               else if(objForm.elements[intCounter].type=="select-one")
               {
                    objForm.elements[intCounter].selectedIndex=0;     
               }
               else if(objForm.elements[intCounter].type=="file")
               {
                    var oObject=objForm.elements[intCounter];
                    var strValue=oObject.outerHTML;     
                    var strFieldValue=oObject.value;
                    strValue=strValue.replace(strFieldValue,"");
                    oObject.outerHTML=strValue;
               }
               else if(objForm.elements[intCounter].type=="textarea")
               {
                    objForm.elements[intCounter].value="";
               }
               else if(objForm.elements[intCounter].type=="password")
               {
                    objForm.elements[intCounter].value="";
               }
            else if(objForm.elements[intCounter].type=="checkbox")
               {
                    objForm.elements[intCounter].checked=false;
               }
            else if(objForm.elements[intCounter].type=="radio")
               {
                    objForm.elements[intCounter].checked=false;
               }  
          }
     }
}

function format(txt)
{
     if(txt.search(/\d{3}\-\d{2}\-\d{4}/)==-1)
      {
        return false;
      }
      else{
          return true;
      }
}


function format1(phone1)
{
            if(phone1.search(/\d{3}\-\d{3}\-\d{4}/)==-1)
            {
              return false;
            }
            else
            {
                  return true;
            }
     
}

function length1(phone)
{
     if(phone.search(/\d{3}/)==-1)
                              {
                                return false;
                              }
                                   else{
                                   return true;
                                   }
}

function floatvalue(txt){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
  if(txt.search(/\b[0-9]*\.?([0-9]+)\b$/)==-1){	 	 
	  return false;
  }else{
	  return true;
  }
}
function numvalue(txt){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
  var pattern=/^[\d]+$/; 
  if(!pattern.test(txt)){	 	 
	  return false;
  }else{
	  return true;
  }
}

function validamount(txt){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
	 
  if(txt.search(/\d+\.\d{2}$/)==-1){	 	 
	  return false;
  }else{
	  return true;
  }
}
function validamount1(txt){
	var p=/^[0-9]*(\.)?[0-9]+$/;
 if(!p.test(txt)){
	  return false;
  }else{
	  return true;
  }
}
function intvalue(txt,field){
 //if(txt.search(/((\d+(\.\d*)?)|((\d*\.)?\d+))$/)==-1){
  if(txt.search(/\b\d+\b$/)==-1){	 	 
	  alert("Please enter a number");
      document.getElementById(field).focus();
	  return false;
  }else{
	  return true;
  }
}


function validcheck(name,action,text)
{
	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
	
		if(chObj[i].checked){
		  result=true;
		  break;
		}
	}

	if(!result){
		 alert("Please select atleast one "+text+" to "+action+".");
		 return false;
	}else if(action=='delete'){
			 if(!confirm("Are you sure you want to delete this.")){
			   return false;
			 }else{
				return true;
			 }
	}
	
	else if(action=='Sending Newsletter'){
			 if(document.getElementById('subject').value==''){
				 alert("Please enter subject.");
				 document.getElementById('subject').focus();
			   return false;
			 }else{
				return true;
			 }
	}
	
	else{
		if(action=='Send Newsletter')
		{
			
			document.getElementById('showform').style.display='block';	
			document.getElementById('subject').focus();
		}
		return true;
	}
}


function radioButtonValue(name){

	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
		if(chObj[i].checked){
		  txt2	=	chObj[i].value;
		  break;
		}
	}
	return txt2;
}

function checkall(objForm){
	len = objForm.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {
			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}
}

function cardval(s) {
// remove non-numerics
var v = "0123456789";
var w = "";
for (i=0; i < s.length; i++) {
	x = s.charAt(i);
	if (v.indexOf(x,0) != -1)
	w += x;
}
// validate number
j = w.length / 2;
if (j < 6.5 || j > 8 || j == 7) return false;
k = Math.floor(j);
m = Math.ceil(j) - k;
c = 0;
for (i=0; i<k; i++) {
a = w.charAt(i*2+m) * 2;
c += a > 9 ? Math.floor(a/10 + a%10) : a;
}
for (i=0; i<k+m; i++) c += w.charAt(i*2+1-m) * 1;
return (c%10 == 0);
}

function checkcard(card,field,payment){
	var result	=	true;
if(payment=="Visa")	{
	 if(card.length==16 && card.charAt(0)==4){
		 if(!cardval(card))
			{
			 result=false;
		  }
	 }else{
		 result=false;
	 }	 
}else if(payment=="Amex"){
	 if(card.length==15 && card.charAt(0)==3){
		 if(!cardval(card))
		  {
			 result=false;
		  }
	 }else{
		 result=false;
	 }
}else if(payment=="Discover"){
	 if(card.length==16 && card.charAt(0)==6){
		 if(!cardval(card))
		  {
			 result=false;
		  }
	 }else{
		 result= false;
	 }
}else if(payment=="MasterCard"){
	  if(card.length==16 && card.charAt(0)==5){
		 if(!cardval(card))
			{
			 result= false;
		  }
	 }else{
		 result= false;
	 }
}

	if(!result){
		 alert("Please enter the valid card number");
		 document.getElementById(field).focus();
		 return false;
	}

}

function formatNumber(num,dec,thou,pnt,curr1,curr2,n1,n2) 
{
var x = Math.round(num * Math.pow(10,dec));if (x >= 0) n1=n2='';var y = (''+Math.abs(x)).split('');var z = y.length - dec; if (z<0) z--; for(var i = z; i < 0; i++) y.unshift('0');y.splice(z, 0, pnt); while (z > 3) {z-=3; y.splice(z,0,thou);}var r = curr1+n1+y.join('')+n2+curr2;
return r;
}

function validate(frm){
	if(!validateForm(frm)){
      return false;
	}else{
         return true;	 
  	}
}

function checkValidURL1(url){
	//alert('hjdfdd');
 var expression1 = new RegExp("^(((ht|f)tp(s?))\://)?(www.|[a-zA-Z].)[a-zA-Z0-9\-\.]+\.(com|edu|gov|mil|net|org|biz|info|name|museum|us|ca|uk)(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\;\?\'\\\+&%\$#\=~_\-]+))*$", "i");
 if (!expression1.test(url)) 
  return false;
 else 
  return true;
  
}
function checkModeOfPayment(frm1){
	if(frm1.mode[0].checked==false && frm1.mode[1].checked==false && frm1.mode[2].checked==false) {
		alert("Please select Mode of Payment..");	
		frm1.mode[0].focus();
		return false;
	}

}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}

function make_request(bsurl,val){
   try{
			ob1=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				ob1=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e2){
				ob1=false;
			}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
			ob1=new XMLHttpRequest();
	}
	
   	var url=bsurl+"/cpanel/ajax.php?num="+val;
   
   
	ob1.open("GET",url,false);
	ob1.onreadystatechange=take_Response;
	ob1.send(null);
	
}

//Ajax Response
function take_Response(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
	 	if(resp=='Invalid'){
		 	alert("Please Select Number!!");
	 	}else{
   	 	document.getElementById("insbox").innerHTML=resp;
	 	}
	}
}

/*function showhide(){
	if(document.getElementById("upload_photo").checked) {
		document.getElementById("option1").style.display='none';
	} else{
		document.getElementById("option1").style.display='block';
	}
}*/
function showtext(val){
	if(val.value=="Others:"){
		val.value="";
	}

}
function hidetext(val){
	if(val.value==""){
		val.value="Others:";
	}

}


function showcommentbox(boxname){
	document.getElementById(boxname).style.display='block';
}
function cancelReply(boxname){
	document.getElementById(boxname).style.display='none';
}
function createalbum(val){
	if(val=="N"){
		document.getElementById('create').style.display='block';
	}else{
		document.getElementById('create').style.display='none';
	}

}
function showhide(show,hide){
	if(show!=''){
		document.getElementById(show).style.display='block';
	}
	if(hide!=''){
		document.getElementById(hide).style.display='none';
	}
}

function chk_unchk(val, form_name) {
   	dml=eval('document.'+form_name);
   	len=dml.elements.length;
   	var i=0;
   	for (i=0; i<len; i++) {
     	if (dml.elements[i].type == "checkbox") {
        	if (val == 1) { 
           		dml.elements[i].checked=true;
        	} 
			else {
           		dml.elements[i].checked=false;
        	}
     	}   
   	}
}
var mailArray="";
function addemail(val){
	var c=new Array();
	var value1=0;
	c=mailArray.split(",");
	for(var i=0;i<c.length;i++){
		if(c[i]==val && val!=''){
			value1=1;
			break;
		}
	}
	if(value1==0 && val!=""){
		mailArray+=val+",";
	}
	var chObj	=	document.getElementsByName('sendmailTo');
	chObj[0].value=mailArray;
}
function showfriend(d1,d2,d3){
	mailArray="";
	var chObj	=	document.getElementsByName('sendmailTo');
	chObj[0].value=mailArray;
	document.getElementById('se1').value='';
	document.getElementById('se2').value='';
	document.getElementById('se3').value='';
	if(d1!=''){
		document.getElementById('friends').style.display='block';
		document.getElementById('group1').style.display='none';
		document.getElementById('group2').style.display='none';
	}
	if(d2!=''){
		document.getElementById('friends').style.display='none';
		document.getElementById('group1').style.display='block';
		document.getElementById('group2').style.display='none';
	}
	if(d3!=''){
		document.getElementById('friends').style.display='none';
		document.getElementById('group1').style.display='none';
		document.getElementById('group2').style.display='block';
	}

}
function focuscommentbox(){
 document.getElementById('message').focus();
}
function focuson(frm){
	frm.comments.focus();
	frm.comments.className='txtfield1';
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


function getRequest(action,value,siteUrl){
	try{
			ob1=new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
				ob1=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e2){
				ob1=false;
		}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
			ob1=new XMLHttpRequest();
	}
	var url=siteUrl+"/ajax.php?val="+value+"&action="+action;

	ob1.open("GET",url,true);
	if(action=="getcity"){
		ob1.onreadystatechange=show_city;
	}else if(action=="getdealertype"){
		ob1.onreadystatechange=show_dealer;
	}else{
		ob1.onreadystatechange=show_form;
	}
	ob1.send(null);
}
function show_form(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;		
		document.getElementById('cityList').innerHTML=resp;
	}
}
function show_city(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		document.getElementById('cityList').innerHTML=resp;
	}
}

function show_dealer(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		document.getElementById('deal').innerHTML=resp;
	}
}
function chk_radio(form_name,message) {
   	dml=eval('document.'+form_name);
   	len=dml.elements.length;
   	var i=0;
	var count=0;
   	for (i=0; i<len; i++) {
     	if (dml.elements[i].type == "radio") {
        	if (dml.elements[i].checked) { 
           		count=1;
        	}     	
		}   
   	}
	if(count==0){
		alert(message);
		return false;
	}
}

/*function showhide(show,hide){
	if(show!=''){
		document.getElementById('option1').style.display='block';
	}
	if(hide!=''){
		document.getElementById('option1').style.display='none';
	}
}*/
function hide(){
	if(document.getElementById('skip').checked){
		document.getElementById('pass').style.display='none';
	}else{
		document.getElementById('pass').style.display='block';
	}
}

function openwin(file,Iwidth,Iheight) {
	var newWin1=window.open(file,'nWin2','x=0,y=0,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,copyhistory=no,width='+Iwidth+',height='+Iheight+',screenX=0,screenY=0,left=20,top=20');
}

function hideshow(show,hide){

       document.getElementById(hide).style.display='none';
		document.getElementById(show).style.display='block';
}
function taCounter(event,frmname,countername) {
	
	obj=eval('document.'+frmname);
	obj1=eval('document.'+frmname+'.'+countername);
	if (navigator.appVersion.indexOf("MSIE")!=-1){
		var taObj=event.srcElement;
	}else{
		var taObj=event.target;
	}
	if (event) obj1.value=taObj.value.length;
}

function chkaction(frm){
	count = frm.elements.length;
	var c=0;
	var d=0;
	for (i=0; i < count; i++){
		if(frm.elements[i].checked == 1 && frm.elements[i].type=="checkbox"){
			c = 1;
		}
		if(frm.elements[i].checked == 1 && frm.elements[i].type=="radio"){
			d = 1;
		}

	}
	if(c == 0){
		alert('Please select any record.');
		return false;
	}
	
	if(d == 0){
		alert('Please select any action.');
		return false;
	}
}

function show_div(show){
	document.getElementById(show).style.display='block';
}
function hide_div(show){
	document.getElementById(show).style.display='none';
}
String.prototype.contains = function(t) { 
	return this.indexOf(t) >= 0 ? true : false ;
};

function formatNumber(val){
	var len=val.length;
    
	var l=val.indexOf('.');

	if(l!=-1){
		var pre_str=val.substring(0,l);
		var str=val.substring(l+1,len);
		var len1=str.length;
		if(len1 > 2){
			var str1=str.substring(0,2);
			var total_str=parseFloat(pre_str+"."+str1);			
		}else{
			var total_str=parseFloat(pre_str+"."+str);			
		}
	}else{
		var total_str=parseInt(val);
	}
	return total_str;

}

function calculatePrice(value,frm){
	var val=frm.qty.value;
	//alert(val);
	if(isNaN(val)==true){
		alert("Quantity Must be a number");
		frm.qty.value=1;
		frm.qty.focus();
		return false;
	}
	if(val.contains('.')){
          alert('please enter integer number only');
         frm.qty.value=1;
		frm.qty.focus();
		return false;
    }

	var val1=parseInt(val);
	
	if(val1 < 1){
		alert("Quantity must be greater or equal to 1 ");
		frm.qty.value=1;
		frm.qty.focus();
		return false;
	}
	var total_area=val1*(frm.pack_size.value);
	total_area=total_area.toString();
	total_area=formatNumber(total_area);
	frm.total_area.value=total_area;

	var total_amount=frm.pricepermeter.value*total_area;
	total_amount=total_amount.toString();
	total_amount=formatNumber(total_amount);
	frm.total_qty.value=total_amount;
	return false;

}
function filldata(){
	
  var f1=document.form1;
  
  if(f1.samedel.checked==1){
	  f1.sname.value=f1.bname.value;
	  f1.saddress.value=f1.baddress.value;
	  f1.sphone.value=f1.bphone.value;
	  f1.szip.value=f1.bzip.value;
	  f1.scity.value=f1.bcity.value;
	  f1.sstate.value=f1.bstate.value;
	  f1.scountry.value=f1.bcountry.value;

  }else{
	  f1.sname.value="";
	  f1.saddress.value="";
	  f1.sphone.value="";
	  f1.szip.value="";
	  f1.scity.value="";
	  f1.sstate.value="";
	  f1.scountry.value="";
	  
  }
}

function filldata_checkout(){
	
  var f1=document.form1;
  
  if(f1.samedel.checked==1){
	  f1.sname.value=f1.bname.value;
	  f1.saddress.value=f1.baddress.value;
	  f1.sphone.value=f1.bphone.value;
	  f1.szip.value=f1.bzip.value;
	  f1.scity.value=f1.bcity.value;
	  f1.sstate.value=f1.bstate.value;
	  

  }else{
	  f1.sname.value="";
	  f1.saddress.value="";
	  f1.sphone.value="";
	  f1.szip.value="";
	  f1.scity.value="";
	  f1.sstate.value="";	  
	  
  }
}

function filldata_edit(){
	
  var f1=document.form1;
  
  if(f1.sameas.checked==1){
	  f1.sname.value=f1.bname.value;
	  f1.saddress.value=f1.baddress.value;
	  f1.sphone.value=f1.bphone.value;
	  f1.scity.value=f1.bcity.value;
	  f1.sstate.value=f1.bstate.value;
	  f1.scountry.value=f1.bcountry.value;
	  f1.szip.value=f1.bzip.value;

  }else{
	  f1.sname.value="";
	  f1.saddress.value="";
	  f1.sphone.value="";
	  f1.szip.value="";
	  f1.scity.value="";
	  f1.sstate.value="";
	  f1.scountry.value="";
	  
  }
}

function taLimit(event) {
	if (navigator.appVersion.indexOf("MSIE")!=-1){
		var taObj=event.srcElement;
	}else{
		var taObj=event.target;
	}
	if (taObj.value.length==taObj.maxLength*1) return false;
}

function taCountRegister(event,maxLength,frmname,myCounter) { 
	obj=eval('document.'+frmname);
	
	if (navigator.appVersion.indexOf("MSIE")!=-1){
		var taObj=event.srcElement;
	}else{
		var taObj=event.target;
	}
	
	if (taObj.value.length>maxLength*1) taObj.value=taObj.value.substring(0,maxLength*1);
	if (event) document.getElementById(myCounter).value=maxLength-taObj.value.length;
}
function createalbum(val){
	
	if(val=="N"){
		document.getElementById('create').style.display='block';
	}else{
		document.getElementById('create').style.display='none';
	}

}

function chk_unchk(val, form_name) {
   	dml=eval('document.'+form_name);
   	len=dml.elements.length;
   	var i=0;
   	for (i=0; i<len; i++) {
     	if (dml.elements[i].type == "checkbox") {
        	if (val == 1) { 
           		dml.elements[i].checked=true;
        	} 
			else {
           		dml.elements[i].checked=false;
        	}
     	}   
   	}
}
var mailArray="";
function addemail(val){
	var c=new Array();
	var value1=0;
	c=mailArray.split(",");
	for(var i=0;i<c.length;i++){
		if(c[i]==val && val!=''){
			value1=1;
			break;
		}
	}
	if(value1==0 && val!=""){
		mailArray+=val+",";
	}
	var chObj	=	document.getElementsByName('sendmailTo');
	chObj[0].value=mailArray;
}
function showfriend(d1,d2,d3){
	mailArray="";
	var chObj	=	document.getElementsByName('sendmailTo');
	chObj[0].value=mailArray;
	document.getElementById('se1').value='';
	document.getElementById('se2').value='';
	document.getElementById('se3').value='';
	if(d1!=''){
		document.getElementById('friends').style.display='block';
		document.getElementById('group1').style.display='none';
		document.getElementById('group2').style.display='none';
	}
	if(d2!=''){
		document.getElementById('friends').style.display='none';
		document.getElementById('group1').style.display='block';
		document.getElementById('group2').style.display='none';
	}
	if(d3!=''){
		document.getElementById('friends').style.display='none';
		document.getElementById('group1').style.display='none';
		document.getElementById('group2').style.display='block';
	}

}
function focuscommentbox(){
 document.getElementById('message').focus();
}
function focuson(frm){
	frm.comments.focus();
	frm.comments.className='txtfield1';
}

function getRate(action,value,siteUrl,mID){
	try{
			ob1=new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
				ob1=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e2){
				ob1=false;
		}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
			ob1=new XMLHttpRequest();
	}
	var url=siteUrl+"/ajax.php?val="+value+"&action="+action+"&mID="+mID;
	ob1.open("GET",url,true);
	ob1.onreadystatechange=show_rate;
	ob1.send(null);
}
function show_rate(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		
		var arr=Array();
		arr=resp.split("-");
		
		if(arr[0]==1){
			document.getElementById('rateID').innerHTML='<font color="#ee0000"><b>Thanks for rating this profile</b></font>';
		}else if(arr[0]==2){
			document.getElementById('rateID').innerHTML='<font color="#ee0000"><b>You need to login to rate this profile</b></font> ';
		}else if(arr[0]==4){
			document.getElementById('rateID').innerHTML='<font color="#ee0000"><b>You cann\'t rate your own profile</b></font> ';
		}else{
 			document.getElementById('rateID').innerHTML='<font color="#ee0000"><b>You have already rated this profile</b></font> ';
		}
	}
}


function getModel(action,value,siteUrl,type){
	try{
			ob1=new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
				ob1=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e2){
				ob1=false;
		}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
			ob1=new XMLHttpRequest();
	}
	var url=siteUrl+"/ajax.php?val="+value+"&action="+action+"&type="+type;
	//alert(url);
	ob1.open("GET",url,true);
	if(action=="getmodel"){
		ob1.onreadystatechange=show_model;
	}else if(action=="getsearchmodel" && type==1){
		ob1.onreadystatechange=show_search_model_car;
	}else if(action=="getsearchmodel" && type==4){
		ob1.onreadystatechange=show_search_model_byke;
	}else if(action=="getsearchmodel" && type==2){
		ob1.onreadystatechange=show_search_model_bus;
	}else if(action=="getsearchmodel" && type==3){
		ob1.onreadystatechange=show_search_model_truck;
	}else if(action=="getsearchversion"){
		ob1.onreadystatechange=show_search_version;
	}else{
		ob1.onreadystatechange=show_version;
	}
	ob1.send(null);
}

function show_search_model_car(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr1').innerHTML=resp;		
		
	}
}

function show_search_model(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr').innerHTML=resp;		
		
	}
}

function show_search_model_car(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr1').innerHTML=resp;		
		
	}
}

function show_search_model_byke(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr4').innerHTML=resp;		
		
	}
}

function show_search_model_bus(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr2').innerHTML=resp;		
		
	}
}

function show_search_model_truck(){
	if(ob1.readyState==4){
		//alert(ob1.responseText);
	 	var resp=ob1.responseText;		
		document.getElementById('rrrr3').innerHTML=resp;		
		
	}
}

function show_search_version(){
	if(ob1.readyState==4){		
	 	var resp=ob1.responseText;
		document.getElementById('versionList').innerHTML=resp;
	}
}
function show_model(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		document.getElementById('versionList').innerHTML='<select class="input" name="versionID" id="VERSION~Please select version~DM~"><option value="" selected="selected">---Select Version---</option></select>';
		
		document.getElementById('modelList').innerHTML=resp;
	}
}
function show_version(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		document.getElementById('versionList').innerHTML=resp;
	}
}

function show_other(val,fieldname){
	var chObj	=	document.getElementById(fieldname);	
	if(val!=""){
		chObj.disabled=true;
	}else{
		chObj.disabled=false;
		if(fieldname=='modelOther'){
			document.getElementById('versionOther').disabled=false;
		}
	}
}
function show_finance(val,fieldname){
	var chObj	=	document.getElementById(fieldname);	
	if(val=="No"){
		chObj.disabled=true;
	}else{
		chObj.disabled=false;
	}
}
function show_hide(sh){

	for (var i=1;i<=9;i++){
		if(document.getElementById('img'+i)){
			if(i==sh){
				document.getElementById('img'+i).style.display='block';
			}else{
				document.getElementById('img'+i).style.display='none';
			}
		}
	}

}

function compare(form_name){
	dml=eval('document.'+form_name);
   	len=dml.elements.length;
	
   	var i=0;
	var count1=0;
   	for (i=0; i<len; i++) {
     	if (dml.elements[i].type == "checkbox") {
        	if (dml.elements[i].checked) { 
           		count1++;
        	}
     	}   
   	}
	if(count1 < 2){
		alert('Please select atleast two vehicle to compare.');
		return false;
	}else if(count1 > 4){
		alert('You could not compare more than foue vehicles at a time.');
		return false;
	}else{
		document.cmp.submit();
		return true;
	}
}
function getCityRequest(action,value,siteUrl,catID,fieldid){
	try{
			ob1=new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
				ob1=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e2){
				ob1=false;
		}
	}
	if(!ob1 && typeof XMLHttpRequest!='undefined'){
			ob1=new XMLHttpRequest();
	}
	var url=siteUrl+"/ajax.php?val="+value+"&action="+action+"&divID="+fieldid+"&catID="+catID;	
	ob1.open("GET",url,true);
	ob1.onreadystatechange=show_search_city;
	ob1.send(null);
}

function show_search_city(){
	if(ob1.readyState==4){
	 	var resp=ob1.responseText;
		
		var arr=resp.split('^');
		var divID=arr[0];
		document.getElementById(divID).innerHTML=arr[1];
	}
}

function validate1(){
		if(document.enquiry.name.value==""){
			alert("Please enter your Name");
			document.enquiry.name.focus();
			return false;	
		}	
		if(document.enquiry.surname.value==""){
			alert("Please enter your Surname");
			document.enquiry.surname.focus();
			return false;	
		}	
		if(document.enquiry.institute.value==""){
			alert("Please enter your Institute Name");
			document.enquiry.institute.focus();
			return false;	
		}	
		if(document.enquiry.email.value==""){
			alert("Please enter your Email Id");
			document.enquiry.email.focus();
			return false;	
		}	
		if(document.enquiry.email.value.indexOf('@')==-1 || document.enquiry.email.value.indexOf('.')==-1){
			alert("Please enter the Email Correctly");
			document.enquiry.email.value="";
			document.enquiry.email.focus();
			return false;
	   }
	   	if(document.enquiry.mobile.value==""){
			alert("Please enter your Mobile No.");
			document.enquiry.mobile.focus();
			return false;	
		}	
		if(isNaN(document.enquiry.mobile.value)){
			alert("Please enter Numeric Value in Mobile Field");
			document.enquiry.mobile.value="";
			document.enquiry.mobile.focus();
			return false;	
		}	
		if(isNaN(document.enquiry.phone.value)){
			alert("Please enter Numeric Value in Phone Field");
			document.enquiry.phone.value="";
			document.enquiry.phone.focus();
			return false;	
		}	
		if(document.enquiry.interest.value==""){
			alert("Please specify your interest");
			document.enquiry.interest.focus();
			return false;	
		}	
			
		if(document.enquiry.enquiry.value==""){
			alert("Please enter your Comments");
			document.enquiry.enquiry.focus();
			return false;	
		}
	}

	
function shipping_address(){
	var frm=document.register;
	if(frm.sameaddress.checked==true){
		frm.saddress.value=frm.baddress.value;
		frm.scity.value=frm.bcity.value;
		frm.sstate.value=frm.bstate.value;
		frm.szip_code.value=frm.bzip_code.value;
		frm.scountry.value=frm.bcountry.value;	
	}
	else{
		frm.saddress.value='';
		frm.szip_code.value='';
		frm.scity.value='';
		frm.sstate.value='';
		frm.scountry.value='';	
	}
}
function MM_showHideLayers() { 
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function ValidateValue(val){
	if(isNaN(val)){
		alert("Please Enter Integer Value Only");
		return 0;	
	}
	if(val==0){
		alert("Quantity can't be zero(0)");
		return 0;
	}
	if(val<0){
		alert("Quantity can't be less than zero(0)");
		return 0;
	}
	if(val.indexOf(".")!=-1){
		alert("Please Enter Integer Value Only");
		return 0;	
	}
	return 1;
	
}
function checkcart_qty(frm){
	
	var len=frm.elements.length;
	for(var tt=0;tt<len;tt++){
		if(frm.elements[tt].type=="text"){
			if(!ValidateValue(frm.elements[tt].value)){
				frm.elements[tt].focus();
				return false;	
			}
		}
	}	
	return true;
}
function upQty(id,type,val){
	if(type=="add"){
		if(isNaN(val)){
			alert("Please enter integer value only");
			document.getElementById(id).value=1;
			return 0;	
		}
		else if(val<1){
			alert("Item quantity can't be less than one");
			document.getElementById(id).value	=	1;
			return 0;	
		}
		var s;
		var len;
		var sid;
		var stock;
		len=id.length;
		
		s=id.substr(3,len);
		sid='stock_'+s;
		

		document.getElementById(id).value	=	eval(parseInt(document.getElementById(id).value)+1);	
		var al	=	document.getElementById(id).alt;
		var arr	=	al.split('~');
	}else if(type=="sub"){
		if(val > 1){
			document.getElementById(id).value	=	eval(parseInt(val)-1);
		}else{
			alert("Item quantity can't be less than one.");
			document.getElementById(id).value	=	1;
		}	  
	}
}

function dn_chk(){
	document.getElementById("dn").style.display="block";
	document.getElementById("hn").style.display="none";	
}
function hn_chk(){
	document.getElementById("hn").style.display="block";
	document.getElementById("dn").style.display="none";
}

function showDiv(val){
	if(val=='Y'){		
		document.getElementById("passage").style.display="block";
	}
	if(val=='N'){
		document.getElementById("passage").style.display="none";
	}
}
function chk_val(frmval,frmfid){
	
	if(isNaN(frmval)){
		alert("Please enter integer value.");	
		document.getElementById(frmfid).value=1;
	}
	if(frmval<0 && frmval!=0){
		alert("Item quantity must be greater than Zero.");	
		document.getElementById(frmfid).value=1;
	}
	var s;
	var len;
	var sid;
	var stock;
	
	len=frmfid.length;
	s=frmfid.substr(3,len);
	
	sid='stock_'+s;
	stock=parseInt(document.getElementById(sid).value);
	if(frmval>=stock){
		alert("Only "+stock+" products are available in the stock.");
		document.getElementById(frmfid).value	=	stock;
		return 0;		
	}
}

function chk_display_order(frmval,frmfid){
	
	if(isNaN(frmval)){
		alert("Please enter integer value.");	
		document.getElementById(frmfid).value=1;
	}
	if(frmval%1!=0){
		alert("Please enter integer value.");	
		document.getElementById(frmfid).value=1;
	}
	if(frmval<0 && frmval!=0){
		alert("Display order value must be greater than Zero.");	
		document.getElementById(frmfid).value=1;
	}
}

function chk_qty_value(frmval,frmfid){
	
	if(isNaN(frmval)){
		alert("Please enter integer value.");	
		document.getElementById(frmfid).value=1;
		return false;
	}
	if(frmval%1!=0){
		alert("Please enter integer value.");	
		document.getElementById(frmfid).value=1;
		return false;
	}
	
	
	
}

function CheckAll_new(isCheck) {
	count = document.frm.elements.length;
    for (i=0; i < count; i++) {
	    if(isCheck==1) {
			document.frm.elements[i].checked = 1;
		}
		else {
			document.frm.elements[i].checked = 0;
		}
	}
}
function c_chk(frm){
	var count,i,flag;
	flag=1;
	count=document.frm.elements.length;
	for(i=0;i<count;i++){
		if(document.frm.elements[i].type=="checkbox"){
			if(document.frm.elements[i].checked==1){
				flag=0	
			}	
		}
	}
	if(flag==1){
		alert('Please select at least one record to delete.');
		return false;	
	}
	else{
		if(!confirm("Are you sure? You want to delete the selected records?")){
			   return false;
	 }else{
		 document.frm.submit();
	 }
	}	
}



function new_captcha(){
	var c_currentTime = new Date();
	var c_miliseconds = c_currentTime.getTime();
	document.getElementById('ver_code').src = 'captcha.php?x='+ c_miliseconds;
}


function pre_show_hide_month(val){
	if(val==1){
		document.getElementById('showdate').style.display='block';	
	}
	else{
		document.getElementById('showdate').style.display='none';	
	}	
}

function pre_show_hide_month1(val,respdiv){
	if(val==1){
		document.getElementById(respdiv).style.display='block';	
	}
	else{
		document.getElementById(respdiv).style.display='none';	
	}	
}

function counter_meta_title(pp)
{
	var len;
	var text;
	var ap;
	var mlen;
	mlen=65;
	len=pp.length;
	mlen1=mlen-len;
	document.getElementById('text_counter1').value=mlen1;
}

function counter_meta_desc(pp)
{
	var len;
	var text;
	var ap;
	var mlen;
	mlen=155;
	len=pp.length;
	mlen1=mlen-len;
	document.getElementById('text_counter2').value=mlen1;
}

function counter_meta_keyword(pp)
{
	var len;
	var text;
	var ap;
	var mlen;
	mlen=256;
	len=pp.length;
	mlen1=mlen-len;
	document.getElementById('text_counter3').value=mlen1;
}


function testimonialfrm(frm)
{
	if(frm.user_name.value=='' || frm.user_name.value=='Your Name'){
		alert("Please enter your name.");
		frm.user_name.focus();
		return false;	
	}
	if(frm.user_name.value!=''){
		if(frm.user_name.value.search(/\b[A-Za-z\s]+\b$/)){
			alert("Number and special characters are not allowed.");
			frm.user_name.focus();
			return false;		
		}	
	}
	if(frm.comments.value=='' || frm.comments.value=='Comment'){
		alert("Please enter comment.");
		frm.comments.focus();
		return false;	
	}
	
	
}

function newsletterfrm(frm)
{
	
	if(frm.email.value=='' || frm.email.value=='Enter your email address'){
		alert("Please enter email address.");
		frm.email.focus();
		return false;	
	}
	if(frm.email.value!=''){
		if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(frm.email.value)){
			}else{
				alert("Please Enter Valid Email Address!");
				frm.email.focus();
				return false;
			}
	}
}

function chk_price(val,ids)
{
	if(isNaN(val))
	{
		document.getElementById(ids).value='';	
	}	
}


function filter(srchkey,chkname)
{	
	
	var arrval=new Array();
	$('[name='+chkname+']:checked').each(function(mkey,mval)
	{
		
		arrval.push($(mval).val());
		
	})
	 
	$('#'+srchkey).val(arrval.join(","));	
	$("#listfrm").submit();
}

function filter_left(ids,val)
{
	$('#'+ids).val(val);
	$("#listfrm").submit();
}

function filter_price(fval,tval)
{
	$('#from_price').val(fval);
	$('#to_price').val(tval);
	$("#listfrm").submit();
}

function comp_frm()
{
	if ($('[name="arr_ids"]:checked').length<2) {
		alert("Please check atleast two items to compare.");
		return false;	
	}
	else
	{
		$('#frm').submit();
	}
}

function single_search(srchkey,chkval)
{		
	
	$('#'+srchkey).val(chkval);	
	$("#autopost").submit();
}

function bind_qty(size_id,product_id,url,container,btncontainer)
{
	var purchase_type;
	purchase_type=$("#purchase_type"+product_id+" option:selected").val();
	
  $.ajax({
    type: "POST",
    url: url+"ajax_resp1.php",
    dataType: "html",
    data: "sizeid="+size_id+"&product_id="+product_id+"&purchase_type="+purchase_type,
    cache:false,
    success: 
      function(data){
	      var resp_arr;
	      resp_arr=data.split("~");
	      //alert(resp_arr[1]);
        $("#"+container).html(resp_arr[0]);
        $("#"+btncontainer).html(resp_arr[1]); 
      }
    
    }); 	
  
}

function add_to_cart(size_id,product_id,qtyid,url,bag_resp)
{
	//alert(size_id+"==="+product_id+"==="+qtyid);
	var qty_selected;
	var purchase_type;
	
	qty_selected=$("#"+qtyid+" option:selected").val();
	purchase_type=$("#purchase_type"+product_id+" option:selected").val();
	
	
	$.ajax({
    type: "POST",
    url: url+"ajax_resp2.php",
    dataType: "html",
    data: "size_id="+size_id+"&product_id="+product_id+"&qty="+qty_selected+"&purchase_type="+purchase_type,
    cache:false,
    success: 
      function(data){
	       var resp_arr;
	      resp_arr=data.split("~");
	      
	      $('#total_item').html(resp_arr[0]);
	      //$('#'+bag_resp).html(resp_arr[1]);
	       $('#hrd_resp').html(resp_arr[1]);	
	      $('.trigger_msg').trigger('click');
      }
    
    }); 	
	
}


function chk_entry(frmval,frmfid){
	
	if(isNaN(frmval)){
		//alert("Please enter integer value.");	
		document.getElementById(frmfid).value='';
	}
	if(frmval%1!=0){
		//alert("Please enter integer value.");	
		document.getElementById(frmfid).value='';
	}
	if(frmval<0 && frmval!=0){
		//alert("Display order value must be greater than Zero.");	
		document.getElementById(frmfid).value='';
	}
}

function show_qtybox(ids,val,resp)
{
	var textid;
	textid="box"+ids;
	
	$('#'+resp).html('<input type="textbox" style="width:30px; padding:2px; border:1px solid red;" name="box'+ids+'" id="box'+ids+'" value="'+val+'" onBlur="update_setting_qty(\''+ids+'\',\''+textid+'\',\''+resp+'\');">');
	
	$('#box'+ids).focus();	
}

function update_setting_qty(ids,textid,resp)
{
		var txtval;
		var flag;
		
		flag=true;
		txtval=$('#'+textid).val();
		
		$.ajax({
	    type: "POST",
	    url: site_url+"admin/ajax_resp5.php",
	    dataType: "html",
	    data: "settingid="+ids+"&qty="+txtval,
	    cache:false,
	    success: 
	      function(data){
	        $("#"+resp).html(data);
	      }
	    
	    }); 	
		
		
}

function show_case_size(purchsetype,pid,container)
{
	$.ajax({
	    type: "POST",
	    url: site_url+"sales/ajax_resp6.php",
	    dataType: "html",
	    data: "purchsetype="+purchsetype+"&pid="+pid,
	    cache:false,
	    success: 
	      function(data){
	        $("#"+container).html(data);
	      }
	    
	    }); 	
}

function bind_case_qty(case_id,product_id,url,container,btncontainer)
{
	
	var purchase_type=$("#purchase_type"+product_id).val();
  $.ajax({
    type: "POST",
    url: url+"ajax_resp7.php",
    dataType: "html",
    data: "caseid="+case_id+"&product_id="+product_id+"&purchase_type="+purchase_type,
    cache:false,
    success: 
      function(data){
	      var resp_arr;
	      resp_arr=data.split("~");
	      //alert(resp_arr[1]);
        $("#"+container).html(resp_arr[0]);
        $("#"+btncontainer).html(resp_arr[1]); 
      }
    
    }); 	
  
}

function gift_wrap()
{
	if($('#gift_wrap').is(':checked')){
		window.location.href='shopping-cart.php?addgf=1';
	}
	else
	{
		window.location.href='shopping-cart.php?addgf=2';
	}	
}

function validate_brand()
{
	var brand=$('#curr_brand').val();
	if(brand=='')
	{
		alert('Please enter brand name.');	
		$('#curr_brand').focus();
		return false
	}
	else
	{
			showHint6(brand);
	}	
}

function validate_vendor()
{
	var vendor_name=$('#vendor_name').val();
	var vendor_email=$('#vendor_email').val();
	if(vendor_name=='')
	{
		alert('Please enter company name.');	
		$('#vendor_name').focus();
		return false
	}
	else if(vendor_email=='')
	{
		alert('Please enter vendor email.');	
		$('#vendor_email').focus();
		return false
	}
	else if(vendor_email!='')
	{
		if(vendor_email.indexOf('@')==-1 || vendor_email.indexOf('.')==-1){
			alert("Please enter the Email Correctly");
			vendor_email.focus();
			return false;
	   }
	   else
	   {
		  	showHint7(vendor_name,vendor_email);
	   }
	}
	else
	{
			showHint7(vendor_name,vendor_email);
	}	
}
