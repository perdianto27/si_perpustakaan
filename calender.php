<?php 
$month=date("m"); 
$year=date("Y"); 
$day=date("d");  
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
echo '<style>td { font-size:11; font-family:verdana;}</style>'; 
echo '<table align="center" ><tr><td>'; 
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year)); 
echo '</td></tr></table>'; 
echo '<table  align="center" style="border:1px solid #FFFFFF"><tr bgcolor="#FFFFFF"> 
<td align=center><font color=red>Su</font></td> 
<td align=center>Mo</td> 
<td align=center>Tu</td> 
<td align=center>We</td> 
<td align=center>Th</td> 
<td align=center>Fr</td> 
<td align=center><font color=blue>Sa</font></td></tr>'; 
$s=date ("w", mktime (0,0,0,$month,1,$year)); 
for ($ds=1;$ds<=$s;$ds++) { 
echo "<td style=\"font-family:arial;color:#FFFFFF\" width=\"15%\" align=center valign=middle bgcolor=\"#FFFFFF\"></td>"; 
} 
for ($d=1;$d<=$endDate;$d++) { 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }  
$fontColor="#000000"; 
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") 
{ $fontColor="red"; } 
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") 
{ $fontColor="blue"; } 
echo "<td style=\"font-family:arial;color:#000000\" width=\"15%\" 
align=center bgcolor=#FFFFFF valign=middle> <span 
style=\"color:$fontColor\">$d</span></td>"; 
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; } 
} 
echo '</table>'; 
?> 