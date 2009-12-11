<?php

$form = "<form action=\"result.php\" method=\"get\">";
$form.= "<table>";
$form.= "<tr>";
$form.= "<td>Tuo numero (39 davanti)</td>";
$form.= "<td><input type=\"text\" name=\"first\"></td>";
$form.= "</tr>";
$form.= "<tr>";
$form.= "<td>Altro numero (39 davanti)</td>";
$form.= "<td><input type=\"text\" name=\"second\"></td>";
$form.= "</tr>";
$form.= "<tr>";
$form.= "<td>Tuo token</td>";
$form.= "<td><input type=\"text\" name=\"token\"></td>";
$form.= "</tr>";
$form.= "<tr>";
$form.= "<td>Dal (gg/mm/yyyy hh:mm)</td>";
$form.= "<td>";
$form.= "<select name=\"fromday\">"; for ($i = 1; $i <= 31; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"frommonth\">"; for ($i = 1; $i <= 12; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"fromyear\">"; for ($i = 2009; $i <= 2010; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"fromhour\">"; for ($i = 0; $i <= 23; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"fromminute\">"; for ($i = 0; $i <= 59; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "</td>";
$form.= "</tr>";
$form.= "<tr>";
$form.= "<td>Al (gg/mm/yyyy hh:mm)</td>";
$form.= "<td>";
$form.= "<select name=\"today\">"; for ($i = 1; $i <= 31; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"tomonth\">"; for ($i = 1; $i <= 12; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"toyear\">"; for ($i = 2009; $i <= 2010; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"tohour\">"; for ($i = 0; $i <= 23; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "<select name=\"tominute\">"; for ($i = 0; $i <= 59; $i++) { $form.= "<option value=\"$i\">$i</option>"; } $form.= "</select>";
$form.= "</td>";
$form.= "</tr>";$form.= "<tr>";
$form.= "<td><input type=\"submit\" value=\"Invia\"></td>";
$form.= "</tr>";
$form.= "</table>";
$form.= "</form>";

echo $form;
?>
