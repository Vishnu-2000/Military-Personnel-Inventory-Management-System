function buttononclick()
{
    var force=document.getElementsByName("Eq_type")[0].value;
    if(force.trim()=="")
    {
        console.log("Hello");
        return false;
    }
    return true;
}