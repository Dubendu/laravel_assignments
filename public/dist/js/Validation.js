let firstnameNode;
let errNode1;
let lastnameNode;
let errNode2;
let emailNode;
let errNode3;
let passwordNode;
let errNode4;
let confpassNode;
let errNode5;
let errNode6;
let formNode;
let titleNode;
let slugNode;
let descriptionNode;
let photoNode;
let bannerNode;
let categorynameNode;
let categoryNode;
let categoryidnode;
let productnameNode;
let productpriceNode;
let productdescriptionNode;
let productstocksNode;
let productimageNode;
let productNode;

$(function(){
    firstnameNode=$("#firstname");
    errNode1=$("#err1");
    lastnameNode=$("#lastname");
    errNode2=$("#err2");
    emailNode=$("#email");
    errNode3=$("#err3");
    passwordNode=$("#password");
    errNode4=$("#err4");
    confpassNode=$("#confpassword");
    errNode5=$("#err5");
    errNode6=$("#err6");
    formNode=$('#userForm');
    firstnameNode.blur(function(){
        validate1();
    });         
    lastnameNode.blur(function(){
        validate2();
    });
    emailNode.blur(function(){
        validate3();
    });
    passwordNode.blur(function(){
        validate4();
    });
    confpassNode.blur(function(){
        validate5();
    });
    formNode.submit(()=>validateForm());

    titleNode=$("#title");
    slugNode=$("#slug");
    descriptionNode=$("#description");
    photoNode=$("#photo");
    bannerNode=$('#bannerForm');
    titleNode.blur(function(){
        validateTitle();
    });         
    slugNode.blur(function(){
        validateSlug();
    });
    descriptionNode.blur(function(){
        validateDescription();
    });
    photoNode.blur(function(){
        validatePhoto();
    });
    bannerNode.submit(()=>validateBanner());

    categorynameNode=$("#name");
    categoryNode=$("#categoryForm")
    categorynameNode.blur(function(){
        validatecategoryName();
    });
    categoryNode.submit(()=>validateCategory());

    categoryidNode=$("#category_id");
    productnameNode=$("#name");
    productpriceNode=$("#price");
    productdescriptionNode=$("#p_description");
    productstocksNode=$("#stocks");
    productimageNode=$("#image");
    productNode=$('#productForm');
    categoryidNode.blur(function(){
        validateID();
    });         
    productnameNode.blur(function(){
        validateProductName();
    });
    productpriceNode.blur(function(){
        validateproductprice();
    });
    productdescriptionNode.blur(function(){
        validateproductdescription();
    });
    productstocksNode.blur(function(){
        validateProductStocks();
    });
    productimageNode.blur(function(){
        validateProductImage();
    });
    productNode.submit(()=>validateProduct());
});



