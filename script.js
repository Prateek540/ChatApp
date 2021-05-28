function updateScroll(){
    var element = document.getElementById("msgbox");
    element.scrollTop = element.scrollHeight;
}
function loginunfilled()
{
    alert("Please enter full details to login.");
    location.replace("index.php");
}
function notlogged()
{
    alert("Not a user try again.");
    location.replace("index.php");
}
function logged()
{
    location.replace("chatbox.php")
}
function signupunfilled()
{
    alert("Please enter full details to register.");
    location.replace("index.php");
}
function submitted()
{
    location.replace("chatbox.php");
}
function unsubmitted()
{
    alert("Not registered try again");
    location.replace("index.php");
}
function notuser()
{
    alert("Please Login or signup.");
    location.replace("index.php");
}
function logout()
{
    location.replace("index.php");
}
function welcomeadmin()
{
    location.replace("adminsection.php");
}
function Check()
{
    var r = confirm("Are you sure you want to delete your account ?");
    if (r == true)
    {
        location.replace("delete.php");
    }
}