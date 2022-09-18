function buttononclick()
{
    var force=document.getElementById("force").value;
    if(force.trim()=="")
    {
        console.log("Hello");
        return false;
    }
    return true;
}