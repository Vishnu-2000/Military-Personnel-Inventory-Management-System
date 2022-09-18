function buttononclick()
{
    var a=document.getElementsByName("Fn")[0].value;
    var b=document.getElementsByName("Ln")[0].value;
    var c=document.getElementsByName("Date")[0].value;
    var d=document.getElementsByName("Gender")[0].value;
    var e=document.getElementsByName("Pob")[0].value;
    var f=document.getElementsByName("Place")[0].value;
    var g=document.getElementsByName("Equip")[0].value;
    var h=document.getElementsByName("R_Name")[0].value;
    var b=document.getElementsByName("Grade")[0].value;

    if(a.trim()=="" || b.trim()=="" || c.trim()=="" || d.trim()=="" || e.trim()=="" || f.trim()=="" || g.trim()=="" || h.trim()=="" || i.trim()=="")
    {
        return false;
    }
    else{
        return true;
    }

}