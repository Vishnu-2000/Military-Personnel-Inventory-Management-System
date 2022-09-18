function buttononclick()
{
    var x=document.getElementsByName("place")[0].value;
    var y=document.getElementsByName("base")[0].value;
    if(x.trim()=="" && y.trim()=="")
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
    else{
        return true;
    }

}