<style>
.content {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    display:inline-table;
    float: right;
    margin-left:150px;
    width: 100px;
    height: 100px;
}
</style>

<script>
	function start-time() {
		var now = new Date();
		var s = now.getFullYear()+". " + (now.getMonth()+1)+". "+ now.getDate()+"  "+now.getHours()+" : " + now.getMinutes()+" : "+now.getSeconds(); 
		document.getElementById("endtime").innerHTML=s;

	}
</script>
<html>
        <link rel="stylesheet" href="main.css">
        <head>
                <title>migration page</title>
                <meta charset = "utf-8">
		<h1>Re-Location Application(RLapp)
			<img src="./logo.png" alt="sejong logo" width="300" height="100" align="right">        	
		</h1>
	</head>
    <body>
		<br><br><br>
		<p class="content" style="font-size:2em;">Cell</p>
		<div class="contianer" style="border: 5px solid">
			<div id="circle" style="position:absolute; text-align:center; z-index:1;">
				<p class="content">Zone 1</p>
				<div class="wrap" style="z-index:100;">
					<a href='pre-copy.php' class="button">pre-copy</a>
				</div>
			</div>

			<div id="circle2" style="float:right; line-height=-30px; position:absolute; z-index:2;text-align: right;">				
				<p class="content">Zone 2</p>
				<div class="wrap" style="z-index:101;">
					<a href='handoff.php' class="button2" onclick="start-time()">handoff</a>
				</div>
			</div>
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br>	<br><br><br>
		</div>
		<br><br><br><br>
		<div>
			
			<table style="border: 1px solid #444444;">
					<tr>
						<td style="border: 1px solid #444444;">/</td>
						<td colspan=2 style="border: 1px solid #444444;">Content</td>
					</tr>
					<tr>
						<td style="border: 1px solid #444444;">Mode</td>
						<td colspan=2 style="border: 1px solid #444444;">Pro-Active mode</td>
					</tr>
					<tr>
						<td rowspan=3 style="border: 1px solid #444444;">Time</td>
						<td style="border: 1px solid #444444;">Start</td>
						<td style="border: 1px solid #444444;">
						<?php 
						if($_GET["a"]){
							$t = $_GET["a"];

						$now = DateTime::createFromFormat('U.u', $t);
							echo $now->format("m-d-Y H:i:s.u");

						}
?></td>
					</tr>
					<tr>
						<td style="border: 1px solid #444444;">End</td>
						<td style="border: 1px solid #444444;"><?php
						if($_GET["a"]){
							$end = microtime(true);
							$now = DateTime::createFromFormat('U.u', $end);
							echo $now->format("m-d-Y H:i:s.u"); 
							echo("</td>
								</tr>
								<tr>
								<td style=\"border: 1px solid #444444;\">Service DownTime</td>
								<td style=\"border: 1px solid #444444;\">");
							$s = round($_GET["a"]*1000);
							$e = round($end * 1000);
							$dt = $e-$s;
							echo $dt/1000;
						}
						else{
							echo("</td> </tr>
					<tr>
						<td style=\"border: 1px solid #444444;\">Service DownTime</td>
						<td style=\"border: 1px solid #444444;\">");
						}
					 ?></td>
					</tr>
					<tr>
						<td rowspan=3 style="border: 1px solid #444444;">Service</td>
						<td style="border: 1px solid #444444;">type</td>
						<td style="border: 1px solid #444444;">Real-time video streaming service</td>
					</tr>
					<tr>
						<td style="border: 1px solid #444444;">Image size</td>
						<td style="border: 1px solid #444444;">522MB</td>
					</tr>
					<tr>
						<td style="border: 1px solid #444444;">Session size(Context info size)</td>
						<td style="border: 1px solid #444444;">10b</td>
					</tr>
			</table>
			</div>
			<div class="wrap" style="z-index:3;">
				<br><br><br><br><br><br><br><br><br><br>
				<br><br><br><br><br><br><br><br><br><br>
				
				
				
				<a href='reset.php' class="button">Re-set</a>
			</div>
	</body>
</html>

