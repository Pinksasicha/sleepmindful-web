<table>
<tr><th style="text-align: right; vertical-align: top;">ชื่อ: </th><td style="vertical-align: top;"><?php echo $contact->firstname; ?></td></tr>
<tr><th style="text-align: right; vertical-align: top;">นามสกุล: </th><td style="vertical-align: top;"><?php echo $contact->lastname; ?></td></tr>
<tr><th style="text-align: right; vertical-align: top;">โทรศัพท์: </th><td style="vertical-align: top;"><?php echo $contact->telephone; ?></td></tr>
<tr><th style="text-align: right; vertical-align: top;">อีเมล์: </th><td style="vertical-align: top;"><?php echo $contact->email; ?></td></tr>
<tr><th style="text-align: right; vertical-align: top;">ข้อความ: </th><td style="vertical-align: top;"><?php echo nl2br($contact->message); ?></td></tr>
<tr><th style="text-align: right; vertical-align: top;">เมื่อ: </th><td style="vertical-align: top;"><?php echo mysql_to_th($contact->created,'S' ,TRUE); ?></td></tr>						
</table>