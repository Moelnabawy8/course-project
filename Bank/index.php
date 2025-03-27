<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$loanamount = $_POST['LoanAmount'] * .1;
	$loanyears = $_POST['LoanYears'];
	if ($_POST['LoanYears']>2) {
		$loanamount = $_POST['LoanAmount'] * .15;
	}
	$interestrate = $loanamount * $loanyears;
	$loanafterinterest = $interestrate + $_POST['LoanAmount'];
	$loanpermonth = $loanafterinterest / ($loanyears * 12);
}
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Bank</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<style>
		input {
			color: black !important;
			opacity: 1 !important;
			background-color: white !important;
		}
	</style>
	<style>
		.fields .field input {
			width: 100%;
			/* يخلي الحقول تاخد نفس العرض */
			padding: 10px;
			/* يزود المساحة الداخلية */
			border: 1px solid #ccc;
			/* يخلي الحواف واضحة */
			border-radius: 5px;
			/* يجعل الحواف دائرية */
			font-size: 16px;
			/* يوضح الخط */
		}
	</style>
	<section id="sidebar">
		<div class="inner">
			<nav>
				<ul>
					<li><a href="#three">Get in touch</a></li>
				</ul>
			</nav>
		</div>
	</section>

	<div id="wrapper">
		<section id="three" class="wrapper style1 fade-up">
			<div class="inner">
				<h2>Bank</h2>
				<p>A Beautiful Bank For You.</p>
				<div class="split style1">
					<section>
						<form method="post" action="">
							<div class="fields">
								<div class="field">
									<label for="UserName">User Name</label>
									<input type="text" name="UserName" id="UserName" value="<?php echo isset($_POST['UserName']) ? $_POST['UserName'] : ''; ?>" />
								</div>
								<div class="field">
									<label for="LoanAmount">Loan Amount</label>
									<input type="number" name="LoanAmount" id="LoanAmount" value="<?php echo isset($_POST['LoanAmount']) ? $_POST['LoanAmount'] : ''; ?>" />
								</div>
								<div class="field">
									<label for="LoanYears">Loan Years</label>
									<input type="number" name="LoanYears" id="LoanYears" value="<?php echo isset($_POST['LoanYears']) ? $_POST['LoanYears'] : ''; ?>" />
								</div>
								<ul class="actions" style="margin-top: 20px;">
									<li><button type="submit" class="button submit">Calculate</button></li>
								</ul>
							</div>
						</form>
						<?php if (!empty($interestrate)) { ?>
                        <div class="result-box">
							User Name: <?php echo $_POST['UserName'] ?> <br>
                            Interest Rate: <?php echo number_format($interestrate, 2); ?> EGP<br>
                            Loan After Interest: <?php echo number_format($loanafterinterest, 2); ?> EGP <br>
							Loan per Month: <?php echo number_format($loanpermonth, 2); ?> EGP

                        </div>
                        <?php } ?>
					</section>
				</div>
			</div>
		</section>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>