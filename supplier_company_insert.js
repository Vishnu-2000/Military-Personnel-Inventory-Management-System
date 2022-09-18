function buttononclick()
{
    var x=document.getElementsByName("Company")[0].value;
    var y=document.getElementsByName("Country")[0].value;
    var z=document.getElementsByName("Date")[0].value;
    if(x.trim()=="" && y.trim()=="" && z.trim()=="")
    {
        return false;
    }
    else if(x.trim()=="")
    {
        return false;
    }
    else if(y.trim()=="")
    {
        return false;
    }
    else if(z.trim()==""){
        return false;
    }
    else
    {
        return true;
    }

}