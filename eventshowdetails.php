<?php
include 'connection.php';
if(isset($_POST['submit-1']))
{
$selectquery="select * from event order by duedate";
$querys = mysqli_query($con,$selectquery);
$num=mysqli_num_rows($querys);
if($num!=0)
{
    echo("<button style='margin:30px;border:2px solid red;border-radius: 40px;padding: 10px;display: inline;cursor: pointer;background-color:greenyellow;'><a href='./userpage.html' target='_self' style='decoration:none;font-size=100px;'>BACK</a></button></a>");
    echo("<h1 style='color:red;text-align:center;font-size:20px;background-color:orange;padding:30px;border:5px solid brown;border-radius:50%;'>LOGS</h1>");
    echo("<hr><hr>");
    while($res=mysqli_fetch_array($querys))
    {
        echo("<br><div style='margin:30px;color:yellow;font-size:20px;background-color:blue;padding:30px;border:5px solid brown;border-radius:50px;'>DUE Date: ".$res['duedate']."<br>DUE TIME: ".$res['duetime']."<br><pre style='color:red;font-size:30;'>".$res['note']."</pre></div>");

    }
}
else
{
?>
<script>
    alert("No Records Are Available.");
    window.location.replace("http://localhost/NoteLog/userpage.html");
</script>
<?php
}
}
else if(isset($_POST['submit-2']))
{
$ddate=$_POST['duedate'];
$selectquery="select * from event where duedate='$ddate' order by duedate";
$querys = mysqli_query($con,$selectquery);
$num=mysqli_num_rows($querys);
if($num!=0)
{
    echo("<h1 style='color:red;text-align:center;font-size:20px;background-color:orange;padding:30px;border:5px solid brown;border-radius:50%;'>LOGS</h1>");
    echo("<hr><hr>");
    while($res=mysqli_fetch_array($querys))
    {
        echo("<br><div style='margin:30px;color:yellow;font-size:20px;background-color:blue;padding:30px;border:5px solid brown;border-radius:50px;'>DUE Date: ".$res['duedate']."<br>DUE TIME: ".$res['duetime']."<br><pre style='color:red;font-size:30;'>".$res['note']."</pre><img src=''</div>");

    }
}
else
{
?>
<script>
    alert("No Records Are Available.");
    window.location.replace("http://localhost/NoteLog/userpage.html");
</script>
<?php
}
}
mysqli_close($con);
?>