function validate1(){
    errNode1.html(" ");
    firstnameNode.css({border:'2px green solid'});
    let name=firstnameNode.val();
    if(name===""){
        errNode1.html("<b>this field is required.</b>");
        firstnameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate2(){
    errNode2.html(" ");
    lastnameNode.css({border:'2px green solid'});
    let name=lastnameNode.val();
    if(name===""){
        errNode2.html("<b>this field is required.</b>");
        lastnameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate3(){
    errNode3.html("");
    emailNode.css({border:'2px green solid'});
    let email=emailNode.val();
    let ss=email.substring(email.indexOf('@')+1);
    if(email===""){
        errNode3.html("<b>this field is required.</b>");
        emailNode.css({border:'2px red solid'});
        return false;
    }
    else if(!email.includes("@") || ss==""){
        errNode3.html("<b>Invalid email ID</b>");
        emailNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validate4(){
    errNode4.html("");
    passwordNode.css({border:'2px green solid'});
    let pass=passwordNode.val();
    let regexpress=new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])");
    if(pass===""){
        errNode4.html("<b>this field is required.</b>");
        passwordNode.css({border:'2px red solid'});
        return false;
    }
    else if(!regexpress.test(pass)){
        errNode4.html("<b>Password should be aplhanumeric with atleast one symbol from: !,@,#,$,%,^,&,*</b>");
        passwordNode.css({border:'2px red solid'});
        return false;
    }
    else if(pass.length<=8 || pass.length>12){
        errNode4.html("<b>password length should be between 8 to 12.</b>");
        passwordNode.css({border:'2px red solid'});
    }
    else
        return true;

}


function validate5(){
    errNode5.html("");
    confpassNode.css({border:'2px green solid'});
    let confpass=confpassNode.val();
    let pass=passwordNode.val();
    if(confpass===""){
        errNode5.html("<b>this field is required</b>");
        confpassNode.css({border:'2px red solid'});
        return false;
    }
    
    else if(pass!=confpass){
        errNode5.html("<b>password should be matched</b>");
        confpassNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function radio_check() {

    var x = $("input[type = 'radio']:checked");
    if (!x.length > 0) {
      $('#checkRadio').show();
      $('#checkRadio').html('Status field is required');
      return false;
    }
    else {
      $('#checkRadio').hide();
      return true;
    }
  }

function validateForm(){
    let st1=validate1();
    let st2=validate2();
    let st3=validate3();
    let st4=validate4();
    let st5=validate5();
    let st6=radio_check();
    return(st1 && st2 && st3 && St4 && St5 && st6);
}

function validateTitle(){
    errNode1.html(" ");
    titleNode.css({border:'2px green solid'});
    let name=titleNode.val();
    if(name===""){
        errNode1.html("<b>this field is required.</b>");
        titleNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateSlug(){
    errNode2.html(" ");
    slugNode.css({border:'2px green solid'});
    let name=slugNode.val();
    if(name===""){
        errNode2.html("<b>this field is required.</b>");
        slugNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateDescription(){
    errNode3.html(" ");
    descriptionNode.css({border:'2px green solid'});
    let name=descriptionNode.val();
    if(name===""){
        errNode3.html("<b>this field is required.</b>");
        descriptionNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;

}

function validatePhoto(){
    errNode4.html(" ");
    photoNode.css({border:'2px green solid'});
    let name=photoNode.val();
    if(name===""){
        errNode4.html("<b>this field is required.</b>");
        photoNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateBanner(){
    let st1=validateTitle();
    let st2=validateSlug();
    let st3=validateDescription();
    let st4=validatePhoto();
    return(st1 && st2 && st3 && St4);
}

function validatecategoryName(){
    errNode1.html(" ");
    categorynameNode.css({border:'2px green solid'});
    let name= categorynameNode.val();
    if(name===""){
        errNode1.html("<b>this field is required.</b>");
        categorynameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateCategory(){
    let st1=validatecategoryName();
    return(st1);
}


function validateID(){
    errNode1.html(" ");
    categoryidNode.css({border:'2px green solid'});
    let name= categoryidNode.val();
    if(name===""){
        errNode1.html("<b>this field is required.</b>");
        categoryidNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateProductName(){
    errNode2.html(" ");
    productnameNode.css({border:'2px green solid'});
    let name= productnameNode.val();
    if(name===""){
        errNode2.html("<b>this field is required.</b>");
        productnameNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateproductprice(){
    errNode3.html(" ");
    productpriceNode.css({border:'2px green solid'});
    let name= productpriceNode.val();
    if(name===""){
        errNode3.html("<b>this field is required.</b>");
        productpriceNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateproductdescription(){
    errNode4.html(" ");
    productdescriptionNode.css({border:'2px green solid'});
    let name= productdescriptionNode.val();
    if(name===""){
        errNode4.html("<b>this field is required.</b>");
        productdescriptionNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateProductStocks(){
    errNode5.html(" ");
    productstocksNode.css({border:'2px green solid'});
    let name= productstocksNode.val();
    if(name===""){
        errNode5.html("<b>this field is required.</b>");
        productstocksNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateProductImage(){
    errNode6.html(" ");
    productimageNode.css({border:'2px green solid'});
    let name= productimageNode.val();
    if(name===""){
        errNode6.html("<b>this field is required.</b>");
        productimageNode.css({border:'2px red solid'});
        return false;
    }
    else
        return true;
}

function validateProduct(){
    let st1=validateID();
    let st2=validateProductName();
    let st3=validateproductprice();
    let st4=validateproductdescription();
    let st5=validateProductStocks();
    let st6=validateProductImage();
    return(st1 && st2 && st3 && St4 && St5 && st6);
}